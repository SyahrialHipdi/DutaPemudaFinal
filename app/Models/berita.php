<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'user_id',
        'kategori_id',
    ];
    public function user() // Nama metode biasanya tunggal (singular)
    {
        return $this->belongsTo(User::class);
    }

    // app/Models/Berita.php

    // ... (di dalam class Berita)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
