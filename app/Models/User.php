<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function lombas()
    {
        return $this->belongsToMany(Lomba::class, 'lomba_pesertas')->withPivot('data_isian')->withTimestamps();
        // return $this->belongsToMany(Lomba::class)->withPivot('data_isian')->withTimestamps();
    }

    public function lombaDijuri()
    {
        return $this->belongsToMany(Lomba::class, 'lomba_juris');
    }

    public function lombaDiikuti()
    {
        return $this->belongsToMany(Lomba::class, 'lomba_pesertas')->withPivot('status','alasan');
    }

    public function penilaianDiberikan()
    {
        return $this->hasMany(Penilaian::class, 'juri_id');
    }








    public function pendaftaranLomba()
{
    return $this->hasMany(PendaftaranLomba::class);
}

    public function isAdmin():bool
    {
        return $this->role === 'admin';
    }
    public function isJuri():bool
    {
        return $this->role === 'juri';
    }
    public function isVerifikator():bool
    {
        return $this->role === 'verifikator';
    }
    public function isPeserta():bool
    {
        return $this->role === 'peserta';
    }

//         public function verifier()
// {
//     return $this->belongsTo(Admin::class, 'verified_by');
// }

// public function getProvinsiNamaAttribute()
// {
//     return TrefRegion::where('code', $this->provinsi)->value('name');
// }

//     public function provinsiWilayah()
// {
//     return $this->belongsTo(TrefRegion::class, 'provinsi', 'code');
// }

// public function kotaWilayah()
// {
//     return $this->belongsTo(TrefRegion::class, 'kota', 'code');
// }

// public function kecamatanWilayah()
// {
//     return $this->belongsTo(TrefRegion::class, 'kecamatan', 'code');
// }
// public function desaWilayah()
// {
//     return $this->belongsTo(TrefRegion::class, 'desa', 'code');
// }

// public function pendaftaranLomba(): HasMany
//     {
//         return $this->hasMany(PendaftaranLomba::class);
//     }

}