<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = [
            (object) [
                'judul' => 'RAHASIA DENDAM',
                'deskripsi' => '“Pengabdi Setan 2: Communion”, Suguhan Sequel dalam Selubung Horor...',
                'gambar' => 'rahasia-dendam.jpg'
            ],
            (object) [
                'judul' => 'JROM DI JAKARTA MERDEKA !!!',
                'deskripsi' => 'Film ini berhasil mengangkat semangat kebersamaan generasi muda...',
                'gambar' => 'jrom.jpg'
            ],
            (object) [
                'judul' => 'Fast & Furious 10 Tampilkan Aksi Fenomenal',
                'deskripsi' => 'Dominic Toretto kembali memimpin keluarganya dalam misi...',
                'gambar' => 'fast10.jpg'
            ],
            (object) [
                'judul' => 'Spider-Man: No Way Home Pecahkan Rekor',
                'deskripsi' => 'Film Marvel ini memecahkan rekor dan menjadi film terlaris...',
                'gambar' => 'spiderman.jpg'
            ],
            (object) [
                'judul' => 'The Batman',
                'deskripsi' => 'Bruce Wayne kembali hadir dengan sisi gelap Gotham City...',
                'gambar' => 'batman.jpg'
            ],
            (object) [
                'judul' => 'Encanto',
                'deskripsi' => 'Kisah ajaib keluarga Madrigal yang penuh warna dan pesan moral...',
                'gambar' => 'encanto.jpg'
            ],
        ];

        return view('berita', compact('beritas'));
    }
}

