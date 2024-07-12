<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $fillable = [
        'id_users',
        'perizinan',
        'lokasi',
        'bidang',
        'wa_perusahaan',
        'logo',
        'penilaian',
        'deskripsi',
    ];
}
