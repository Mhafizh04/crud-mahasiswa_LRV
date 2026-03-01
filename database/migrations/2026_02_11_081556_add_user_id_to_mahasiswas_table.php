<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom user_id
     */
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {

            // Tambah kolom user_id + foreign key
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('kode_mk')
                  ->constrained()
                  ->cascadeOnDelete();
        });
    }

    /**
     * Rollback
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {

            // Hapus foreign key dulu
            $table->dropForeign(['user_id']);

            // Hapus kolom
            $table->dropColumn('user_id');
        });
    }
};