<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyEmailController;

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

    // Route verif email
    Route::get('/email/verify', [VerifyEmailController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.send');
});


// Route auth
Route::middleware(['auth', 'verified'])->group(function () {
    // Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route perusahaan
    Route::resource('perusahaan', PerusahaanController::class);
    Route::get('/db_perusahaan', [PerusahaanController::class, 'index'])->name('db_perusahaan');
    Route::view('/detail', 'perusahaan.detail')->name('detail');

    // Route untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::view('/about', 'aboutus')->name('about');

Route::resource('admin', AdminController::class);
Route::view('/main', 'admin.main')->name('main');
Route::get('/daftarperusahaan', [AdminController::class, 'perusahaan'])->name('daftarperusahaan');
Route::view('/antrian', 'admin.content.antrian')->name('antrian');
Route::get('/daftarwisatawan', [AdminController::class, 'wisatawan'])->name('daftarwisatawan');
Route::view('/admin', 'admin.content.admin')->name('admin');

Route::view('/ada', 'landing.detail')->name('ada');
Route::view('/all', 'landing.viewall')->name('all');
// Route::get('/listmember', [CKopiController::class, 'listmember'])->name('listmember');
// Route::get('/listproduk', [CKopiController::class, 'listproduk'])->name('listproduk');
// Route::post('/produk', [CKopiController::class, 'produk'])->name('produk');
// Route::put('/update/{id}', [CKopiController::class, 'update'])->name('update');
// Route::delete('/produk/delete/{id}', [CKopiController::class, 'destroy'])->name('destroy');
// Route::post('/createuser', [CKopiController::class, 'createuser'])->name('createuser');
// Route::put('/updateuser/{id}', [CKopiController::class, 'updateuser'])->name('updateuser');
// Route::delete('/user/delete/{id}', [CKopiController::class, 'destroyuser'])->name('destroyuser');
// Route::get('/logout', [CKopiController::class, 'logout'])->name('logout');
