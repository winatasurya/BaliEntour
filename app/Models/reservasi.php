<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $guarded = [];

    public function wisatawan()
    {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan', 'id');
    }
}
