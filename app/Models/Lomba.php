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
    ];

    protected $cast = [
        'syarat_lomba' => 'array',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['data_isian'])->withTimestamps();
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
