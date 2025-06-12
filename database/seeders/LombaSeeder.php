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
            'syarat_lomba' => ['Nama:text', 'alamat:text'],
        ]);

        Lomba::create([
            'nama_lomba' => 'PPAP 2025',
            'tahun' => 2025,
            'deskripsi' => 'Pertukaran Pelajar Antar Provinsi 2025',
            'syarat_lomba' => ['Nama:text', 'alasan:text','motto:text'],
        ]);

        // $lombas = [
        //     [
        //         'nama_lomba' => 'Lomba A',
        //         'tahun' => 2025,
        //         'deskripsi' => 'Lomba A adalah lomba menulis esai nasional untuk mahasiswa.',
        //     ],
        //     [
        //         'nama_lomba' => 'Lomba B',
        //         'tahun' => 2025,
        //         'deskripsi' => 'Lomba B adalah lomba debat Bahasa Inggris tingkat universitas.',
        //     ],
        // ];

        // foreach ($lombas as $lomba) {
        //     Lomba::create($lomba);
        // }
    }
}
