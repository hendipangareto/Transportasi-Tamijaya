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
    <h3>Data Metode Penyusutan</h3>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table class="font">
    <thead>
    <tr>
        <th class="w-2p posisi">No</th>
        <th class="w-10p posisi">Kode Penyusutan</th>
        <th class="w-4p posisi">Metode Penyusutan</th>
        <th class="w-4p posisi">Keterangan</th>
    </tr>
    </thead>
    <tbody >

    @forelse ($MetodePenyusutan as $item)
        <tr>
            <td class="posisi">{{ $loop->iteration }} </td>
            <td class="posisi">{{ $item->kode_metode_penyusutan }}</td>
            <td class="posisi">{{ $item->nama_metode_penyusutan }}</td>
            <td class="posisi">{{ $item->keterangan_metode_penyusutan}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="no-data">Data tidak ditemukan</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>

