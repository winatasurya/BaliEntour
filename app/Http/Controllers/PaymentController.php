<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Reservasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Snap;

class PaymentController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
        $no_transaksi = 'Blt-' . Str::upper(mt_rand(100000, 999999));
        $reservasi = new Reservasi;
        $reservasi->no_transaksi = $no_transaksi;
        $reservasi->id_wisatawan = $request->id_wisatawan;
        $reservasi->id_penawaran = $request->id_penawaran;
        $reservasi->nama_perusahaan = $request->nama_perusahaan;
        $reservasi->qty = $request->qty;
        $reservasi->nama_item = $request->nama_item;
        $reservasi->harga_item = filter_var($request->harga_item, FILTER_SANITIZE_NUMBER_INT); // Mengonversi harga_item menjadi angka
        $reservasi->nama_pemesan = $request->nama_pemesan;
        $reservasi->tanggal_check_in = $request->tanggal_check_in;
        $reservasi->tanggal_check_out = $request->tanggal_check_out;
        $reservasi->waktu_check_in = $request->waktu_check_in;
        $reservasi->waktu_check_out = $request->waktu_check_out;
        $reservasi->total_harga = filter_var($request->total_harga, FILTER_SANITIZE_NUMBER_INT); // Mengonversi total_harga menjadi angka

        $transaction_details = [
            'order_id' => $reservasi->no_transaksi,
            'gross_amount' => $reservasi->total_harga
        ];

        $item_details = [
            [
                'id' => $reservasi->no_transaksi,
                'price' => $reservasi->harga_item,
                'name' => $reservasi->nama_item,
                'quantity' => $reservasi->qty,
            ]
        ];

        if ($reservasi->tanggal_check_out) {
            $item_details[0]['name'] = $reservasi->nama_item . ' per hari';
        } else {
            $item_details[0]['name'] = $reservasi->nama_item . ' per jam';
        }

        $customer_details = [
            'first_name' => $reservasi->nama_pemesan
        ];

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction_data);
            $reservasi->snap_token = $snapToken;
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $reservasi->save();
        $penawaran = Penawaran::with(['perusahaan.user'])->findOrFail($request->id_penawaran);

        return view('landing.payment', compact('penawaran', 'reservasi'));
    }


}
