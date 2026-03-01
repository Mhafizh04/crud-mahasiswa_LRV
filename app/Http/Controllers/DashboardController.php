<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalMataKuliah = MataKuliah::count();

        return view('dashboard', compact(
            'totalMahasiswa',
            'totalMataKuliah'
        ));
    }
}
