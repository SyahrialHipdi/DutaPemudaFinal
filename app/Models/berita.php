<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'tanggal',
        'id_kategori'
        ];
}
