<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penawaran;

class PenawaranController extends Controller
{
    //

    public function store(Request $request)
    {
        # Validate
        $data = $request->validate([
            'nama_penawaran' => ['required', 'max:255'],
            'harga' => 'required|numeric',
            'deskripsi' => ['required', 'max:1000'],
        ]);

        // Get perusahaan perusahaan dari user yang sedang login
        $perusahaan = auth()->user()->perusahaan;

        // Tambah penawaran
        $penawaran = Penawaran::create([
            'id_perusahaan' => $perusahaan->id,...$data
        ]);

        return redirect()->route('db_perusahaan')->with('success', 'Akomodasi berhasil ditambahkan.');
        }
}

