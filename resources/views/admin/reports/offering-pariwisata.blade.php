<table>
    <tbody>
        <tr>
            <td>
                <h1>OFFERING<strong> #XXXXXX</strong></h1>
            </td>
            <td align="right"><img src="" height="60px" /><br />
                <strong> PT Anugerah Karya Utami</strong><br />
                Jl. R. E. Martadinata No.84, Pakuncen, Wirobrajan
                <br />Kota Yogyakarta, Daerah Istimewa Yogyakarta
            </td>

        </tr>
    </tbody>
</table>

<style>
    #main-data-table tbody tr td {
        font-size: 12px !important;
    }

    #detail-bus-table tbody tr td,
    #detail-bus-table tfoot tr td {
        font-size: 12px !important;
    }

    #detail-bus-table thead tr th {
        font-weight: bold;
        font-size: 12px !important;
        text-align: left;
    }

    #detail-payment-table tbody tr td,
    #detail-payment-table tfoot tr td {
        font-size: 12px !important;
    }

    #detail-payment-table thead tr th {
        font-weight: bold;
        font-size: 12px !important;
        text-align: left;
    }

</style>
<table style="" id="main-data-table">
    <thead>
        <tr>
            <td colspan="3" style="font-size:12px">
                <strong>CUSTOMER</strong>
            </td>
            <td colspan="3" style="font-size:12px">                
                <strong>DATA PARIWISATA</strong>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="85px">
                Nama Customer
            </td>
            <td width="5px">
                :
            </td>
            <td width="150px">
                {{ $data['customer_name'] }}
            </td>
            <td width="155px">
                Tanggal Berangkat - Kembali
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{-- {{ $data->type_bus }} CLASS --}}
            </td>
        </tr>
        <tr>
            <td width="85px">
                Nomor KTP
            </td>
            <td width="5px">
                :
            </td>
            <td width="150px">
                {{ $data['customer_nik'] }}
            </td>
            <td width="155px">
                Keberangkatan
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{-- {{ $data->destination }} --}}
            </td>
        </tr>
        <tr>
            <td width="85px">
                Nomor Telepon
            </td>
            <td width="5px">
                :
            </td>

            <td width="150px">
                {{ $data['customer_phone'] }}
            </td>
            <td width="155px">
                Tujuan
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{-- {{ $data->pick_point }} --}}
            </td>
        </tr>
        <tr>
            <td width="85px">
                Email
            </td>
            <td width="5px">
                :
            </td>
            <td width="150px">
                {{ $data['customer_email'] }}
            </td>
            <td width="155px">
                Kapasitas Penumpang
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{-- {{ $data->arrival_point }} --}}
            </td>
        </tr>
    </tbody>
</table>


<h5 style="margin-top:10px;margin-bottom:10px">DETAIL BUS</h5>
<table style="" id="detail-bus-table">
    <thead>
        <tr>
            <th>Tipe</th>
            <th>Unit </th>
            <th>Hari</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Mikro Bus</td>
            <td id="td-mikro-bus-unit">1</td>
            <td class="td-day-wisata">5</td>
            <td id="td-mikro-bus-price">Rp.1.000.000,00</td>
            <td id="td-mikro-bus-total-price">Rp.5.000.000,00</td>
        </tr>
        <tr>
            <td>Medium Bus</td>
            <td id="td-medium-bus-unit">2</td>
            <td class="td-day-wisata">5</td>
            <td id="td-medium-bus-price">Rp.1.500.000,00</td>
            <td id="td-medium-bus-total-price">Rp.15.000.000,00</td>
        </tr>
        <tr>
            <td>Big Bus</td>
            <td id="td-big-bus-unit">1</td>
            <td class="td-day-wisata">5</td>
            <td id="td-big-bus-price">Rp.2.000.000,00</td>
            <td id="td-big-bus-total-price">Rp.10.000.000,00</td>
        </tr>
        <tr>
            <td colspan="4" class="font-weight-bold text-right">TOTAL BIAYA</td>
            <td id="td-total-price-bus">Rp.30.000.000,00</td>
        </tr>
    </tbody>
</table>
{{-- <div class="row">
    <div class="col-md-6">

    </div>
</div> --}}


<h5 style="margin-top:10px;margin-bottom:10px">DETAIL BIAYA PARIWISATA</h5>
<table id="detail-payment-table">
    <tbody>
        <tr>
            <td>Total Hari</td>
            <td></td>
        </tr>

        <tr>
            <td>Total Rent Price</td>
            <td></td>
        </tr>
        <tr>
            <td>Additional Price</td>
            <td></td>
        </tr>
        <tr>
            <td>Discount</td>
            <td></td>
        </tr>
        <tr>
            <td class="font-weight-bold">TOTAL PRICE</td>
            <td></td>
        </tr>
    </tbody>
</table>
