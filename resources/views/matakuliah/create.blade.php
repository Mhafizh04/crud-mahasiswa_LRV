<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f2f2f2;
        }

        .card-custom {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card-header-custom {
            background-color: #0d6efd;
            color: white;
            font-weight: 500;
            padding: 12px 20px;
            font-size: 18px;
        }

        .btn-area {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="card card-custom">
    <div class="card-header card-header-custom">
        Tambah Mata Kuliah
    </div>

    <div class="card-body">

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode MK</label>
                <input type="text" 
                       name="kode_mk" 
                       class="form-control @error('kode_mk') is-invalid @enderror"
                       value="{{ old('kode_mk') }}"
                       placeholder="0214">
                @error('kode_mk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mata Kuliah</label>
                <input type="text" 
                       name="nama_mk" 
                       class="form-control @error('nama_mk') is-invalid @enderror"
                       value="{{ old('nama_mk') }}"
                       placeholder="Data Mining">
                @error('nama_mk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">SKS</label>
                <input type="number" 
                       name="sks" 
                       class="form-control @error('sks') is-invalid @enderror"
                       value="{{ old('sks') }}"
                       placeholder="4">
                @error('sks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Semester</label>
                <input type="number" 
                       name="semester" 
                       class="form-control @error('semester') is-invalid @enderror"
                       value="{{ old('semester') }}"
                       placeholder="4">
                @error('semester')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-area">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
            </div>

        </form>

    </div>
</div>

</body>
</html>