@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">

        <div class="card-header bg-warning text-white">
            <h4>Edit Mahasiswa</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- NIM (readonly) --}}
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control"
                           value="{{ $mahasiswa->nim }}" readonly>
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $mahasiswa->nama) }}" required>
                </div>

                {{-- Kelas --}}
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control"
                           value="{{ old('kelas', $mahasiswa->kelas) }}" required>
                </div>

                {{-- Mata Kuliah Dropdown --}}
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="kode_mk" class="form-select" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($matakuliah as $mk)
                            <option value="{{ $mk->kode_mk }}"
                                {{ $mahasiswa->kode_mk == $mk->kode_mk ? 'selected' : '' }}>
                                {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    Update
                </button>

                <a href="{{ route('mahasiswa.index') }}" 
                   class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>
</div>
@endsection