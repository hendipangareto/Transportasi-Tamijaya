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

        .no-data {
            background-color: #c2b677;
            text-align: center;
        }
        .text-size{
            font-size: 8pt;
        }
        .posisi{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <h3>Data Pegawai</h3>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table>
    <thead class="text-size">
    <tr class="posisi">
        <th class="posisi">No</th>
        <th class="posisi">Id Pegawai</th>
        <th class="posisi">Nama</th>
        <th class="posisi">Departemen</th>
        <th class="posisi">Jabatan</th>
        <th class="posisi">Status Pegawai</th>
        <th class="posisi">Awal Kontrak</th>
        <th class="posisi">Selesai Kontrak</th>
    </tr>
    </thead>
    <tbody class="text-size">
    @php
        $no = 1;
    @endphp
    @forelse ($employee as $item)
        <tr>
            <td class="posisi">{{$no++}}</td>
            <td class="posisi">{{$item->employee_id}}</td>
            <td class="posisi">{{$item->employee_name}}</td>
            <td class="posisi">{{$item->department_name}}</td>
            <td class="posisi">{{$item->position_name}}</td>
            <td class="posisi">{{$item->employee_status}}</td>
            <td class="posisi">{{ \Carbon\Carbon::parse($item->awal_kontrak)->formatLocalized('%d - %B - %Y') }}</td>
            <td class="posisi">{{ \Carbon\Carbon::parse($item->selesai_kontrak)->formatLocalized('%d - %B - %Y') }}</td>
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
