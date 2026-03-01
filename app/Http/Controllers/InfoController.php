<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALO (Masih Return Text Biasa)
    |--------------------------------------------------------------------------
    */
    public function halo()
    {
        return "Halo! Ini adalah respon dari InfoController.";
    }

    /*
    |--------------------------------------------------------------------------
    | KAMPUS (Sudah Menggunakan View)
    |--------------------------------------------------------------------------
    */
    public function kampus()
    {
        return view('kampus');
    }
}