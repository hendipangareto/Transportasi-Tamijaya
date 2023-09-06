<style>
ul, li {
  list-style: none;
  padding: 0;
}

li {
  padding-bottom: 0.1rem;
  border-left: 1px solid #C61010;
  position: relative;
  padding-left: 20px;
  margin-left: 10px;
}
li:last-child {
  border: 0px;
  padding-bottom: 0;
}
li:before {
  content: "";
  width: 10px;
  height: 10px;
  background: #C61010;
  border: 1px solid #C61010;
  box-shadow: 3px 3px 0px #c26767;
  box-shadow: 3px 3px 0px #c26767;
  border-radius: 50%;
  position: absolute;
  left: -6.9px;
  top: 0px;
}

.route {
  /* color: #2a2839; */
  font-weight: 500;
  margin-bottom: 0px;
}

p {
  /* color: #4f4f4f; */
  margin-top: 0px;
}

</style>
<table style="width:100%;margin-bottom:10px">
     <tr>
        <td style="width:100%">
            <h2>INVOICE <strong> #{{ $booking->booking_transactions_code }}</strong></h2>
        </td>
        <td align="right">
            <img src="https://w1.pngwing.com/pngs/863/117/png-transparent-travel-art-carolinas-aviation-museum-travel-tours-travel-agent-yellow-line-circle-logo-thumbnail.png" height="60px" /><br />
        </td>
    </tr>
    <tr>
        <td style="width:100%;border-right:1px solid #dedede; vertical-align: top;">
            <b>TRAVEL AGENT</b><br/>
            <strong> PT Anugerah Karya Utami</strong><br />
            Jl. R. E. Martadinata No.84, Pakuncen, Wirobrajan
            <br />Kota Yogyakarta, Daerah Istimewa Yogyakarta
        </td>
        <td align="right" style="width:100%;vertical-align: top;">
            <b>CUSTOMER</b><br/>
            <strong> {{ $booking->customer_name }}</strong><br />
            {{ $booking->customer_address }}
        </td>
    </tr>
</table>

<table style="width:100%">
    <tr>
        <td align="center"><b>Departure</b></td>
        <td align="center"><b>Return</b></td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>
                    <div class="route">{{ $booking->province_from}}</div>
                    <p>{{ $booking->date_departure }}</p>
                </li>
                <li>
                    <div class="route">{{ $booking->province_to}}</div>
                    <p>{{ $booking->date_departure }}</p>
                </li>
            </ul>
        </td>
        <td>
            <ul>
                <li>
                    <div class="route">{{ $booking->province_to}}</div>
                    <p>{{ $booking->date_return }}</p>
                </li>
                <li>
                    <div class="route">{{ $booking->province_from}}</div>
                    <p>{{ $booking->date_return }}</p>
                </li>
            </ul>
        </td>
    </tr>
</table>

<h4 style="margin-top:10px;margin-bottom:10px">BUS DETAIL</h4>

<table style="width:100%;vertical-align: top;">
    <tr>
        <td style="width:100%;"><b>Tipe Armada</b><br/>{{ $booking->armada_type }}</td>
        <td style="width:100%;"><b>Kapasitas Armada</b><br/>{{ $booking->armada_seat ? $booking->armada_seat : '-' }} Orang</td>
    </tr>
    <tr>
        <td><b>Harga Bus</b><br/>{{ 'Rp. ' .  number_format($booking->bus_price,0,'','.')}}</td>
        <td><b>No Polisi Armada</b><br/>{{ $booking->armada_no_police }}</td>
    </tr>
    <tr>
        <td><b>Total Penumpang</b><br/>{{ $booking->booking_transactions_total_seats}} Orang</td>
        <td><b>Notes Pemesanan</b><br/>{{ $booking->customer_notes }}</td>
    </tr>
</table>

<h4 style="margin-top:10px;margin-bottom:10px">ITINERARY</h4>

<table style="width:100%">
    <thead style="border-bottom: 1px solid #dedede;border-top: 1px solid #dedede;font-weight:bold">
        <tr>
            <td>
                Wisata
            </td>
            <td>
                Destination
            </td>
            <td>
                Notes
            </td>
            <td  style="text-align: right">
                Price
            </td>
        </tr>
    </thead>
    <tbody>
        @php
             $totalItinerary = 0;
        @endphp
        @foreach ($itinerary as $itnry)
            @php
                $totalItinerary += (int)$itnry->booking_itinerary_harga;
            @endphp
            <tr>
                <td>{{ $itnry->booking_itinerary_tujuan}}</td>
                <td>{{ $itnry->booking_itinerary_destinasi}}</td>
                <td>{{ $itnry->booking_itinerary_notes}}</td>
                <td style="text-align: right">{{ number_format($itnry->booking_itinerary_harga,0,'','.') }}</td>
            </tr>
        @endforeach

    </tbody>
    <tfoot style="border-bottom: 1px solid #dedede;border-top: 1px solid #dedede;font-weight:bold;">
        <tr>
            <td colspan="3" style="text-align: right;width:80%">Total Itinerary Price</td>
            <td style="text-align: right;width:20%">Rp. {{ number_format($totalItinerary,0,'','.')}}</td>
        </tr>
    </tfoot>
</table>

<h4 style="margin-top:10px;margin-bottom:10px">PRICE CALCULATION</h4>

<table style="width:100%">
    <thead style="border-bottom: 1px solid #dedede;border-top: 1px solid #dedede;font-weight:bold">
        <tr>
            <td>Description</td>
            <td style="text-align: right">
                Price
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Bus Price</td>
            <td style="text-align: right">{{ number_format($booking->bus_price,0,'','.')}}</td>
        </tr>
        <tr>
            <td>Subtotal Itinerary Price</td>
            <td style="text-align: right">{{ number_format($totalItinerary,0,'','.') }}</td>
        </tr>
        <tr>
            <td>Additional Price</td>
            <td style="text-align: right">{{ number_format($booking->booking_transactions_additional_price,0,'','.') }}</td>
        </tr>
        <tr>
            <td>Discount</td>
            <td style="text-align: right">{{ number_format($booking->booking_transactions_total_discount,0,'','.') }}</td>
        </tr>
    </tbody>
    <tfoot style="border-bottom: 1px solid #dedede;border-top: 1px solid #dedede;font-weight:bold;">
        <tr>
            <td style="text-align: right;width:80%">Total Payment</td>
            <td style="text-align: right;width:20%">
                @php
                    $totalPayment = ((int)$booking->bus_price + (int)$totalItinerary + (int)$booking->booking_transactions_additional_price) - (int)$booking->booking_transactions_total_discount;
                    echo 'Rp. '. number_format($totalPayment,0,'','.');

                @endphp
            </td>
        </tr>
    </tfoot>
</table>
