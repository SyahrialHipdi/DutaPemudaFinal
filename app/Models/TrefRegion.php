<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrefRegion extends Model
{
    //
    protected $table = 'tref_regions';

    // Nonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'code',
        'name',
    ];
}
