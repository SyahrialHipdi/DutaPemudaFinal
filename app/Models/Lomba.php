<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    //
    protected $fillable = [
        'name',
        'username',
        'role',
        'password',
    ];

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(PendaftaranLomba::class);
    }
}
