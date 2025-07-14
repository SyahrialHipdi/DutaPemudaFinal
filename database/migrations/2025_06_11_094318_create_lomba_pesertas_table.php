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
            $table->foreignId('user_id');
            $table->foreignId('lomba_id');
            $table->json('data_isian');
            $table->enum('status',['pending','proses','juara','selesai','ditolak'])->default('pending');
            $table->string('alasan')->nullable();
            $table->timestamps();
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
