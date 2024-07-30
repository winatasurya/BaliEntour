<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Perusahaan;
use App\Models\reservasi;
use App\Models\SubfotoPenawaran;
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
    $reservasi = collect();

    if ($user && $user->perusahaan) {
        $reservasi = reservasi::whereHas('penawaran', function ($query) use ($user) {
            $query->where('id_perusahaan', $user->perusahaan->id);
        })->get();
    }

    return view('perusahaan.db_perusahaan', compact('user', 'perusahaan', 'penawaran', 'reservasi'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
{
    $user = Auth::user();
    $perusahaan = Perusahaan::where('id_users', $user->id)->firstOrFail();
    $penawaran = Penawaran::with('subfoto_penawaran')->where('id_perusahaan', $perusahaan->id)->firstOrFail();

    return view('penawaran.edit', compact('penawaran'));
}

public function update(Request $request, Perusahaan $perusahaan)
{
    $request->validate([
        'nama_penawaran' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'harga' => 'required|numeric',
        'ruang' => 'required|numeric|min:1',
        'deskripsi' => 'required|string',
        'subfotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $penawaran = Penawaran::findOrFail($request->penawaran_id);

    $penawaran->update([
        'nama_penawaran' => $request->nama_penawaran,
        'harga' => $request->harga,
        'ruang' => $request->ruang,
        'deskripsi' => $request->deskripsi,
    ]);

    if ($request->hasFile('foto')) {
        Storage::disk('public')->delete($penawaran->foto);
        $penawaran->foto = $request->file('foto')->store('penawaran_fotos', 'public');
    }

    if ($request->hasFile('subfotos')) {
        foreach ($request->file('subfotos') as $subfoto) {
            $path = $subfoto->store('subfotos', 'public');
            SubfotoPenawaran::create([
                'id_penawaran' => $penawaran->id,
                'subfoto' => $path,
            ]);
        }
    }

    $penawaran->save();

    return redirect()->route('penawaran.index')->with('success', 'Penawaran updated successfully.');
}

public function destroySubfoto($id)
{
    $subfoto = SubfotoPenawaran::findOrFail($id);
    Storage::disk('public')->delete($subfoto->subfoto);
    $subfoto->delete();

    return back()->with('success', 'Subfoto deleted successfully.');
}
}
