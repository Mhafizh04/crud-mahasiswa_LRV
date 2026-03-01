<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Data Mahasiswa</h4>
                </div>

                <div class="card-body">

                    {{-- ERROR VALIDATION --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf

                        <!-- NIM -->
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text"
                                   name="nim"
                                   class="form-control"
                                   value="{{ old('nim') }}"
                                   required>
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="{{ old('nama') }}"
                                   required>
                        </div>

                        <!-- Kelas -->
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text"
                                   name="kelas"
                                   class="form-control"
                                   value="{{ old('kelas') }}"
                                   required>
                        </div>

                        <!-- Mata Kuliah Dropdown -->
                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>

                            <select name="kode_mk" class="form-select" required>
                                <option value="">-- Pilih Mata Kuliah --</option>

                                @foreach($matakuliah as $mk)
                                    <option value="{{ $mk->kode_mk }}"
                                        {{ old('kode_mk') == $mk->kode_mk ? 'selected' : '' }}>
                                        {{ $mk->nama_mk }} ({{ $mk->kode_mk }})
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>