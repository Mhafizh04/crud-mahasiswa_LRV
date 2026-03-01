<!DOCTYPE html>
<html>
<head>
    <title>Laporan Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            line-height: 1.4;
        }

        .header h2 {
            margin: 0;
        }

        .header p {
            margin: 2px 0;
        }

        hr {
            border: 1px solid black;
            margin: 10px 0 20px 0;
        }

        .info {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
            padding: 6px;
        }

        td {
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 40px;
            width: 100%;
        }

        .signature {
            float: right;
            text-align: center;
            width: 200px;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <h2>STMIK IKMI CIREBON</h2>
        <p>Jl. Perjuangan No.10 Cirebon</p>
        <p>Email: info@stmik-ikmi.ac.id</p>
        <h3>LAPORAN DATA MAHASISWA</h3>
    </div>

    <hr>

    <!-- INFO -->
    <div class="info">
        <strong>Tanggal Cetak :</strong> {{ date('d F Y') }} <br>
        <strong>Total Mahasiswa :</strong> {{ $mahasiswas->count() }}
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">NIM</th>
                <th width="20%">Nama</th>
                <th width="15%">Kelas</th>
                <th width="20%">Mata Kuliah</th>
                <th width="10%">SKS</th>
                <th width="15%">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $index => $m)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $m->nim }}</td>
                <td>{{ $m->nama }}</td>
                <td class="text-center">{{ $m->kelas }}</td>
                <td>{{ optional($m->matakuliah)->nama_mk ?? '-' }}</td>
                <td class="text-center">{{ optional($m->matakuliah)->sks ?? '-' }}</td>
                <td class="text-center">{{ optional($m->matakuliah)->semester ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        <div class="signature">
            Cirebon, {{ date('d F Y') }}<br>
            Admin Akademik<br><br><br><br>
            (____________________)
        </div>
    </div>

</body>
</html>