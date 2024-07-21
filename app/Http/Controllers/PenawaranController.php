<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penawaran;
use Illuminate\Support\Facades\Storage;

class PenawaranController extends Controller
{
    //

    public function store(Request $request)
    {
        # Validate
        $data = $request->validate([
            'nama_penawaran' => ['required', 'max:255'],
            'harga' => ['required','numeric'],
            'deskripsi' => ['required'],
            'foto' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp,jpeg'] 
        ]);

        // Get perusahaan perusahaan dari user yang sedang login
        $perusahaan = auth()->user()->perusahaan;

        $foto = $request->file('foto')->store('gambar_penawaran', 'public');

        // Tambah penawaran
        Penawaran::create([
            'id_perusahaan' => $perusahaan->id,
            'nama_penawaran' => $data['nama_penawaran'],
            'harga' => $data['harga'],
            'deskripsi' => $data['deskripsi'],
            'foto' => $foto,
        ]);

        return redirect()->route('db_perusahaan')->with('success', 'Akomodasi berhasil ditambahkan.');
    }

    public function show(Penawaran $penawaran)
    {
        return view('landing.detail', ['penawaran' =>$penawaran]);
    }
}

