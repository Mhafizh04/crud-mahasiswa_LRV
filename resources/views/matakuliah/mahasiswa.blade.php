<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Mahasiswa yang mengambil:
                {{ $mataKuliah->nama_mk }}
                ({{ $mataKuliah->kode_mk }})
            </h5>
        </div>

        <div class="card-body">

            <!-- Tombol Kembali -->
            <a href="{{ route('matakuliah.index') }}"
               class="btn btn-secondary mb-3">
               ← Kembali
            </a>

            @if($mahasiswas->count() > 0)

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswas as $index => $mhs)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->kelas }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="alert alert-warning">
                    Belum ada mahasiswa yang mengambil mata kuliah ini.
                </div>
            @endif

        </div>
    </div>

</div>

</body>
</html>