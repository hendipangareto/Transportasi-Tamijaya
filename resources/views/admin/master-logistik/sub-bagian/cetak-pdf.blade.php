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
        .font{
            font-size: 8pt !important;
        }
        .posisi{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <h3>Data Sub-Bagian</h3>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table class="font">
    <thead>
    <tr >
        <th class="w-2p posisi">No</th>
        <th class="w-4p posisi">Kode Sub Bagian</th>
        <th class="w-4p posisi">Sub Bagian</th>
        <th class="w-4p posisi">Bagian</th>
        <th class="w-4p posisi">Deskripsi</th>
    </tr>
    </thead>
    <tbody >
    @php
        $no = 1;
    @endphp
    @forelse ($SubBagian as $item)
        <tr>
            <td class="posisi">{{ $loop->iteration }} </td>
            <td class="posisi">{{ $item->kode_sub_bagian }}</td>
            <td class="posisi">{{ $item->nama_sub_bagian }}</td>
            <td class="posisi">{{ $item->bagian}}</td>
            <td class="posisi">{{ $item->deskripsi_sub_bagian}}</td>
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
