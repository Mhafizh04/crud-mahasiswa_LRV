<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('matakuliah.index', compact('mataKuliahs'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('matakuliah.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk'  => 'required|unique:mata_kuliahs,kode_mk',
            'nama_mk'  => 'required',
            'sks'      => 'required|integer',
            'semester' => 'required|integer',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show(MataKuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(MataKuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'nama_mk'  => 'required',
            'sks'      => 'required|integer',
            'semester' => 'required|integer',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | MENAMPILKAN MAHASISWA YANG MENGAMBIL MATA KULIAH
    |--------------------------------------------------------------------------
    */
    public function mahasiswa($kode_mk)
    {
        // Ambil data mata kuliah berdasarkan kode_mk
        $mataKuliah = MataKuliah::where('kode_mk', $kode_mk)->firstOrFail();

        // Ambil mahasiswa yang mengambil mata kuliah tersebut
        // (Pastikan di tabel mahasiswa ada field kode_mk)
        $mahasiswas = Mahasiswa::where('kode_mk', $kode_mk)->get();

        return view('matakuliah.mahasiswa', compact('mataKuliah', 'mahasiswas'));
    }
}