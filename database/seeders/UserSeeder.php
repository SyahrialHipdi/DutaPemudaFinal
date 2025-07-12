<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
            'email' => 'juripp1@example.com',
            'role' => 'juri',
            'password' => '12345',
        ]);

        User::create([
            'email' => 'juripp2@example.com',
            'role' => 'juri',
            'password' => '12345',
        ]);

        User::create([
            // 'name' => 'Juri',
            'email' => 'jurippan@example.com',
            'role' => 'juri',
            'password' => '12345',
        ]);


        // User::create([
        //     'email' => 'syahrial@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);

        // User::create([
        //     'email' => 'hipdi@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);
        // User::create([
        //     'email' => 'ahmad@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);
        // User::create([
        //     'email' => 'karel@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);
        // User::create([
        //     'email' => 'diaz@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);
        // User::create([
        //     'email' => 'bilqis@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);
        // User::create([
        //     'email' => 'una@gmail.com',
        //     'role' => 'peserta',
        //     'password' => '12345',
        // ]);
    }
}
