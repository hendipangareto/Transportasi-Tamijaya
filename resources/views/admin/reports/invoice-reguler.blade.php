<table>
    <tbody>
        <tr>
            <td>
                <h1>INVOICE<strong> #{{ $data->booking_transactions_code }}</strong></h1>
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

    #detail-data-table tbody tr td,
    #detail-data-table tfoot tr td {
        font-size: 12px !important;
    }

    #detail-data-table thead tr th {
        font-weight: bold;
        font-size: 12px !important;
    }

</style>

<table style="" id="main-data-table">
    <thead>
        <tr>
            <td colspan="3">
                Customer
            </td>
            <td colspan="3">
                Travel Detail
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
            <td width="260px">
                {{ $data->customer_name }}
            </td>
            <td width="85px">
                Jenis Travel
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->type_bus }} CLASS
            </td>
        </tr>
        <tr>
            <td width="85px">
                Alamat
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->customer_address }}
            </td>
            <td width="85px">
                Tujuan
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->destination }}
            </td>
        </tr>
        <tr>
            <td width="85px">
                Nomor Telepon
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->customer_phone }}
            </td>
            <td width="85px">
                Berangkat dari
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->pick_point }}
            </td>
        </tr>
        <tr>
            <td width="85px">
                Email
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->customer_email }}
            </td>
            <td width="85px">
                Tiba di
            </td>
            <td width="5px">
                :
            </td>
            <td width="260px">
                {{ $data->arrival_point }}
            </td>
        </tr>
    </tbody>
</table>

<h5 style="margin-top:10px;margin-bottom:10px">DETAIL PENUMPANG</h5>

<table style="" id="detail-data-table">
    <thead>
        <tr>
            <th width="150px" style="text-align: left">
                Tipe Bus
            </th>
            <th width="85px" style="text-align: left">
                Seat
            </th>
            <th width="150px" style="text-align: right">
                Price
            </th>
            <th width="50px" style="text-align: center">
                Qty
            </th>
            <th width="150px" style="text-align: right">
                Total
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($details as $item)
            <tr>
                <td width="150px" style="text-align: left">
                    {{ $data->type_bus }} CLASS
                </td>
                <td width="85px" style="text-align: left">
                    {{ $item->booking_seats_seat_number }}
                </td>
                <td width="150px" style="text-align: right">
                    Rp. {{ number_format($item->booking_seats_seat_price) }}
                </td>
                <td width="50px" style="text-align: center">
                    1
                </td>
                <td width="150px" style="text-align: right">
                    Rp. {{ number_format($item->booking_seats_seat_price) }}
                </td>
            </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr @if ($data->booking_transactions_is_agent !== 'Y')
            style="display: none"
            @endif>
            <td colspan="4" style="text-align: right">AGENT </td>
            <td style="text-align: right">
                {{ $data->agent_name }}</td>
        </tr>
        <tr @if ($data->booking_transactions_is_agent !== 'Y')
            style="display: none"
            @endif>
            @php
                $total_before_discount = $data->booking_transactions_total_costs + $data->booking_transactions_total_discount;
            @endphp
            <td colspan="4" style="text-align: right">TOTAL </td>
            <td style="text-align: right">Rp.
                {{ number_format($total_before_discount) }}</td>
        </tr>
        <tr @if ($data->booking_transactions_is_agent !== 'Y')
            style="display: none"
            @endif>
            <td colspan="4" style="text-align: right">POTONGAN DISCOUNT</td>
            <td style="text-align: right; color: red">Rp.
                {{ number_format($data->booking_transactions_total_discount) }}</td>
        </tr>
        <tr style="font-weight: bold">
            <td colspan="4" style="text-align: right">TOTAL PEMBAYARAN</td>
            <td style="text-align: right">Rp. {{ number_format($data->booking_transactions_total_costs) }}</td>
        </tr>
    </tfoot>
</table>
