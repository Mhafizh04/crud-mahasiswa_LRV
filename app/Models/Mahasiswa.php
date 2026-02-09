<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Nama tabel
    protected $table = 'mahasiswas';

    // Primary key
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    // Field yang bisa diisi
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'matakuliah'
    ];

    // Nonaktifkan timestamps
    public $timestamps = false;
}
