<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/YYYY_MM_DD_HHMMSS_add_verification_fields_to_users_table.php

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom untuk menyimpan status verifikasi peserta.
            // Diberi nilai default 'menunggu' untuk semua user yang sudah ada.
            $table->string('status')->default('menunggu')->after('password');

            // Kolom untuk menyimpan alasan jika pendaftaran ditolak.
            // Dibuat nullable karena hanya diisi jika statusnya 'rejected'.
            $table->text('alasan_penolakan')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    // Di file yang sama, isi method down()

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('alasan_penolakan');
        });
    }
};
