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
    }
</style>

<body>
@include('admin.finance-accounting.menu-keuangan.kasir.header._header')
<main>
    <div style="page-break-after: auto;">
        <table style="margin: 10px 0px ;" width="100%">
            <tr>
                <td style="font-weight: bold;" width="15%">Data PIC</td>
                <td width="35%"></td>
                <td style="font-weight: bold;" width="15%">Detail Pembayaran
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;" width="15%">Nama</td>
                <td width="35%">: Peter</td>
                <td width="20%">Cara Bayar Pembayaran</td>
                <td>: Transfer</td>
            </tr>
            <tr>
                <td style="font-weight: bold;" width="15%">Email</td>
                <td width="35%">: peter@gmail.com</td>
                <td width="20%">Nama Bank</td>
                <td>: BCA</td>
            </tr>
            <tr>
                <td style="font-weight: bold;" width="15%">No Telp</td>
                <td width="35%">: 080003849500</td>
                <td width="20%">No Rekening</td>
                <td>: 452394342345</td>
            </tr>
            <tr>
                <td style="font-weight: bold;" width="15%">Jabatan</td>
                <td width="35%">: Pemandu Perjalanan</td>
                <td width="20%">PIC</td>
                <td>: PT Anugerah Karya Utami Gemilang</td>
            </tr>
        </table>
        <hr>
        <br>
        <div class="content">
            <p style="font-size: 11px !important; font-weight: bold">DETAIL TRANSAKSI</p><br/>
            <table class="data">
                <thead>
                <tr>
                    <th rowspan="2" class="w-3p">No</th>
                    <th rowspan="2" class="w-5p">Kode Booking</th>
                    <th rowspan="2" class="w-5p">Tipe Armada</th>
                    <th rowspan="2" class="w-5p">Nopol Armada</th>
                    <th rowspan="2" class="w-5p">No Kursi</th>
                    <th colspan="2" class="w-10p">Titik Antar Jemput</th>
                    <th rowspan="2" class="w-10p">Nilai Transaksi</th>
                    <th rowspan="2" class="w-10p">Status Pembayaran</th>
                </tr>
                <tr>
                    <th>Titik Berangkat</th>
                    <th>Titik Turun</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <hr>
        <br/>
        <div class="content">
            <p style="font-size: 10px !important; font-weight: bold">TOTAL NILAI TRANSAKSI : </p><br/>
            <p style="font-size: 12px !important; background-color: whitesmoke; font-weight: bold; color: red">Rp 4.500.000</p><br/>
            <p style="font-size: 10px !important; font-weight: bold">TOTAL NILAI TERBILANG : </p><br/>
            <p style="font-size: 12px !important; background-color: whitesmoke; font-weight: bold; color: red"># EMPAT JUTA LIMA RATUS RIBU RUPIAH</p>
        </div>
    </div>
</main>
</body>
</html>
