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


        Schema::create('lomba_pesertas', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lomba_id')->constrained()->onDelete('cascade');

            // Optional field
            $table->string('bidang')->nullable();
            $table->string('proposal')->nullable();

            // Status & alasan
            $table->enum('status', ['pending', 'proses', 'juara', 'selesai', 'ditolak'])->default('pending');
            $table->string('alasan')->nullable();

            $table->timestamps();

            // ✅ Unik: user hanya bisa ikut 1 kali dalam lomba yang sama
            $table->unique(['user_id', 'lomba_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba_pesertas');
    }
};
