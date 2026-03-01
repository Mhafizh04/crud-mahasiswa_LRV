<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {

            // Primary Key
            $table->string('nim')->primary();

            $table->string('nama');
            $table->string('kelas');

            // Foreign Key ke MataKuliah
            $table->string('kode_mk');

            // User yang membuat data
            $table->foreignId('dibuat_oleh')->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();

            // Foreign key relasi ke mata_kuliahs
            $table->foreign('kode_mk')
                  ->references('kode_mk')
                  ->on('mata_kuliahs')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};