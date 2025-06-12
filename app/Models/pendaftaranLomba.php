<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pendaftaranLomba extends Model
{
    protected $table = 'pendaftaran_lomba';

protected $casts = [
    'extra_data' => 'array',
];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lomba(): BelongsTo
    {
        return $this->belongsTo(Lomba::class);
    }
    
}
