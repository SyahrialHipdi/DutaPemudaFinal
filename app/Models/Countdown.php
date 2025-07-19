<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countdown extends Model
{
    protected $fillable = ['title', 'target_datetime', 'status'];

    protected $casts = [
        'target_datetime' => 'datetime',
    ];
    //
}
