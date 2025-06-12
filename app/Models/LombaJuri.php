<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LombaJuri extends Model
{
    //
    protected $table = 'lomba_juris';
    
    protected $fillable = [
        'user_id',
        'lomba_id',
    ];

    // protected $casts = [
    //     'syarat_lomba' => 'array',
    // ];
}
