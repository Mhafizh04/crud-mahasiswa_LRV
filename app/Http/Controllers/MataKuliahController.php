<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    // TAMPILKAN SEMUA DATA
    public function index()
    {
        $matakuliahs = MataKuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    // FORM TAMBAH DATA
    public function create()
    {
        return view('matakuliah.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|string|max:10|unique:mata_kuliahs,kode_mk',
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        MataKuliah::create($validated);
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($kode_mk)
    {
        $matakuliah = MataKuliah::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    // UPDATE DATA
    public function update(Request $request, $kode_mk)
    {
        $matakuliah = MataKuliah::findOrFail($kode_mk);

        $validated = $request->validate([
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        $matakuliah->update($validated);
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    // HAPUS DATA
    public function destroy($kode_mk)
    {
        MataKuliah::findOrFail($kode_mk)->delete();
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil dihapus');
    }
}