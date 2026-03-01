<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {

            // Tambah kolom kode_mk (boleh NULL)
            $table->string('kode_mk', 10)
                  ->nullable()
                  ->after('kelas');

            // Jadikan foreign key
            $table->foreign('kode_mk')
                  ->references('kode_mk')
                  ->on('mata_kuliahs')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {

            // Hapus FK dulu
            $table->dropForeign(['kode_mk']);

            // Hapus kolom
            $table->dropColumn('kode_mk');
        });
    }
};