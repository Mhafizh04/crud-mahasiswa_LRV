<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Edit Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        
                        {{-- Tampilkan pesan error --}}
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Field NIM (readonly) -->
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input type="text" 
                                       class="form-control bg-light" 
                                       value="{{ $mahasiswa->nim }}"
                                       readonly>
                                <small class="text-muted">NIM tidak dapat diubah</small>
                            </div>
                            
                            <!-- Field Nama -->
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" 
                                       name="nama" 
                                       class="form-control" 
                                       value="{{ old('nama', $mahasiswa->nama) }}"
                                       required>
                            </div>
                            
                            <!-- Field Kelas -->
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" 
                                       name="kelas" 
                                       class="form-control" 
                                       value="{{ old('kelas', $mahasiswa->kelas) }}"
                                       required>
                            </div>
                            
                            <!-- Field Matakuliah -->
                            <div class="mb-3">
                                <label class="form-label">Matakuliah</label>
                                <input type="text" 
                                       name="matakuliah" 
                                       class="form-control" 
                                       value="{{ old('matakuliah', $mahasiswa->matakuliah) }}"
                                       required>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-warning">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>