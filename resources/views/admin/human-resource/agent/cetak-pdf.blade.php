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
        <th class="w-3p">No</th>
        <th class="w-5p">Kode Agen</th>
        <th class="w-15p">Nama Agen</th>
        <th class="w-15p">Provinsi</th>
        <th class="w-15p">Kabupaten/Kota</th>
        <th class="w-10p">Hand Phone</th>
        <th class="w-10p">Telepon</th>
        <th class="w-10p">Email </th>
        <th class="w-15p">Alamat </th>
        <th class="w-15p">Keterangan </th>
    </tr>
    </thead>
    <tbody >

    @forelse ($agent as $item)
        <tr>
            <td>{{ $loop->iteration }} </td>
            <td>{{ $item->agent_code }}</td>
            <td>{{ $item->agent_name }}</td>
            <td>{{ $item->state_name }}</td>
            <td>{{ $item->city_name }}</td>
            <td>{{ $item->agent_hp }}</td>
            <td>{{ $item->agent_tlp }}</td>
            <td>{{ $item->agent_email }}</td>
            <td>{{ $item->agent_alamat }}</td>
            <td>{{ $item->agent_description }}</td>

    @empty
        <tr>
            <td colspan="10" class="no-data">Data tidak ditemukan</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>

