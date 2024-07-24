<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\WisatawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifyEmailController;

// halaman awal
Route::get('/', [DashboardController::class, 'index'])->name('welcome');

// Route guest
Route::middleware('guest')->group(function(){
    // Route untuk register
    Route::view('/register', 'auth.register')->name('register');;
    Route::post('/register', [AuthController::class, 'register']);
    
    // Route untuk login
    Route::view('/login', 'auth.login')->name('login');;
    Route::post('/login', [AuthController::class, 'login']);

    //  Reset password
    Route::view('/forgot-password','auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'passwordEmail']);
    Route::get('/reset-password/{token}', [PasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'passwordUpdate'])->name('password.update');

    // Route untuk halaman pilihan register
    Route::view('/pilihan', 'pilihan')->name('pilihan');;

    // Route verif email
    Route::get('/email/verify', [VerifyEmailController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.send');
});


// Route auth
Route::middleware(['auth', 'verified'])->group(function () {
 
    // Perusahaan
    Route::resource('perusahaan', PerusahaanController::class);

    // Route perusahaan
    Route::get('/db_perusahaan', [PerusahaanController::class, 'index'])->name('db_perusahaan');
    Route::view('/detail', 'perusahaan.detail')->name('detail');

    // Route untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Wisatawan
    Route::resource('wisatawan', WisatawanController::class);

    // Route payment
    Route::post('/reservasi/pay', [PaymentController::class, 'reservasi'])->name('reservasi.pay');
    Route::post('/reservasi/updateStatus', [PaymentController::class, 'updateStatus'])->name('reservasi.updateStatus');
    Route::delete('/reservasi/delete', [PaymentController::class, 'delete'])->name('reservasi.delete');

    // Route dashboard wisatawan
    Route::get('/wisatawan', [WisatawanController::class, 'index'])->name('wisatawan');
    Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('change.password');

    // Route lihat perusahaan
    Route::get('/show/{perusahaan}', [WisatawanController::class, 'lihatPerusahaan'])->name('lihat.perusahaan');
    Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');
    Route::get('/reservasi/{penawaran}', [PaymentController::class, 'index'])->name('reservasi');
});

Route::view('/about', 'aboutus')->name('about');

Route::resource('admin', AdminController::class);
Route::view('/main', 'admin.main')->name('main');
Route::get('/daftarperusahaan', [AdminController::class, 'perusahaan'])->name('daftarperusahaan');
Route::get('/antrian', [AdminController::class, 'antrian'])->name('antrian');
Route::get('/daftarwisatawan', [AdminController::class, 'wisatawan'])->name('daftarwisatawan');
Route::view('/admin', 'admin.content.admin')->name('admin');
Route::delete('/admin/wisatawan/{user}', [AdminController::class, 'destroyWisatawan'])->name('admin.destroy.wisatawan');
Route::delete('/admin/peusahaan/{user}', [AdminController::class, 'destroyPerusahaan'])->name('admin.destroy.perusahaan');
Route::patch('/admin/approve/{user}', [AdminController::class, 'approve'])->name('admin.approve');
Route::view('/ada', 'landing.detail')->name('ada');
Route::view('/all', 'landing.viewall')->name('all');


Route::put('/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');


// routes/web.php
Route::get('/penawaran/{penawaran}', [PenawaranController::class, 'showi'])->name('penawaran.show'); // Rute untuk detail penawaran
Route::get('/penawaran/{penawaran}/edit', [PenawaranController::class, 'edit'])->name('penawaran.edit'); // Rute untuk form edit penawaran
Route::put('/penawaran/{penawaran}/update', [PenawaranController::class, 'update'])->name('penawaran.update'); // Rute untuk update penawaran
Route::post('/penawaran', [PenawaranController::class, 'store'])->name('penawaran.store');
