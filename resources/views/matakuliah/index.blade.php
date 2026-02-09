<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
</head>
<body>

<h2>Data Mata Kuliah</h2>

<a href="{{ route('matakuliah.create') }}">Tambah Data</a>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Aksi</th>
    </tr>

    @foreach ($matakuliahs as $mk)
    <tr>
        <td>{{ $mk->kode_mk }}</td>
        <td>{{ $mk->nama_mk }}</td>
        <td>{{ $mk->sks }}</td>
        <td>{{ $mk->semester }}</td>
        <td>
            <a href="{{ route('matakuliah.edit', $mk->kode_mk) }}">Edit</a>

            <form action="{{ route('matakuliah.destroy', $mk->kode_mk) }}" 
                  method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Yakin hapus data?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>