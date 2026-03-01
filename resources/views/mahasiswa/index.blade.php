@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Mahasiswa</h4>

        <div>
            <a href="{{ route('mahasiswa.cetak_pdf') }}" 
               class="btn btn-danger me-2">
                Cetak PDF
            </a>

            <a href="{{ route('mahasiswa.create') }}" 
               class="btn btn-primary">
                + Tambah Mahasiswa
            </a>
        </div>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead style="background-color:#212529; color:white;">
                        <tr class="text-center">
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Dibuat Oleh</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($mahasiswas as $m)
                        <tr>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->kelas }}</td>

                            <td>
                                {{ optional($m->matakuliah)->nama_mk ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ optional($m->matakuliah)->sks ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ optional($m->matakuliah)->semester ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ $m->user->name ?? 'Admin' }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('mahasiswa.edit',$m->id) }}" 
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>

                                <form action="{{ route('mahasiswa.destroy',$m->id) }}" 
                                      method="POST" 
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center p-3">
                                Data mahasiswa belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection