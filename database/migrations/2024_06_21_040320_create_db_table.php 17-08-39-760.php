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
        Schema::create('wisatawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->date('tgl_lahir')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('wa_wisatawan')->nullable();
            $table->timestamps();
          });

          Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->enum('perizinan', ['setuju', 'tidak'])->default('tidak')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('bidang')->nullable();
            $table->string('wa_perusahaan')->nullable();
            $table->string('logo')->nullable();
            $table->float('penilaian')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
          });

          Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan')->constrained('perusahaan')->onDelete('cascade');
            $table->foreignId('id_wisatawan')->constrained('wisatawan');
            $table->float('nilai');
            $table->text('komentar');
            $table->timestamps();
          });

          Schema::create('penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan')->constrained('perusahaan')->onDelete('cascade');
            $table->string('nama_penawaran');
            $table->float('harga');
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->timestamps();
          });

          Schema::create('subfoto_penawaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penawaran')->constrained('penawaran')->onDelete('cascade');
            $table->string('subfoto');
            $table->timestamps();
          });

          Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wisatawan')->constrained('wisatawan');
            $table->foreignId('id_penawaran')->constrained('penawaran')->onDelete('cascade');
            $table->date('tgl_reservasi');
            $table->integer('jumlah_pemesanan');
            $table->float('total_harga');
            $table->enum('status', ['Belum Dibayar', 'Berhasil', 'Gagal'])->default('Belum Dibayar');
            $table->timestamps();
          });

          Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reservasi')->constrained('reservasi')->onDelete('cascade');
            $table->string('metode_pembayaran');
            $table->enum('status', ['Belum Dibayar', 'Berhasil', 'Gagal'])->default('Belum Dibayar');
            $table->timestamps();
          });

          Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_payment')->constrained('payment')->onDelete('cascade');
            $table->enum('status', ['Belum Dibayar', 'Berhasil', 'Gagal'])->default('Belum Dibayar');
            $table->timestamps();
          });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
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
