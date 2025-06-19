<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lombas';
    
    protected $fillable = [
        'nama_lomba',
        'tahun',
        'deskripsi',
        'syarat_lomba',
        'komponen_penilaian',
    ];

    protected $casts = [
        'syarat_lomba' => 'array',
        'komponen_penilaian' => 'array',
    ];
    
    // public function users()
    // {
    //     return $this->belongsToMany(User::class)->withPivot(['data_isian'])->withTimestamps();
    // }

    public function users()
    {
        return $this->belongsToMany(User::class,'lomba_pesertas')->withPivot('data_isian')->withTimestamps();
    }

    // Jurinya
    public function juris()
    {
        return $this->belongsToMany(User::class, 'juri_lomba');
    }

    // Penilaian dalam lomba ini
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'lomba_id');
    }


//     public function pendaftaranLomba()
// {
//     return $this->hasMany(PendaftaranLomba::class);
// }

//     public function pendaftaran(): HasMany
//     {
//         return $this->hasMany(PendaftaranLomba::class);
//     }

}
