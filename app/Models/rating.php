<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penawaran() :HasMany
    {
        return $this->HasMany(penawaran::class, 'id_perusahaan');
    }

}
