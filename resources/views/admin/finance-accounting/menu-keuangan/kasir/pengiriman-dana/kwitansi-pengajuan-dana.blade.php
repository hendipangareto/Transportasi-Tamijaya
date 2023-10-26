<html>

<style>
    @media screen, print {
        * {
            margin: 0;
            padding: 0;

        }

        body {
            margin: 2.6cm 1.9cm 1.4cm 2.7cm;
            font-family: 'Calibri', 'Helvetica', 'Arial', sans-serif;
            font-size: 7pt;
        }


        table.data {
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
        }

        table.data > tbody > tr > td {
            border: 1px solid;
            padding: 1px 2px;
        }

        table.data > thead > tr > th {
            border: 1px solid;
            background-color: #eaeaea;
            padding: 1px 2px;
        }


        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .bg-gray {
            background-color: #eaeaea;
            padding: 10px !important;
            font-weight: bold;
        }

        .custom-text {
            text-align: right;
            font-size: 8pt;
            font-family: 'Segoe Script', 'Arial', sans-serif;
        }


    }
</style>

<body>
<header>
    <table style="width: 100%;">
        <tbody>
        <tr>
            <td style="float: left">
                <span style="text-align: left;font-size: 12pt;">Kwitansi Transaksi Dana</span><br/>
                <span style="float: left;font-size: 8pt;">Nomor : <b style="color: red">221204</b></span><br/>
                <span style="float: left;font-size: 8pt;">Hari Tanggal : <b>Sabtu, 1 Oktober 2023</b></span><br/>
                <span style="float: left;font-size: 8pt;">Kota : <b>Yogyakarta</b></span><br/>
            </td>
            <td style="float: right">
                <img style="text-align: center" src="{{public_path('images/favicon.png')}}" height="62" alt="">
            </td>
            <td style="float: right">
                <span style="text-align: right;font-size: 10pt;">PT ANUGERAH KARYA UTAMI GEMILANG</span><br/>
                <span class="custom-text">Devisi Transportasi Bus Pariwisata</span><br/>
                <hr>
                <span style="text-align: right;font-size: 6pt;">Pusat : Jl. RE.Martadinata No.84 Yogyakarta Telp.0274-618922</span><br/>
                <span style="text-align: right;font-size: 6pt;">Cabang : Jl.Buluh Indah 66 Gg.Pondok Indah No.6, Denpasar-Bali, Telp.0361-9076-845</span><br/>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <hr>
</header>
<main>
    <div style="page-break-after: auto;">
        <table style="margin: 10px 0px ;" width="100%">
            <tr>
                <td style="font-weight: bold;" width="15%"></td>
                <td width="35%"></td>
                <td style="font-weight: bold;" width="15%"></td>
                <td></td>
            </tr>
            <tr>
                <td width="15%">Nomor Pengajuan</td>
                @if ($dataIndex->isNotEmpty())
                    <td width="35%">: {{ $dataIndex[0]->kode_pengajuan }}</td>
                @else
                    <td width="35%">: No data available</td>
                @endif
            </tr>

            <tr>
                <td width="15%">Tanggal Pengajuan</td>
                @if ($dataIndex->isNotEmpty())
                    <td width="35%">: {{ $dataIndex[0]->tanggal_pengajuan }}</td>
                @else
                    <td width="35%">: No data available</td>
                @endif
            </tr>
        </table>
        <hr>
        <br>
        <div class="content">
            <p style="font-size: 11px !important; font-weight: bold">DETAIL PEMESANAN</p><br/>
            <table class="data">
                <thead>
                <tr>
                    <th class="w-3p">No</th>
                    <th class="w-10p">Nama Toko</th>
                    <th class="w-5p">Nama Item</th>
                    <th class="w-8p">Kuantitas</th>
                    <th class="w-10p">Satuan</th>
                    <th class="w-10p">Harga Satuan <br> (Rp.)</th>
                    <th class="w-10p">Harga Total <br> (Rp)</th>
                    <th class="w-10p">Status Transaksi</th>
                </tr>

                </thead>
                <tbody id="show-data-rencana-kerja-terpilih">
                @php
                    $totalLunas = 0;
                    $totalHutang = 0;
                @endphp
                @forelse ($dataIndex as $item)
                    @php
                        $totalLunas += (strtoupper($item->cara_bayar) === 'LUNAS') ? ($item->kuantitas * $item->harga) : 0;
                        $totalHutang += (strtoupper($item->cara_bayar) === 'HUTANG') ? ($item->kuantitas * $item->harga) : 0;
                    @endphp
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->toko}}</td>
                        <td>{{$item->item}}</td>
                        <td>{{$item->kuantitas}}</td>
                        <td>{{$item->satuan}}</td>
                        <td>{{$item->harga}}</td>
                        <td>@currency($item->kuantitas * $item->harga)</td>

                        <td>
                            <b style="color: {{ (strtoupper($item->cara_bayar) === 'LUNAS') ? '#0077ff' : ((strtoupper($item->cara_bayar) === 'HUTANG') ? '#ff000c' : '') }};  ">{{ strtoupper($item->cara_bayar) }}</b>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15" class="text-center">Data tidak ditemukan</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <br/>
        <hr>
        <br/>
        <div class="content">
            <p style="font-size: 10px !important; font-weight: bold">TOTAL LUNAS/CHAS : </p><br/>
            <p style="font-size: 12px !important; background-color: #626262; font-weight: bold; color: #ffffff"> @currency($totalLunas)</p><br/>
            <p style="font-size: 10px !important; font-weight: bold">TOTAL HUTANG: </p><br/>
            <p style="font-size: 12px !important; background-color: #626262; font-weight: bold; color: #ffffff"># EMPAT
                JUTA LIMA RATUS RIBU RUPIAH</p>
            <p style="font-size: 10px !important; font-weight: bold; margin-top: 10px">TOTAL PENGAJUAN DANA: </p><br/>
            <p style="font-size: 12px !important; background-color: #626262; font-weight: bold; color: #ffffff"> @currency($totalLunas + $totalHutang)</p>
        </div>
    </div>
</main>
</body>
</html>

