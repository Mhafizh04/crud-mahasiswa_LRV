<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8f9fa;">

<div class="container mt-5">

    <!-- Detail Mata Kuliah -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            Detail Mata Kuliah
        </div>

        <div class="card-body">
            <p><strong>Kode MK :</strong> {{ $matakuliah->kode_mk }}</p>
            <p><strong>Nama MK :</strong> {{ $matakuliah->nama_mk }}</p>
            <p><strong>SKS :</strong> {{ $matakuliah->sks }}</p>
            <p><strong>Semester :</strong> {{ $matakuliah->semester }}</p>
        </div>
    </div>

    <!-- Mahasiswa -->
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            Mahasiswa yang Mengambil Mata Kuliah Ini
        </div>

        <div class="card-body">

            @if($matakuliah->mahasiswas && $matakuliah->mahasiswas->count() > 0)

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($matakuliah->mahasiswas as $m)
                        <tr>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->kelas }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="alert alert-warning">
                    Tidak ada mahasiswa mengambil mata kuliah ini
                </div>
            @endif

            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary mt-3">
                Kembali
            </a>

        </div>
    </div>

</div>

</body>
</html>