<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'pesertas';
    
    protected $fillable = [
        'Id_user',
        'nik',
        'nama',
        'lahir',
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'rt_rw',
        'alamat',
        'kodepos',
        'ktp',
    ];

    public function user(){
        return $this->belongsTo(User::class,'Id_user');
    }

    // protected $casts = [
    //     'syarat_lomba' => 'array',
    //     'komponen_penilaian' => 'array',
    // ];
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
}
