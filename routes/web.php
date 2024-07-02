<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/perusahaan', function () {
//     return view('registerperusahaan');
// })->name('registerperusahaan');

// Route untuk halaman register
Route::get('/pilihan', function () {
    return view('pilihan');
})->name('pilihan');

// Route untuk halaman register
Route::get('/about', function () {
    return view('aboutus');
});

// // Route untuk halaman register
// Route::get('/abut', function () {
//     return view('about');
// });

// Route untuk halaman register
Route::get('/main', function () {
    return view('admin/main');
});

// Route untuk halaman register
Route::get('/verif', function () {
    return view('verif');
});

Route::get('/admin', function () {
    return view('admin.content.admin');
});

Route::get('upload', [ImageController::class, 'showUploadForm']);
Route::post('upload', [ImageController::class, 'store']);
Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
Route::get('/', [ImageController::class, 'index']);


Route::get('/listmember', [CKopiController::class, 'listmember'])->name('listmember');
Route::get('/listproduk', [CKopiController::class, 'listproduk'])->name('listproduk');
Route::post('/produk', [CKopiController::class, 'produk'])->name('produk');
Route::put('/update/{id}', [CKopiController::class, 'update'])->name('update');
Route::delete('/produk/delete/{id}', [CKopiController::class, 'destroy'])->name('destroy');
Route::post('/createuser', [CKopiController::class, 'createuser'])->name('createuser');
Route::put('/updateuser/{id}', [CKopiController::class, 'updateuser'])->name('updateuser');
Route::delete('/user/delete/{id}', [CKopiController::class, 'destroyuser'])->name('destroyuser');
Route::get('/logout', [CKopiController::class, 'logout'])->name('logout');
