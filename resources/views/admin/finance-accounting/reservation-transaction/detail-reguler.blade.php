<style>
    .invoice-view-wrapper span {
        font-size: 12px;
    }

    .invoice-view-wrapper h6 {
        font-size: 14px;
    }

    .invoice-view-wrapper tfoot td {
        font-size: 14px;
    }

</style>
<section class="invoice-view-wrapper">
    <input type="hidden" id="id-reguler" value="{{ $data->id }}">
    <input type="hidden" id="reguler-type" value="{{ $data->type_bus }}">
    <div class="row">
        <!-- invoice view page -->
        <div class="col-xl-9 col-md-8 col-12">
            <div class="card invoice-print-area">
                <div class="card-content">
                    <div class="card-body py-0 px-1">
                        <input type="hidden" id="booking-transaction-code"
                            value="{{ $data->booking_transactions_code }}">
                        <!-- header section -->
                        <div class="row">
                            <div class="col-xl-3 col-md-12">
                                <span class="invoice-number">NOMOR TRANSAKSI :</span>
                                <span class="font-weight-bold">{{ $data->booking_transactions_code }}</span>
                            </div>
                            <div class="col-xl-7 col-md-12">
                                <div class="d-flex align-items-center justify-content-xl-end flex-wrap">
                                    <div class="mr-1">
                                        <small class="text-muted">Tanggal Transaksi:</small>
                                        <span>{{ $data->created_at }}</span>
                                    </div>
                                    <div>
                                        <small class="text-muted">Tanggal Keberangkatan:</small>
                                        <span>{{ $data->date_departure }}</span>
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
                                    <span>{{ $data->type_bus }} CLASS</span>
                                </div>
                                <div class="">
                                    <span>{{ $data->destination }}</span>
                                </div>
                                <div class="">
                                    <span>Berangkat dari : {{ $data->pick_point }}</span>
                                </div>
                                <div class="">
                                    <span>Tiba di : {{ $data->arrival_point }}</span>
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
                                        <a href="{{ asset('/storage/' . $data->booking_transactions_payment_attachment) }}"
                                            target="_blank"><span style="text-decoration: underline"
                                                class="text-primary pointer">Lihat Bukti
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
                            #table-detail-seat thead tr th {
                                padding-top: 0px !important;
                                padding-bottom: 8px !important;
                            }

                            #table-detail-seat tfoot tr td {
                                padding-top: 5px !important;
                                padding-bottom: 5px !important;
                            }

                        </style>
                        <table class="table mb-0" id="table-detail-seat">
                            <thead>
                                <tr class="border-0">
                                    <th>TIPE BUS</th>
                                    <th>SEAT</th>
                                    <th>PRICE</th>
                                    <th class="text-center">QTY</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $item)
                                    <tr>
                                        <td>{{ $data->type_bus }} CLASS</td>
                                        <td>{{ $item->booking_seats_seat_number }}</td>
                                        <td>Rp. {{ number_format($item->booking_seats_seat_price) }}</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">Rp.
                                            {{ number_format($item->booking_seats_seat_price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr @if ($data->booking_transactions_is_agent !== 'Y') style="display: none" @endif>
                                    <td colspan="4" class="font-weight-bold text-right">Agent </td>
                                    <td style="padding-left:10px!important" class="font-weight-bold text-right pr-1">
                                        {{ $data->agent_name }}</td>
                                </tr>
                                <tr @if ($data->booking_transactions_is_agent !== 'Y') style="display: none" @endif>
                                    @php
                                        $total_before_discount = $data->booking_transactions_total_costs + $data->booking_transactions_total_discount;
                                    @endphp
                                    <td colspan="4" class="font-weight-bold text-right">Total </td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-success pr-1">Rp.
                                        {{ number_format($total_before_discount) }}</td>
                                </tr>
                                <tr @if ($data->booking_transactions_is_agent !== 'Y') style="display: none" @endif>
                                    <td colspan="4" class="font-weight-bold text-right">Potongan Discount </td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-danger pr-1">Rp.
                                        {{ number_format($data->booking_transactions_total_discount) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="font-weight-bold text-right">Total Pembayaran </td>
                                    <td style="padding-left:10px!important"
                                        class="font-weight-bold text-right text-primary pr-1">Rp.
                                        {{ number_format($data->booking_transactions_total_costs) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice action  -->
        <div class="col-xl-3 col-md-4 col-12 pr-2">
            <div class="card invoice-action-wrapper shadow-none border">
                <div class="card-body px-1 py-1">
                    <h6 for="" class="text-center font-weight-bold">ACTION</h6>
                    <div class="invoice-action-btn my-1">
                        <button class="btn btn-outline-success btn-block btn-sm"
                            onclick="manageData('approve-reguler')">
                            <i class="bx bx-check"></i>
                            <span>Approve</span>
                        </button>
                        <button class="btn btn-outline-danger btn-block btn-sm" onclick="manageData('reject-reguler')">
                            <i class="bx bx-x-circle"></i>
                            <span>Reject</span>
                        </button>
                        {{-- <button class="btn btn-outline-warning btn-block btn-sm"
                            onclick="openModal('reservation-transaction','view-attachment-reguler')">
                            <i class="bx bx-image-alt"></i>
                            <span>Attachment</span>
                        </button> --}}
                    </div>
                </div>
            </div>

            <div class="card" id="view-attachment-reguler" style="display: none">
                @php
                    $img = '/storage/' . $data->booking_transactions_payment_attachment;
                @endphp
                <img src="{{ $img }}" class="w-100" alt="">
            </div>
        </div>
    </div>
</section>
