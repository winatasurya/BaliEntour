<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rating;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $data->validate([
            'nilai' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ]);

        rating::create([
            'id_wisatawan' => $request->id_wisatawan,
            'id_perusahaan' => $request->id_perusahaan,
            'nilai' => $data['nilai'],
            'komentar' => $data['komentar'],
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
