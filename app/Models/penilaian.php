<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    //

    protected $table = 'penilaians';
    
    protected $fillable = [
        'juri_id',
        'lomba_id',
        'peserta_id',
        'nilai',
        'komentar',
    ];
    
    public function juri()
    {
        return $this->belongsTo(User::class, 'juri_id');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class, 'peserta_id');
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }

}
