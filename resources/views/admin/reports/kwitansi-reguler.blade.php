<style>
    @page {
        margin: 10px;
    }

    body {
        margin: 10px;
    }

</style>
<table>
    <tbody>
        <tr>
            <td width="150px">
                <img src="" alt="">
                <h1>LOGO</h1>
            </td>
            <td width="300px"></td>
            <td width="100px" align="right">
                Tanggal<br />
                No. Kwitansi<br />
                Nominal<br />
            </td>
            <td width="5px">
                : <br />
                : <br />
                : <br />
            </td>
            <td width="180px">
                20 Januari 2022<br />
                XYZ230123<br />
                Rp. 500.000,00<br />
            </td>

        </tr>
    </tbody>
</table>
<hr>

<style>
    #main-data-table tbody tr td {
        font-size: 16px !important;
    }

    #detail-data-table tbody tr td,
    #detail-data-table tfoot tr td {
        font-size: 16px !important;
    }

    #detail-data-table thead tr th {
        font-weight: bold;
        font-size: 16px !important;
    }

</style>

<table style="" id="main-data-table">
    <tbody>
        <tr>
            <td width="100px">
                Description
            </td>
            <td width="5px">
                :
            </td>
            <td width="300px">
                {{ $data->customer_name }}
            </td>
        </tr>
        <tr>
            <td width="100px">
                Charged to
            </td>
            <td width="5px">
                :
            </td>
            <td width="300px">
                {{ $data->customer_address }}
            </td>
        </tr>
        <tr>
            <td width="100px">
                Received By
            </td>
            <td width="5px">
                :
            </td>
            <td width="300px">
                {{ $data->customer_phone }}
            </td>
        </tr>
        <tr>
            <td width="100px">
                Approved By
            </td>
            <td width="5px">
                :
            </td>
            <td width="300px">
                {{ $data->customer_email }}
            </td>
        </tr>
    </tbody>
</table>
<hr>

<table>
    <tbody>
        <tr>
            <td width="150px">
                <h1 style="margin-bottom: 0px!important;" >TTD</h1>
                <h6 style="margin-top: 15px!important;">Johanes Adhitya Hartanto</h6>
            </td>
            <td width="400px"></td>

            <td width="150px">
                <h1 style="margin-bottom: 0px!important;" >TTD</h1>
                <h6 style="margin-top: 15px!important;">Customer</h6>
            </td>

        </tr>
    </tbody>
</table>
{{-- <h5 style="margin-top:10px;margin-bottom:10px">DETAIL PENUMPANG</h5>

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
        <tr @if ($data->booking_transactions_is_agent !== 'Y') style="display: none" @endif>
            <td colspan="4" style="text-align: right">AGENT </td>
            <td style="text-align: right">
                {{ $data->agent_name }}</td>
        </tr>
        <tr @if ($data->booking_transactions_is_agent !== 'Y') style="display: none" @endif>
            @php
                $total_before_discount = $data->booking_transactions_total_costs + $data->booking_transactions_total_discount;
            @endphp
            <td colspan="4" style="text-align: right">TOTAL </td>
            <td style="text-align: right">Rp.
                {{ number_format($total_before_discount) }}</td>
        </tr>
        <tr @if ($data->booking_transactions_is_agent !== 'Y') style="display: none" @endif>
            <td colspan="4" style="text-align: right">POTONGAN DISCOUNT</td>
            <td style="text-align: right; color: red">Rp.
                {{ number_format($data->booking_transactions_total_discount) }}</td>
        </tr>
        <tr style="font-weight: bold">
            <td colspan="4" style="text-align: right">TOTAL PEMBAYARAN</td>
            <td style="text-align: right">Rp. {{ number_format($data->booking_transactions_total_costs) }}</td>
        </tr>
    </tfoot>
</table> --}}
