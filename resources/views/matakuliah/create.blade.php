<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
</head>
<body>

<h2>Tambah Mata Kuliah</h2>

<form action="{{ route('matakuliah.store') }}" method="POST">
    @csrf

    Kode MK : <br>
    <input type="text" name="kode_mk"><br><br>

    Nama MK : <br>
    <input type="text" name="nama_mk"><br><br>

    SKS : <br>
    <input type="number" name="sks"><br><br>

    Semester : <br>
    <input type="number" name="semester"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
