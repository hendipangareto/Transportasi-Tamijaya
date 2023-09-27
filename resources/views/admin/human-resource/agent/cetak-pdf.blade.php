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
    <h3>Data Agen</h3>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table class="font">
    <thead>
    <tr >
        <th class="w-2p posisi">No</th>
        <th class="w-10p posisi">Kode Agen</th>
        <th class="w-25p posisi">Nama Agen</th>
        <th class="w-25p posisi">Provinsi</th>
        <th class="w-25p posisi">Kabupaten/Kota</th>
        <th class="w-10p posisi">Hand Phone</th>
        <th class="w-10p posisi">Telepon</th>
        <th class="w-10p posisi">Email </th>
        <th class="w-10p posisi">Alamat </th>
        <th class="w-10p posisi">Keterangan </th>
    </tr>
    </thead>
    <tbody >

    @forelse ($agent as $item)
        <tr>
            <td class="posisi">{{ $loop->iteration }} </td>
            <td class="posisi">{{ $item->agent_code }}</td>
            <td class="posisi">{{ $item->agent_name }}</td>
            <td class="posisi">{{ $item->state }}</td>
            <td class="posisi">{{ $item->city }}</td>
            <td class="posisi">{{ $item->agent_hp }}</td>
            <td class="posisi">{{ $item->agent_tlp }}</td>
            <td class="posisi">{{ $item->agent_email }}</td>
            <td class="posisi">{{ $item->agent_alamat }}</td>
            <td class="posisi">{{ $item->agent_description }}</td>

    @empty
        <tr>
            <td colspan="8" class="no-data">Data tidak ditemukan</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>

