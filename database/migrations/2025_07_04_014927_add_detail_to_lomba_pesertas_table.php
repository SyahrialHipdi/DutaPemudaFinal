<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lomba_pesertas', function (Blueprint $table) {
            //
            
            $table->enum('bidang', ['pendidikan', 'Pengelolaan sumber daya alam', 'lingkungan dan pariwisata','pangan','inovasi teknolgi','sosial','agama','budaya'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lomba_pesertas', function (Blueprint $table) {
            //
        });
    }
};
