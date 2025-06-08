<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
     protected $table = 'lombas';
    //
    protected $fillable = [
        'nama_lomba',
        'tahun',
        'deskripsi',
    ];

    public function pendaftaranLomba()
{
    return $this->hasMany(PendaftaranLomba::class);
}

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(PendaftaranLomba::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['alamat', 'email'])->withTimestamps();
    }
}
