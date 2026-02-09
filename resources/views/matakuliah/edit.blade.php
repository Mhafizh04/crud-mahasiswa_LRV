<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
</head>
<body>

<h2>Edit Mata Kuliah</h2>

<form action="{{ route('matakuliah.update',$matakuliah->kode_mk) }}" method="POST">
    @csrf
    @method('PUT')

    Kode MK : <br>
    <input type="text" name="kode_mk" value="{{ $matakuliah->kode_mk }}" readonly><br><br>

    Nama MK : <br>
    <input type="text" name="nama_mk" value="{{ $matakuliah->nama_mk }}"><br><br>

    SKS : <br>
    <input type="number" name="sks" value="{{ $matakuliah->sks }}"><br><br>

    Semester : <br>
    <input type="number" name="semester" value="{{ $matakuliah->semester }}"><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
