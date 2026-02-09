<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->string('kode_mk', 10)->primary(); // Primary key
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->integer('semester');
            $table->timestamps(); // (opsional tapi disarankan)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
