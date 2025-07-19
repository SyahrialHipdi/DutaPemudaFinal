<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lomba;
use App\Models\User;

class LombaJuriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $juriA = User::find(3); // Juri A
        $juriB = User::find(4); // Juri B

        $lombaX = Lomba::find(1); // Lomba X
        $lombaY = Lomba::find(1); // Lomba Y

        if ($juriA && $lombaX) {
            $juriA->lombaDijuri()->attach($lombaX->id);
        }

        if ($juriB && $lombaY) {
            $juriB->lombaDijuri()->attach($lombaY->id);
        }
    }
}
