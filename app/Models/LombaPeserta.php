<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LombaPeserta extends Model
{
    protected $fillable = ['user_id', 'lomba_id', 'bidang', 'status', 'alasan'];

    // protected $casts = [
    // 'data_isian' => 'array',
    // ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'user_id', 'Id_user');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }
}
