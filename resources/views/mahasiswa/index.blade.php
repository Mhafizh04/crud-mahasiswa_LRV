<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Data Mahasiswa</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Pesan error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tombol tambah --}}
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">
        + Tambah Mahasiswa
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Mata Kuliah</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($mahasiswas ?? [] as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->kelas }}</td>
                <td>{{ $mahasiswa->matakuliah }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin mau hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5" class="text-center">
                    Belum ada data mahasiswa
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
