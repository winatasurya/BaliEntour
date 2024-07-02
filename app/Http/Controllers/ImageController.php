<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Upload file
        $imagePath = $request->file('image')->store('images');

    // Simpan data gambar ke database
    $image = new Image();
    $image->filename = $request->file('image')->getClientOriginalName();
    $image->title = $request->input('title');
    $image->description = $request->input('description');
    $image->path = $imagePath;
    $image->save();

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function index()
    {
        $images = Image::all();

        return view('welcome', compact('images'));
    }
}
