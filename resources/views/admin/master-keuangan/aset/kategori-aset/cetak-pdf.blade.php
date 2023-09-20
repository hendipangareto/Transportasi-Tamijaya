<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Aset - PT Anugerah Karya Utami Gemilang</title>
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
    <h3>Data Kategori Aset</h3>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table class="font">
    <thead>
    <tr >
        <th class="w-2p">No</th>
        <th class="w-4p">Kode Kategori</th>
        <th class="w-4p">Nama Kategori</th>
        <th class="w-4p">Tipe Aset</th>
        <th class="w-4p">Deskripsi</th>
    </tr>
    </thead>
    <tbody >

    @forelse ($KategoriAset as $item)
    <tr>
        <td>{{ $loop->iteration }} </td>
        <td>{{ $item->kode_kategori_aset }}</td>
        <td>{{ $item->nama_kategori_aset}}</td>
        <td>{{ $item->tipe_aset}}</td>
        <td>{{ $item->deskripsi_kategori_aset}}</td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center">Tidak ada data sub bagian.</td>
    </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
