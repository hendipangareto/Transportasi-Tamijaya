<section class="invoice-view-wrapper">
    <div class="row">
        <!-- invoice view page -->
        <div class="col-xl-10 col-md-8 col-12">
            <div class="card invoice-print-area">
                <div class="card-content">
                    <div class="card-body py-0 px-1">
                        <!-- header section -->
                        <div class="row">
                            <div class="col-xl-3 col-md-12">
                                <span class="invoice-number">NOMOR TRANSAKSI :</span>
                                <span class="font-weight-bold">{{ $data->booking_transactions_code }}</span>
                            </div>
                            <div class="col-xl-7 col-md-12">
                                <div class="d-flex align-items-center justify-content-xl-end flex-wrap">
                                    <div class="mr-1">
                                        <small class="text-muted">Tanggal Keberangkatan:</small>
                                        <span>{{ $data->date_departure }}</span>
                                    </div>
                                    <div>
                                        <small class="text-muted">Tanggal Kembali:</small>
                                        <span>{{ $data->date_return }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-12">
                                <small class="text-muted">Status:</small>
                                <span class="font-weight-bold">{{ $data->status_name }}</span>
                            </div>
                        </div>
                        <hr>
                        <!-- invoice address and contact -->
                        <div class="row invoice-info">
                            <div class="col-4">
                                <h6 class="invoice-from font-weight-bold text-uppercase">CUSTOMER</h6>
                                <div class="">
                                    <span>{{ $data->customer_name }}</span>
                                </div>
                                <div class="">
                                    <span>{{ $data->customer_address }}</span>
                                </div>
                                <div class="">
                                    <span>{{ $data->customer_email }}</span>
                                </div>
                                <div class="">
                                    <span>{{ $data->customer_phone }}</span>
                                </div>
                            </div>
                            <div class="col-5">
                                <h6 class="invoice-from font-weight-bold text-uppercase">TRAVEL DETAIL</h6>
                                <div class="">
                                    <span>{{ $data->type_bus }} ({{ $data->booking_transactions_total_seats }}
                                        penumpang)</span>
                                </div>
                                <div class="">
                                    <span>Armada : {{ $data->armada }}</span>
                                </div>
                                <div class="">
                                    <span>Wisata dari : {{ $data->province_from }}</span>
                                </div>
                                <div class="">
                                    <span>Tujuan Wisata: {{ $data->province_to }}</span>
                                </div>
                                <div class="">
                                    <span>Catatan : {{ $data->notes_travel }}</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <h6 class="invoice-from font-weight-bold text-uppercase">PEMBAYARAN</h6>
                                <div class="">
                                    <span>{{ $data->booking_transactions_payment_method }}</span>
                                </div>
                                <div class="">
                                    <span>{{ $data->bank_account }}</span>
                                </div>
                                <div class="">
                                    <span>an {{ $data->bank_holder }}</span>
                                </div>
                                <div class="">
                                    @if ($data->booking_transactions_payment_attachment)
                                        <a href="{{ asset("/storage/".$data->booking_transactions_payment_attachment) }}" target="_blank"><span style="text-decoration: underline" class="text-primary pointer">Lihat Bukti
                                            Transfer</span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- product details table-->
                    <div class="invoice-product-details table-responsive mx-md-25">
                        <style>
                            #table-detail-wisata thead tr th {
                                padding-top: 0px !important;
                                padding-bottom: 8px !important;
                            }

                            #table-detail-wisata tfoot tr td {
                                padding-top: 5px !important;
                                padding-bottom: 5px !important;
                            }

                        </style>
                        <table class="table mb-0" id="table-detail-wisata">
                            <thead>
                                <tr class="border-0">
                                    <th>TUJUAN</th>
                                    <th>DESTINASI</th>
                                    <th>NOTES</th>
                                    <th class="text-right">PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total_itinerary = 0;
                                @endphp
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $item->booking_itinerary_tujuan }}</td>
                                        <td>{{ $item->booking_itinerary_destinasi }}</td>
                                        <td>{{ $item->notes_details }}</td>
                                        <td class="text-right">
                                            {{ number_format($item->booking_itinerary_harga) }}</td>
                                    </tr>
                                    @php
                                        $sub_total_itinerary += $item->booking_itinerary_harga;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-right">Bus Price </td>
                                    <td style="padding-left:10px!important" class="font-weight-bold text-right pr-1">Rp.
                                        {{ number_format($data->bus_price) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-right">Subtotal Itinerary </td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-primary pr-1">Rp.
                                        {{ number_format($sub_total_itinerary) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-right">Additional Price</td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-success pr-1">Rp.
                                        {{ number_format($data->booking_transactions_additional_price) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-right">Discount Price </td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-danger pr-1">Rp.
                                        {{ number_format($data->booking_transactions_total_discount) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-right">Total Pembayaran </td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-secondary pr-1">Rp.
                                        {{ number_format($data->booking_transactions_total_costs) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice action  -->
        <div class="col-xl-2 col-md-4 col-12 pr-2">
            <div class="card invoice-action-wrapper shadow-none border">
                <div class="card-body px-1 py-1">
                    <h6 for="" class="text-center font-weight-bold">ACTION</h6>
                    <div class="invoice-action-btn my-1">
                        {{-- <button class="btn btn-primary btn-block btn-sm invoice-send-btn">
                            <i class="bx bx-send"></i>
                            <span> Kirim</span>
                        </button> --}}
                        <a href="{{ url('send-email') }}" target="_blank">Kirim</a>
                    </div>
                    <div class="invoice-action-btn my-1">
                        <button class="btn btn-light-primary btn-block btn-sm invoice-print">
                            <i class="bx bx-printer"></i>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
