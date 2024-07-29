<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class wisatawan extends Model
{
    use HasFactory;

    protected $table = 'wisatawan';

    protected $fillable = [
        'id_users',
        'tgl_lahir',
        'gender',
        'wa_wisatawan',
        'gambar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function rating() :HasOne
    {
        return $this->hasOne(rating::class, 'id_users');
    }

    public function reservasi():HasMany
    {
        return $this->hasMany(Reservasi::class, 'id_wisatawan', 'id');
    }

    protected static function boot()
{
    parent::boot();

    static::deleting(function ($wisatawan) {
        if ($wisatawan->gambar) {
            Storage::disk('public')->delete($wisatawan->gambar);
        }
    });
}
}
