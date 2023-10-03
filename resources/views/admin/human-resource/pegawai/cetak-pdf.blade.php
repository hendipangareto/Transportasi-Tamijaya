<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice Gaji - PT Anugerah Karya Utami Gemilang</title>
    <style>
        /* Styles untuk header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            padding: 0;
        }

        /* Styles untuk konten invoice */
        .invoice-container {
            width: 80%;
            margin: 0 auto;
        }

        .invoice-header {
            text-align: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details h2 {
            margin: 0;
            padding: 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        /* Styles untuk pesan "Data tidak ditemukan" */
        .no-data {
            background-color: #c2b677;
            text-align: center;
        }
        .font {
            font-size: 8pt !important;
        }
        .posisi {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Invoice Gaji</h1>
    <p>PT Anugerah Karya Utami Gemilang</p>
</div>

<div class="invoice-container">
    @forelse ($data as $item)
        <div class="invoice-header">
            <h2>Detail Data Gaji Pegawai</h2>
        </div>

        <div class="invoice-details">
            <table class="invoice-table">
                <tr>
                    <th>Departemen</th>
                    <td>: {{ $item->department_name }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>: {{ $item->position_name }}</td>
                </tr>
                <tr>
                    <th>Nama Pegawai</th>
                    <td>: {{ $item->employee_name }}</td>
                </tr>
                <tr>
                    <th>Status Pegawai</th>
                    <td>: {{ $item->employee_status }}</td>
                </tr>
                <tr>
                    <th>Gaji Pegawai</th>
                    <td>: @currency($item->g_pokok)</td>
                </tr>
                <tr>
                    <th>Tunjangan Masa Kerja</th>
                    <td>: Rp.{{ $item->t_masa_kerja }}</td>
                </tr>
                <tr>
                    <th>Tunjangan Transport</th>
                    <td>: Rp.{{ $item->t_transport }}</td>
                </tr>
                <tr>
                    <th>Tunjangan Kapasitas</th>
                    <td>: Rp.{{ $item->t_kapasitas }}</td>
                </tr>
                <tr>
                    <th>Tunjangan Akademik</th>
                    <td>: Rp.{{ $item->t_akademik }}</td>
                </tr>
                <tr>
                    <th>Tunjangan Struktur</th>
                    <td>: Rp.{{ $item->t_struktur }}</td>
                </tr>
                <tr>
                    <th>BPJS Kesehatan</th>
                    <td>: Rp.{{ $item->bpjs_kesehatan }}</td>
                </tr>
                <tr>
                    <th>BPJS Ketenagakerjaan</th>
                    <td>: Rp.{{ $item->bpjs_ketenagakerjaan }}</td>
                </tr>
                <tr style="color: #003cff">
                    <th >Total di terima</th>
                    <td>: Rp.{{
                        $item->g_pokok +
                        $item->t_masa_kerja +
                        $item->t_transport +
                        $item->t_kapasitas +
                        $item->t_akademik +
                        $item->t_struktur +
                        $item->bpjs_kesehatan +
                        $item->bpjs_ketenagakerjaan
                    }}</td>
                </tr>
            </table>
        </div>
    @empty
        <div class="no-data">Data tidak ditemukan</div>
    @endforelse
</div>
</body>
</html>
