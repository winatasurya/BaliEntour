<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('wisatawan', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
      $table->date('tgl_lahir')->nullable();
      $table->string('wa_wisatawan')->nullable();
      $table->string('gambar')->nullable();
      $table->timestamps();
    });

    Schema::create('perusahaan', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
      $table->enum('perizinan', ['setuju', 'tidak'])->default('tidak')->nullable();
      $table->decimal('latitude', 10, 8)->nullable();
      $table->decimal('longitude', 11, 8)->nullable();
      $table->string('bidang')->nullable();
      $table->string('wa_perusahaan')->nullable();
      $table->string('logo')->nullable();
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
      $table->integer('ruang')->default(1);
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
      $table->foreignId('id_wisatawan')->nullable()->constrained('wisatawan')->onDelete('set null');
      $table->foreignId('id_penawaran')->nullable()->constrained('penawaran')->onDelete('set null');
      $table->string('no_transaksi')->nullable();
      $table->string('nama_perusahaan')->nullable();
      $table->string('nama_item')->nullable();
      $table->float('harga_item')->nullable();
      $table->float('qty')->nullable();
      $table->string('nama_pemesan')->nullable();
      $table->string('snap_token')->nullable();
      $table->date('tanggal_check_in')->nullable();
      $table->date('tanggal_check_out')->nullable();
      $table->time('waktu_check_in')->nullable();
      $table->time('waktu_check_out')->nullable();
      $table->float('total_harga')->nullable();
      $table->string('status')->default('pending');
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
  }
};
