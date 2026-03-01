@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Mata Kuliah</h4>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">
            + Tambah Mata Kuliah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th width="280px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($mataKuliahs as $row)
                        <tr>
                            <td>{{ $row->kode_mk }}</td>
                            <td>{{ $row->nama_mk }}</td>
                            <td>{{ $row->sks }}</td>
                            <td>{{ $row->semester }}</td>
                            <td>

                                <!-- 🔥 Tombol Mahasiswa -->
                                <a href="{{ route('mata_kuliah.mahasiswa', $row->kode_mk) }}"
                                   class="btn btn-info btn-sm">
                                    Mahasiswa
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('matakuliah.edit', $row) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('matakuliah.destroy', $row) }}"
                                      method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Data belum tersedia
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection