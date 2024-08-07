<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penawaran extends Model
{
    use HasFactory;

    protected $table = 'penawaran';

    protected $fillable = [
        'id_perusahaan',
        'nama_penawaran',
        'harga',
        'ruang',
        'deskripsi',
        'foto',
        'logo',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function reservasi()
{
    return $this->hasMany(Reservasi::class, 'id_penawaran', 'id');
}
    public function subfoto()
    {
        return $this->hasMany(SubfotoPenawaran::class, 'id_penawaran');
    }
}
