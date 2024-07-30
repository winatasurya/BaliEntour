<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    // PenawaranController.php

    public function index($id)
    {
        $penawaran = Penawaran::with(['perusahaan.user', 'subfoto'])->findOrFail($id);
        return view('landing.payment', compact('penawaran'));
    }


    public function checkAvailability(Request $request)
    {
        $penawaran = Penawaran::find($request->id_penawaran);
        $reservasiQuery = Reservasi::where('id_penawaran', $request->id_penawaran);

        if ($penawaran->perusahaan->bidang == 'Villa & Suites') {
            $reservasiQuery->where(function ($query) use ($request) {
                $query->whereBetween('tanggal_check_in', [$request->tanggal_check_in, $request->tanggal_check_out])
                    ->orWhereBetween('tanggal_check_out', [$request->tanggal_check_in, $request->tanggal_check_out])
                    ->orWhereRaw('? BETWEEN tanggal_check_in AND tanggal_check_out', [$request->tanggal_check_in])
                    ->orWhereRaw('? BETWEEN tanggal_check_in AND tanggal_check_out', [$request->tanggal_check_out]);
            });
        } else {
            $reservasiQuery->where('tanggal_check_in', $request->tanggal_check_in)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('waktu_check_in', [$request->waktu_check_in, $request->waktu_check_out])
                        ->orWhereBetween('waktu_check_out', [$request->waktu_check_in, $request->waktu_check_out])
                        ->orWhereRaw('? BETWEEN waktu_check_in AND waktu_check_out', [$request->waktu_check_in])
                        ->orWhereRaw('? BETWEEN waktu_check_in AND waktu_check_out', [$request->waktu_check_out]);
                });
        }

        $reservasiCount = $reservasiQuery->count();
        $availability = $penawaran->ruang - $reservasiCount;

        $data = [];
        if ($availability > 0) {
            $data[] = [
                'tanggal' => $request->tanggal_check_in,
                'waktu_check_in' => $request->waktu_check_in,
                'waktu_check_out' => $request->waktu_check_out,
                'ruang_tersedia' => $availability
            ];
        }

        return response()->json([
            'status' => 'success',
            'availability' => $data
        ]);
    }


    public function reservasi(Request $request)
    {
        // Pengecekan ketersediaan ruang
        $isAvailable = $this->checkAvailabilityForReservasi($request);
        if (!$isAvailable) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada ruang kosong pada tanggal dan waktu tersebut'
            ]);
        }

        $snapToken = DB::transaction(function () use ($request) {
            $reservasi = Reservasi::create([
                'no_transaksi' => 'BLT-' . mt_rand(100000, 999999),
                'id_wisatawan' => $request->id_wisatawan,
                'id_penawaran' => $request->id_penawaran,
                'nama_perusahaan' => $request->nama_perusahaan,
                'nama_pemesan' => $request->nama_pemesan,
                'nama_item' => $request->nama_item,
                'qty' => $request->qty,
                'harga_item' => filter_var($request->harga_item, FILTER_SANITIZE_NUMBER_INT),
                'tanggal_check_in' => $request->tanggal_check_in,
                'tanggal_check_out' => $request->tanggal_check_out,
                'waktu_check_in' => $request->waktu_check_in,
                'waktu_check_out' => $request->waktu_check_out,
                'total_harga' => filter_var($request->total_harga, FILTER_SANITIZE_NUMBER_INT),
            ]);

            $transaction_details = [
                'order_id' => $reservasi->no_transaksi,
                'gross_amount' => $reservasi->total_harga
            ];

            $item_details = [
                [
                    'id' => $reservasi->no_transaksi,
                    'price' => $reservasi->harga_item,
                    'quantity' => $reservasi->qty,
                    'name' => $reservasi->tanggal_check_out ? 'Hari ' . $reservasi->nama_item : 'Jam ' . $reservasi->nama_item
                ]
            ];

            $customer_details = [
                'first_name' => $reservasi->nama_pemesan,
            ];

            $transaction_data = [
                'transaction_details' => $transaction_details,
                'item_details' => $item_details,
                'customer_details' => $customer_details,
            ];

            $snapToken = Snap::getSnapToken($transaction_data);
            $reservasi->snap_token = $snapToken;
            $reservasi->save();

            return ['snap_token' => $snapToken, 'reservasi_id' => $reservasi->id];
        });

        return response()->json([
            'status' => 'success',
            'snap_token' => $snapToken['snap_token'],
            'reservasi_id' => $snapToken['reservasi_id']
        ]);
    }

    private function checkAvailabilityForReservasi($request)
    {
        $penawaran = Penawaran::find($request->id_penawaran);
        $reservasiQuery = Reservasi::where('id_penawaran', $request->id_penawaran);

        if ($penawaran->perusahaan->bidang == 'Villa & Suites') {
            $reservasiQuery->where(function ($query) use ($request) {
                $query->whereBetween('tanggal_check_in', [$request->tanggal_check_in, $request->tanggal_check_out])
                    ->orWhereBetween('tanggal_check_out', [$request->tanggal_check_in, $request->tanggal_check_out])
                    ->orWhereRaw('? BETWEEN tanggal_check_in AND tanggal_check_out', [$request->tanggal_check_in])
                    ->orWhereRaw('? BETWEEN tanggal_check_in AND tanggal_check_out', [$request->tanggal_check_out]);
            });
        } else {
            $reservasiQuery->where('tanggal_check_in', $request->tanggal_check_in)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('waktu_check_in', [$request->waktu_check_in, $request->waktu_check_out])
                        ->orWhereBetween('waktu_check_out', [$request->waktu_check_in, $request->waktu_check_out])
                        ->orWhereRaw('? BETWEEN waktu_check_in AND waktu_check_out', [$request->waktu_check_in])
                        ->orWhereRaw('? BETWEEN waktu_check_in AND waktu_check_out', [$request->waktu_check_out]);
                });
        }

        $reservasiCount = $reservasiQuery->count();
        return $reservasiCount < $penawaran->ruang;
    }

    public function updateStatus(Request $request)
    {
        $reservasi = Reservasi::find($request->reservasi_id);
        $reservasi->status = $request->status;
        $reservasi->save();

        return response()->json(['status' => 'success']);
    }

    public function delete(Request $request)
    {
        Reservasi::destroy($request->reservasi_id);

        return response()->json(['status' => 'success']);
    }
}
