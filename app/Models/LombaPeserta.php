<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LombaPeserta extends Model
{
    protected $fillable = ['user_id', 'lomba_id', 'data_isian'];

    protected $casts = [
    'data_isian' => 'array',
    ];

}
