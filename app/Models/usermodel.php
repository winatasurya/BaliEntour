<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];
}
