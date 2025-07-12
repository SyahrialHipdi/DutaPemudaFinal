<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lomba;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lomba::create([
            'nama_lomba' => 'PP 2025',
            'tahun' => 2025,
            'deskripsi' => 'Pemuda Pelopor 2025',
            // 'syarat_lomba' => ['nik:text', 'Provinsi:text', 'Kota:text', 'Kecamatan:text', 'Desa:text' ],
            'komponen_penilaian' => ['proposal', 'publicspeaking'],
        ]);

        Lomba::create([
            'nama_lomba' => 'PPAP 2025',
            'tahun' => 2025,
            'deskripsi' => 'Pertukaran Pelajar Antar Provinsi 2025',
            'role' => 'ppan',
            // 'syarat_lomba' => ['Nama:text', 'lahir:date','ktp:file'],
            'komponen_penilaian' => ['proposal', 'presentasi', 'jawaban'],
        ]);
    }
}
