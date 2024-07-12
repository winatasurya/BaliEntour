<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisatawan extends Model
{
    use HasFactory;

    protected $table = 'wisatawan';

    protected $fillable = [
        'id_users',
        'tgl_lahir',
        'gender',
        'wa_wisatawan'
    ];
}
