<?php

namespace App\Http\Controllers;

use App\Models\SubfotoPenawaran;
use Illuminate\Http\Request;
use App\Models\Penawaran;
use Illuminate\Support\Facades\Storage;

class PenawaranController extends Controller
{
    // Method to handle storing a new penawaran
    public function store(Request $request)
    {
        // Validate incoming request data
        $data = $request->validate([
            'nama_penawaran' => ['required', 'max:255'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required'],
            'foto' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp,jpeg']
        ]);

        // Get perusahaan from the logged-in user
        $perusahaan = auth()->user()->perusahaan;

        // Store the uploaded file
        $foto = $request->file('foto') ? $request->file('foto')->store('gambar_penawaran', 'public') : null;

        // Create a new penawaran
        Penawaran::create([
            'id_perusahaan' => $perusahaan->id,
            'nama_penawaran' => $data['nama_penawaran'],
            'harga' => $data['harga'],
            'deskripsi' => $data['deskripsi'],
            'foto' => $foto,
        ]);

        // Redirect back with success message
        return redirect()->route('db_perusahaan')->with('success', 'Akomodasi berhasil ditambahkan.');
    }

    // Method to show details of a specific penawaran
    public function edit(Penawaran $penawaran)
    {
        return view('perusahaan.pena', ['penawaran' => $penawaran]);
    }

    // Method to update a penawaran
    public function update(Request $request, $id)
    {
        
        $penawaran = Penawaran::findOrFail($id);
        
        // Validate incoming request data
        $data = $request->validate([
            'nama_penawaran' => ['required', 'max:255'],
            'harga' => ['required', 'numeric'],
            'ruang' => ['required', 'numeric'],
            'deskripsi' => ['required'],
            'foto' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp,jpeg'],
            'subfotos.*' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp,jpeg']
        ]);
        
        // Update nama
        $penawaran->nama_penawaran = $data['nama_penawaran'];

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($penawaran->foto) {
                Storage::delete('public/' . $penawaran->foto);
            }

            // Upload foto baru
            $foto = $request->file('foto')->store('gambar_penawaran', 'public');
            $penawaran->foto = $foto;
        }

        // Update harga dan deskripsi
        $penawaran->harga = $data['harga'];
        $penawaran->ruang = $data['ruang'];
        $penawaran->deskripsi = $data['deskripsi'];

        // Handle subfotos
        if ($request->hasFile('subfotos')) {
            $currentSubfotos = SubfotoPenawaran::where('id_penawaran', $penawaran->id)->count();
            $newSubfotosCount = count($request->file('subfotos'));

            if ($currentSubfotos + $newSubfotosCount > 5) {
                return redirect()->back()->withErrors(['subfotos' => 'Each penawaran can only have a maximum of 5 subfotos.']);
            }

            foreach ($request->file('subfotos') as $subfoto) {
                $subfotoPath = $subfoto->store('subfoto_penawaran', 'public');
                SubfotoPenawaran::create([
                    'id_penawaran' => $penawaran->id,
                    'subfoto' => $subfotoPath
                ]);
            }
        }

        // Simpan perubahan
        $penawaran->save();

        // Redirect back with success message
        return redirect()->route('penawaran.show', $penawaran->id)->with('success', 'Penawaran berhasil diperbarui!');
    }
}
