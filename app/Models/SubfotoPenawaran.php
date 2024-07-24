<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubfotoPenawaran extends Model
{
    use HasFactory;

    protected $table = 'subfoto_penawaran';

    protected $fillable = [
        'id_penawaran',
        'subfoto'
    ];

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class, 'id_penawaran');
    }
}
