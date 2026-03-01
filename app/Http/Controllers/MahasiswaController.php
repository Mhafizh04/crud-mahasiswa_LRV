<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Tambahan untuk PDF

class MahasiswaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['matakuliah', 'user'])->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /*
    |--------------------------------------------------------------------------
    | CETAK PDF
    |--------------------------------------------------------------------------
    */
    public function cetak_pdf()
    {
        $mahasiswas = Mahasiswa::with(['matakuliah', 'user'])->get();

        $pdf = Pdf::loadView('mahasiswa.laporan_pdf', compact('mahasiswas'));

        return $pdf->download('laporan-mahasiswa.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $matakuliah = MataKuliah::orderBy('nama_mk')->get();
        return view('mahasiswa.create', compact('matakuliah'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nim'      => 'required|string|max:20|unique:mahasiswas,nim',
            'nama'     => 'required|string|max:100',
            'kelas'    => 'required|string|max:50',
            'kode_mk'  => 'required|exists:mata_kuliahs,kode_mk',
        ]);

        Mahasiswa::create([
            'nim'      => $request->nim,
            'nama'     => $request->nama,
            'kelas'    => $request->kelas,
            'kode_mk'  => $request->kode_mk,
            'user_id'  => Auth::id(),
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $mahasiswa  = Mahasiswa::findOrFail($id);
        $matakuliah = MataKuliah::orderBy('nama_mk')->get();

        return view('mahasiswa.edit', compact('mahasiswa', 'matakuliah'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'kelas'    => 'required|string|max:50',
            'kode_mk'  => 'required|exists:mata_kuliahs,kode_mk',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama'     => $request->nama,
            'kelas'    => $request->kelas,
            'kode_mk'  => $request->kode_mk,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}