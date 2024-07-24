<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
        return $this->belongsTo(User::class, 'id_users');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function getSlugAttribute()
    {
        return 'show/' . Str::slug($this->user->name);
    }

    public function penawaran() :HasMany
    {
        return $this->HasMany(penawaran::class, 'id_perusahaan');
    }

    public function rating() :HasMany
    {
        return $this->HasMany(rating::class, 'id_perusahaan');
    }
}
