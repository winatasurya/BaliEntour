<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\ImageController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('registerperusahaan');
})->name('home');

// route role perusahaan
Route::middleware(['auth', 'verified', CheckRole::class . ':perusahaan'])->group(function () {
    Route::get('/dashboard', [ImageController::class, 'index'])->name('dashboard');
});

// route role wisatawan
Route::middleware(['auth', 'verified', CheckRole::class . ':wisatawan'])->group(function () {
    Route::get('/welcome', [ImageController::class, 'index'])->name('welcome');
});


Route::get('upload', [ImageController::class, 'showUploadForm']);
Route::post('upload', [ImageController::class, 'store']);
Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
Route::get('/', [ImageController::class, 'index']);

// Route untuk halaman pilihan register
Route::get('/pilihan', function () {
    return view('pilihan');
})->name('pilihan');


Route::get('/about', function () {
    return view('aboutus');
});


Route::get('/main', function () {
    return view('admin/main');
});


Route::get('/verif', function () {
    return view('user.verif');
});

Route::get('/admin', function () {
    return view('admin.content.admin');
});

Route::get('/ada', function () {
    return view('landing/detail');
});


Route::get('/all', function () {
    return view('landing/viewall');
});
// Route::get('/listmember', [CKopiController::class, 'listmember'])->name('listmember');
// Route::get('/listproduk', [CKopiController::class, 'listproduk'])->name('listproduk');
// Route::post('/produk', [CKopiController::class, 'produk'])->name('produk');
// Route::put('/update/{id}', [CKopiController::class, 'update'])->name('update');
// Route::delete('/produk/delete/{id}', [CKopiController::class, 'destroy'])->name('destroy');
// Route::post('/createuser', [CKopiController::class, 'createuser'])->name('createuser');
// Route::put('/updateuser/{id}', [CKopiController::class, 'updateuser'])->name('updateuser');
// Route::delete('/user/delete/{id}', [CKopiController::class, 'destroyuser'])->name('destroyuser');
// Route::get('/logout', [CKopiController::class, 'logout'])->name('logout');
