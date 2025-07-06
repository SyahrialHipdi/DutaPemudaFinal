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
        Schema::table('lombas', function (Blueprint $table) {
            //\php artisan make:migration add_status_to_users_
            $table->enum('role', ['pemuda pelopor', 'ppap'])->default('pemuda pelopor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lombas', function (Blueprint $table) {
            //
        });
    }
};
