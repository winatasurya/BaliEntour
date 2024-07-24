<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rating;
use App\Models\Wisatawan;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nilai' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ]);

        // Ambil id_wisatawan dari user yang sedang login
        $user = auth()->user();
        $wisatawan = $user->wisatawan;

        if (!$wisatawan) {
            return back()->with('error', 'Wisatawan tidak ditemukan.');
        }

        rating::create([
            'id_wisatawan' => $wisatawan->id,
            'id_perusahaan' => $request->id_perusahaan,
            'nilai' => $data['nilai'],
            'komentar' => $data['komentar'],
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
