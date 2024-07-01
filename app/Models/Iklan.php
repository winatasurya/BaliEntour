<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Iklan extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'idproduk';
    protected $fillable = [
        'nama_produk', 'image_p', 'kategori', 'harga', 'terjual', 'rating', 'deskripsi', 'stock_produk',
    ];

    public function saveToDB(Request $request)
    {
        $this->nama_produk = $request->input('nama_produk');
        $this->image_p = $request->input('image_p');
        $this->kategori = $request->input('kategori');
        $this->harga = $request->input('harga');
        $this->terjual = $request->input('terjual', 0);
        $this->rating = $request->input('rating', 0);
        $this->deskripsi = $request->input('deskripsi');
        $this->stock_produk = $request->input('stock_produk');
        $this->save();
    }
}
