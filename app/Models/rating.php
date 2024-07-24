<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = 'rating';
    use HasFactory;

    protected $fillable = [
        'id_perusahaan',
        'id_wisatawan',
        'nilai',
        'komentar',
    ];
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function wisatawan()
    {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan');
    }

}
