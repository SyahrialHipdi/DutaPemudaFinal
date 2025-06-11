<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Lomba;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
        // 'name' => 'Super dmin',
        'email' => 'admin@example.com',
        'role' => 'admin',
        'password' => '12345',
        ]);

        User::create([
        // 'name' => 'Verifikator',
        'email' => 'verifikator@example.com',
        'role' => 'verifikator',
        'password' => '12345',
        ]);

        User::create([
        // 'name' => 'Juri',
        'email' => 'juri@example.com',
        'role' => 'juri',
        'password' => '12345',
        ]);

        User::create([
        // 'name' => 'Juri',
        'email' => 'juri@example.com',
        'role' => 'juri',
        'password' => '12345',
        ]);
        User::create([
        // 'name' => 'Juri',
        'email' => 'syahrial@gmail.com',
        'role' => 'peserta',
        'password' => '12345',
        ]);
        User::create([
        // 'name' => 'Juri',
        'email' => 'hipdi@gmail.com',
        'role' => 'peserta',
        'password' => '12345',
        ]);

        // Lomba::create([
        // 'nama_lomba' => 'Pemuda Pelopor',
        // 'tahun' => '2025',
        // 'deskripsi' => 'Pemuda Pelopor 2025',
        // ]);
    }
}
