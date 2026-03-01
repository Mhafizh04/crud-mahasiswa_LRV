<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'mahasiswas';

    // Primary key
    protected $primaryKey = 'id';

    // Field yang boleh diisi
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'kode_mk',
        'user_id'
    ];

    // Jika tabel tidak punya created_at & updated_at
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | RELASI KE MATA KULIAH
    |--------------------------------------------------------------------------
    | kode_mk di tabel mahasiswas
    | terhubung ke kode_mk di tabel mata_kuliahs
    */
    public function matakuliah()
    {
        return $this->belongsTo(
            MataKuliah::class,
            'kode_mk',   // foreign key di mahasiswas
            'kode_mk'    // primary key di mata_kuliahs
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE USER (DIBUAT OLEH)
    |--------------------------------------------------------------------------
    | user_id di tabel mahasiswas
    | terhubung ke id di tabel users
    */
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id', // foreign key
            'id'       // primary key users
        );
    }
}