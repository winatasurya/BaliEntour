<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// halaman awal
Route::view('/', 'welcome')->name('welcome');

// Route guest
Route::middleware('guest')->group(function(){
    // Route untuk register
    Route::view('/register', 'auth.register')->name('register');;
    Route::post('/register', [AuthController::class, 'register']);
    
    // Route untuk login
    Route::view('/login', 'auth.login')->name('login');;
    Route::post('/login', [AuthController::class, 'login']);

    // Route untuk halaman pilihan register
    Route::view('/pilihan', 'pilihan')->name('pilihan');;
});

// Route auth
Route::middleware('auth')->group(function(){
    // Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    
    // Route untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route verif email
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');

    // Resend email verif
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware(['throttle:6,1'])->name('verification.send');
});

Route::view('/about', 'aboutus')->name('about');;


Route::get('/main', function () {
    return view('admin/main');
});

Route::get('/admin', function () {
    return view('admin.content.admin');
});
Route::get('/db_perusahaan', function () {
    return view('perusahaan/db_perusahaan');
});
Route::get('/detail', function () {
    return view('perusahaan/detail');
});
Route::get('/daftar', function () {
    return view('admin.content.daftar');
});
Route::get('/antrian', function () {
    return view('admin.content.antrian');
});
Route::get('/daftaruser', function () {
    return view('admin.content.daftaruser');
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
