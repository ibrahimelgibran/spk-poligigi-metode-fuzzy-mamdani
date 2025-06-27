<!DOCTYPE html>
<html>
<head>
    <title>Kriteria Penilaian</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td { padding: 8px; }
    </style>
</head>
<body>
    <h2>Kriteria Penilaian</h2>
    <table width="100%">
        <thead>
            <tr>
                <th>Nama Alat dan Bahan</th>
                <th>Supplier</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama_alat_kesehatan_dan_bahan }}</td>
                <td>{{ $item->aset->supplier }}</td>
                <td>{{ $item->nilai_akhir }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
