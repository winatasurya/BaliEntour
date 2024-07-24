<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorewisatawanRequest;
use App\Models\perusahaan;
use App\Models\rating;
use App\Models\wisatawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisatawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $wisatawan = $user->wisatawan;

        return view('user', compact('user', 'wisatawan'));
    }

    public function lihatPerusahaan(Perusahaan $perusahaan)
    {
        $perusahaan->load('penawaran');
        $ratings = rating::where('id_perusahaan', $perusahaan->id)->get();
        $totalRatings = rating::where('id_perusahaan', $perusahaan->id)->sum('nilai');
        $banyakRatings = rating::where('id_perusahaan', $perusahaan->id)->count();

        $rate = $banyakRatings > 0 ? number_format($totalRatings / $banyakRatings, 1) : 0;
        return view('landing.detail', compact('perusahaan', 'ratings', 'rate'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorewisatawanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(wisatawan $wisatawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wisatawan $wisatawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wisatawan $wisatawan)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'wa_wisatawan' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3000',
        ]);

        // Update data user
        $wisatawan->user->update([
            'name' => $request->name,
        ]);

        // Update data wisatawan
        $wisatawan->update([
            'tgl_lahir' => $request->tgl_lahir,
            'wa_wisatawan' => $request->wa_wisatawan,
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            if ($wisatawan->gambar) {
                Storage::disk('public')->delete($wisatawan->gambar);
            }
            $path = $request->file('gambar')->store('gambar_wisatawan', 'public');
            $wisatawan->update(['gambar' => $path]);
        }

        return redirect()->route('wisatawan', $wisatawan)
            ->with('pesan', 'Profil Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wisatawan $wisatawan)
    {
        //
    }
}
