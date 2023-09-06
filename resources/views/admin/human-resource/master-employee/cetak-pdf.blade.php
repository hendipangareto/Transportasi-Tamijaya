<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Karyawan - PT Anugerah Karya Utami Gemilang</title>
    <style>
        /* Styles untuk kop surat */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            padding: 0;
        }

        /* Styles untuk tabel data karyawan */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styles untuk pesan "Data tidak ditemukan" */
        .no-data {
            background-color: #c2b677;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Data Pegawai</h1>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Id Pegawai</th>
        <th>Nama</th>
        <th>Departemen</th>
        <th>Jabatan</th>
        <th>Status Pegawai</th>
        <th>Awal Kontrak</th>
        <th>Selesai Kontrak</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @forelse ($employee as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->employee_id}}</td>
            <td>{{$item->employee_name}}</td>
            <td>{{$item->department_name}}</td>
            <td>{{$item->position_name}}</td>
            <td>{{$item->employee_status}}</td>
            <td>{{ \Carbon\Carbon::parse($item->awal_kontrak)->formatLocalized('%d %B %Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->selesai_kontrak)->formatLocalized('%d %B %Y') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="no-data">Data tidak ditemukan</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
