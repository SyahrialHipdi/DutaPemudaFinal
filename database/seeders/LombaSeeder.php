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
        $lombas = [
            [
                'nama_lomba' => 'Lomba A',
                'tahun' => 2025,
                'deskripsi' => 'Lomba A adalah lomba menulis esai nasional untuk mahasiswa.',
            ],
            [
                'nama_lomba' => 'Lomba B',
                'tahun' => 2025,
                'deskripsi' => 'Lomba B adalah lomba debat Bahasa Inggris tingkat universitas.',
            ],
        ];

        foreach ($lombas as $lomba) {
            Lomba::create($lomba);
        }
    }
}
