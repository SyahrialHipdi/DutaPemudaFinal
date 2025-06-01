<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
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

        Admin::create([
        'name' => 'Super Admin',
        'username' => 'admin@example.com',
        'role' => 'admin',
        'password' => '12345',
        ]);

        Admin::create([
        'name' => 'Verifikator',
        'username' => 'verifikator@example.com',
        'role' => 'verifikator',
        'password' => '12345',
        ]);

        Admin::create([
        'name' => 'Juri',
        'username' => 'juri@example.com',
        'role' => 'juri',
        'password' => '12345',
        ]);
    }
}
