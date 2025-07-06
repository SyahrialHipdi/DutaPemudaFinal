<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LombaPeserta extends Model
{
    protected $fillable = ['user_id', 'lomba_id','bidang' ,'status','alasan'];

    // protected $casts = [
    // 'data_isian' => 'array',
    // ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function lomba()
{
    return $this->belongsTo(Lomba::class);
}
}
