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

    public function index($id)
    {
        $penawaran = Penawaran::with(['perusahaan.user'])->findOrFail($id);
        return view('landing.payment', compact('penawaran'));
    }

    public function reservasi(Request $request)
    {
        $snapToken = DB::transaction(function() use ($request) {
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
