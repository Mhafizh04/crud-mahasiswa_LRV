<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class MataKuliah extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */
    protected $table = 'mata_kuliahs';

    /*
    |--------------------------------------------------------------------------
    | Primary Key
    |--------------------------------------------------------------------------
    | Karena tidak menggunakan kolom "id"
    */
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
    ];

    /*
    |--------------------------------------------------------------------------
    | Route Model Binding
    |--------------------------------------------------------------------------
    | Supaya Route::resource() pakai kode_mk
    */
    public function getRouteKeyName()
    {
        return 'kode_mk';
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    | 1 Mata Kuliah memiliki banyak Mahasiswa
    */
    public function mahasiswas()
    {
        return $this->hasMany(
            Mahasiswa::class,
            'kode_mk', // foreign key di tabel mahasiswas
            'kode_mk'  // local key di tabel mata_kuliahs
        );
    }
}