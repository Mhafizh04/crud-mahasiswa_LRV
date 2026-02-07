<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Tentukan nama tabel sesuai database
    protected $table = 'mahasiswas';

    // Field yang boleh diisi
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'matakuliah'
    ];

    // Set primary key = nim
    protected $primaryKey = 'nim';

    // Karena bukan auto increment
    public $incrementing = false;

    // Tipe primary key string
    protected $keyType = 'string';
}
