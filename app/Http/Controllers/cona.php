<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class cona extends Controller
{
    public function createuser(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_user' => 'required',
            'password_user' => 'required',
            'email' => 'required|email',
            'telp_user' => 'required',
            'alamat_user' => 'required',
        ]);
    
        // Proses unggah gambar
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/img', $imageName);
    
        // Simpan data pengguna ke database
        User::create([
            'image' => $imageName,
            'nama_user' => $request->nama_user,
            'password_user' => Hash::make($request->password_user),
            'email' => $request->email,
            'telp_user' => $request->telp_user,
            'alamat_user' => $request->alamat_user,
            'token' => bin2hex(random_bytes(16)), // Generate random token
            'is_verif' => 1,
        ]);
    
        return redirect()->route('listmember')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    
    public function updateuser(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'nama_user' => 'required|',
            'password_user' => 'nullable|',
            'email' => 'required|email|unique:user,email,' . $id . ',iduser', // Tambahkan 'iduser' sebagai nama kolom kunci utama
            'telp_user' => 'required|numeric',
            'alamat_user' => 'required|string',
        ]);
    
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/img', $image->hashName());
    
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::delete('public/img/' . $user->image);
            }
    
            // Update nama gambar di request
            $user->image = $image->hashName();
        }
    
        // Update detail pengguna
        $user->nama_user = $request->nama_user;
        if ($request->password_user) {
            $user->password_user = Hash::make($request->password_user);
        }
        $user->email = $request->email;
        $user->telp_user = $request->telp_user;
        $user->alamat_user = $request->alamat_user;
        $user->save();
    
        return redirect()->route('listmember')->with('success', 'Pengguna berhasil diupdate.');
    }
    
    
    public function destroyuser($id): RedirectResponse
    {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Hapus gambar jika ada
        if ($user->image) {
            Storage::delete('public/img/' . $user->image);
        }
    
        // Hapus pengguna
        $user->delete();
    
        return redirect()->route('listmember')->with('success', 'Pengguna berhasil dihapus.');
    }
        
        public function produk(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image_p' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:5',
            'kategori' => 'required',
            'deskripsi' => 'required|min:10',
            'harga' => 'required',
            'stock_produk' => 'required'
        ]);
    
        //upload image
        $image = $request->file('image_p');
        $image->storeAs('public/img', $image->hashName());
    
        // Tambahkan nama file gambar ke request
        $request->merge(['image_p' => $image->hashName()]);
    
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'image_p' => $image->hashName(),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stock_produk' => $request->stock_produk,
            // Anda mungkin perlu menyesuaikan dengan atribut lainnya yang ada pada model Anda
        ]);
        return redirect()->route('listproduk');
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image_p' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:5',
            'kategori' => 'required',
            'deskripsi' => 'required|min:10',
            'harga' => 'required|numeric',
            'stock_produk' => 'required|numeric'
        ]);
    
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);
    
        // Upload gambar jika ada
        if ($request->hasFile('image_p')) {
            $image = $request->file('image_p');
            $image->storeAs('public/img', $image->hashName());
            
            // Hapus gambar lama jika ada
            if ($produk->image_p) {
                Storage::delete('public/img/' . $produk->image_p);
            }
            
            // Update nama gambar di request
            $produk->image_p = $image->hashName();
        }
    
        // Update detail produk
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori = $request->kategori;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stock_produk = $request->stock_produk;
        $produk->save();
    
        return redirect()->route('listproduk')->with('success', 'Produk berhasil diupdate.');
    }
    
    public function destroy($id): RedirectResponse
    {
        // Find the product by ID
        $produk = Produk::findOrFail($id);
    
        // Delete image
        Storage::delete('public/img/' . $produk->image_p);
    
        // Delete product
        $produk->delete();
    
        return redirect()->route('listproduk');
    }
    
    
    }