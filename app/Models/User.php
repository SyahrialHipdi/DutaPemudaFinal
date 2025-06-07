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
        'nik',
        'nama',
        'email',
        'whatsapp',
        'tanggalLahir',
        'password',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'rt_rw',
        'alamat',
        'kodePos',
        'proposal',
        'ktp',
        'status',
        'rejected_reason',
        // 'bidang',
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

        public function verifier()
{
    return $this->belongsTo(Admin::class, 'verified_by');
}

// public function getProvinsiNamaAttribute()
// {
//     return TrefRegion::where('code', $this->provinsi)->value('name');
// }

// public function getKotaNamaAttribute()
// {
//     return TrefRegion::where('code', $this->kota)->value('name');
// }

    public function provinsiWilayah()
{
    return $this->belongsTo(TrefRegion::class, 'provinsi', 'code');
}

public function kabupatenWilayah()
{
    return $this->belongsTo(TrefRegion::class, 'kota', 'code');
}

public function kecamatanWilayah()
{
    return $this->belongsTo(TrefRegion::class, 'kecamatan', 'code');
}
public function desaWilayah()
{
    return $this->belongsTo(TrefRegion::class, 'desa', 'code');
}

public function pendaftaranLomba(): HasMany
    {
        return $this->hasMany(PendaftaranLomba::class);
    }

}