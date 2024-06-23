<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('nama');
            $table->string('password');
            $table->enum('role', ['wisatawan', 'perusahaan', 'admin'])->default('wisatawan');
            $table->string('token');
            $table->enum('is_verif',['0','1'])->default(0);
        });

        Schema::create('wisatawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('user');
            $table->date('tgl_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->string('wa_wisatawan');
          });

          Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('user');
            $table->string('lokasi');
            $table->string('bidang');
            $table->string('wa_perusahaan');
            $table->string('logo');
            $table->float('penilaian');
            $table->text('deskripsi');
          });

          Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan')->constrained('perusahaan');
            $table->foreignId('id_wisatawan')->constrained('wisatawan');
            $table->float('nilai');
            $table->text('komentar');
            $table->timestamps();
          });

          Schema::create('penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan')->constrained('perusahaan');
            $table->string('nama_penawaran');
            $table->float('harga');
            $table->text('deskripsi');
            $table->string('foto');
          });

          Schema::create('subfoto_penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penawaran')->constrained('penawaran');
            $table->string('subfoto');
          });

          Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wisatawan')->constrained('wisatawan');
            $table->foreignId('id_penawaran')->constrained('penawaran');
            $table->date('tgl_reservasi');
            $table->integer('jumlah_pemesanan');
            $table->float('total_harga');
            $table->enum('status', ['Belum Dibayar', 'Berhasil', 'Gagal'])->default('Belum Dibayar');
          });

          Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reservasi')->constrained('reservasi');
            $table->string('metode_pembayaran');
            $table->enum('status', ['Belum Dibayar', 'Berhasil', 'Gagal'])->default('Belum Dibayar');
          });

          Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_payment')->constrained('payment');
            $table->enum('status', ['Belum Dibayar', 'Berhasil', 'Gagal'])->default('Belum Dibayar');
          });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('wisatawan');
        Schema::dropIfExists('perusahaan');
        Schema::dropIfExists('rating');
        Schema::dropIfExists('penawaran');
        Schema::dropIfExists('subfoto_penawaran');
        Schema::dropIfExists('reservasi');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('transaksi');
    }
};
