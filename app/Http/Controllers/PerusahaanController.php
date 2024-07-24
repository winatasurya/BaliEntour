<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $perusahaan = $user->perusahaan;
        $penawaran = $perusahaan ? $perusahaan->penawaran : collect();
        $all = perusahaan::query();

        return view('perusahaan.db_perusahaan', compact('user', 'perusahaan', 'penawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        // Get the currently authenticated user
        $user = Auth::user();
        // Fetch the company associated with the user
        $perusahaan = Perusahaan::where('id_users', $user->id)->firstOrFail();

        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'wa_perusahaan' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $user = Auth::user();
        $perusahaan = Perusahaan::where('id_users', $user->id)->firstOrFail();

        $user->name = $request->input('name');
        $user->save();

        $perusahaan->wa_perusahaan = $request->input('wa_perusahaan');
        $perusahaan->deskripsi = $request->input('deskripsi');
        $perusahaan->latitude = $request->input('latitude');
        $perusahaan->longitude = $request->input('longitude');

        if ($request->hasFile('logo')) {
            if ($perusahaan->logo) {
                Storage::disk('public')->delete($perusahaan->logo);
            }

            $path = $request->file('logo')->store('gambar_perusahaan', 'public');
            $perusahaan->logo = $path;
        }

        $perusahaan->save();

        return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui.');
    }
}
