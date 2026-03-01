<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f2f2f2;">

<div class="container mt-5">

    <h4 class="mb-3">Data Mata Kuliah</h4>

    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">
        Tambah Mata Kuliah
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Semester</th>
                <th width="170">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($data as $row)
            <tr>
                <td>{{ $row->kode_mk }}</td>
                <td>{{ $row->nama_mk }}</td>
                <td>{{ $row->sks }}</td>
                <td>{{ $row->semester }}</td>
                <td>
                    {{-- EDIT --}}
                    <a href="{{ route('matakuliah.edit', $row->kode_mk) }}" 
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    {{-- DELETE --}}
                    <form action="{{ route('matakuliah.destroy', $row->kode_mk) }}" 
                          method="POST" 
                          style="display:inline;"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Data tidak tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>