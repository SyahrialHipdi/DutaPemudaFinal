<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Sertifikat.php
class Sertifikat extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id', 'lomba_id', 'nomor_sertifikat', 'file_path'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lomba() {
        return $this->belongsTo(Lomba::class);
    }
}

