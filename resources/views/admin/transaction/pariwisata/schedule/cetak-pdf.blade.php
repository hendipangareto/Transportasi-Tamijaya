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
    <h3>Data Schedule Pariwisata</h3>
    <p>PT Anugerah Karya Utami Gemilang</p>
    <hr>
</div>

<table class="font">
    <thead>
    <tr>
        <th class="w-2p posisi" rowspan="2">No</th>
        <th class="w-10p posisi" rowspan="2">Tanggal Keberangkatan</th>
        <th class="w-10p posisi" rowspan="2">Tanggal Pulang</th>
        <th class="w-10p posisi" rowspan="2">Tipe Armada</th>
        <th class="w-10p posisi" rowspan="2">Armada</th>
        <th class="w-10p posisi" colspan="2">Detail Perjalanan</th>
        <th class="w-10p posisi" rowspan="2">Sopir 1</th>
        <th class="w-10p posisi" rowspan="2">Sopir 2</th>
        <th class="w-10p posisi" rowspan="2">Kernet</th>
        <th class="w-10p posisi" rowspan="2">Status</th>

    </tr>
    <tr>
        <td class="w-5p posisi">Kode Keberangkatan</td>
        <td class="w-5p posisi">Kode Tujuan</td>
    </tr>
    </thead>
    <tbody >
    @forelse($schedulePariwisatas as $item)
        @php
            $employee = \App\Models\HumanResource\Employee::find($item->sopir_1);
            $employees = \App\Models\HumanResource\Employee::find($item->sopir_2);

        @endphp
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->date_departure }}</td>
            <td>{{ $item->date_return }}</td>
            <td></td>
            <td>{{ $item->no_police }}</td>
            <td>{{ $item->kode_keberangkatan }}</td>
            <td>{{ $item->kode_tujuan }}</td>
            <td>
                @if ($employee)
                    {{ $employee->employee_name }}
                @else
                    Sopir Tidak Ditemukan
                @endif
            </td>
            <td>
                @if ($employees)
                    {{ $employees->employee_name }}
                @else
                    Sopir Tidak Ditemukan
                @endif
            </td>

            <td>{{ $item->employee_name }}</td>
            <td>Ban Kempes</td>
        </tr>
    @empty
        <tr>
            <td colspan="12" class="text-center posisi">Tidak ada data schedule parawisata</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>

