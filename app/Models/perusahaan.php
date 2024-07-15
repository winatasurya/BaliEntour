<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penawaran() :HasMany
    {
        return $this->HasMany(penawaran::class, 'id_perusahaan');
    }
}
