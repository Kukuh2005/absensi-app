<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi {{ $kelas->kelas }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>
    <h1 style="text-align: center">Daftar Hadir Siswa</h1>
    <table>
        <thead>
            <tr>
                <th colspan="6">
                    <p style="text-align: center">Kelas {{ $kelas->kelas }}</p>
                    <p style="text-align: center">Tanggal: {{ $tanggal }}</p>
                </th>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Status Absensi</th>
                <th>Tanggal</th>
                <th>Guru</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->siswa->nama_siswa }}</td>
                <td>{{ $item->kelas->kelas }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->Guru }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>