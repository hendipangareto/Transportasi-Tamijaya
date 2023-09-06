<div class="row">
    <div class="col-md-6">
        <div class="card shadow-none border">
            <div class="card-body py-1 px-1">
                <style>
                    #table-detail-transaction thead tr th,
                    #table-detail-transaction tbody tr td,
                    #table-detail-transaction tfoot tr td {
                        font-size: 11px !important;
                    }

                    #table-detail-transaction tfoot tr td {
                        padding-top: 5px !important;
                        padding-bottom: 5px !important;
                    }

                </style>
                <h6 for="" class="text-center font-weight-bold">Detail Pembayaran</h6>
                <table class="table table-responsive mb-0" id="table-detail-transaction">
                    <thead>
                        <tr class="border-0">
                            <th>TIPE</th>
                            <th>SEAT</th>
                            <th>PRICE</th>
                            <th class="text-center">QTY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->booking_seats_booking_id }}</td>
                                <td>{{ $detail->booking_seats_seat_number }}</td>
                                <td>{{ number_format($detail->booking_seats_seat_price) }}</td>
                                <td class="text-center">1</td>
                                <td class="text-right">{{ number_format($detail->booking_seats_seat_price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="font-weight-bold text-right">Total </td>
                            <td style="padding-left:10px!important"
                                class="font-weight-bold text-right pr-1">
                                {{ number_format($header->booking_transactions_total_costs) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="font-weight-bold text-right">Outstanding Payment </td>
                            <input type="hidden" id="outstanding-payment-data"
                                value={{ $header->booking_transactions_outstanding_payment }}>
                            <td style="padding-left:10px!important"
                                class="font-weight-bold text-right pr-1">
                                {{ number_format($header->booking_transactions_outstanding_payment) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="font-weight-bold text-right">Down Payment </td>
                            <td style="padding-left:10px!important" class="font-weight-bold text-right pr-1">
                                {{ number_format($header->booking_transactions_total_down_payment) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="font-weight-bold text-right">Potongan Discount </td>
                            <td style="padding-left:10px!important"
                                class="font-weight-bold text-right pr-1">
                                {{ number_format($header->booking_transactions_total_discount) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="font-weight-bold text-right">Total Pembayaran </td>
                            <td style="padding-left:10px!important"
                                class="font-weight-bold text-right pr-1">
                                {{ number_format($header->booking_transactions_total_costs) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="font-weight-bold text-right">Status</td>
                            <td style="padding-left:10px!important"
                                class="font-weight-bold text-right pr-1">
                                {{ $header->booking_transactions_status }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card shadow-none border">
            <div class="card-body py-1 px-1">
                <h6 for="" class="text-center font-weight-bold">History Pembayaran</h6>

                <input type="hidden" id="id_booking_transaction" name="id_booking_transaction"
                    value="{{ $header->id }}">
                <ul class="px-1" style="font-size:11px">
                    @forelse ($payments as $payment)
                        <li>Pembayaran Rp.
                            {{ number_format($payment->amount) }} ({{ $payment->payment_type }})
                            pada {{ date_format(date_create($payment->created_at), 'd M Y') }} dengan status :
                            @if ($payment->status == 'REQUESTED')
                                <label class="text-warning" style="font-size:11px">{{ $payment->status }}</label>
                            @elseif($payment->status == 'PAID')
                                <label class="text-success" style="font-size:11px">{{ $payment->status }}</label>
                            @elseif($payment->status == 'REJECT')
                                <label class="text-danger" style="font-size:11px">{{ $payment->status }}</label>
                            @endif

                        </li>
                    @empty
                        <li>Belum terdapat data pembayaran</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-none border">
            <div class="card-body pt-1 pb-0">
                <h6 for="" class="text-center font-weight-bold">Form Pembayaran</h6>
                <form class="form form-vertical">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Nominal</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input type="text" class="form-control" id="nominal_payment">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Tipe Pembayaran</label>
                                    <div class="d-flex justify-content-between">
                                        <input type="hidden" id="payment_method" name="payment_method" value="CASH">
                                        <div class="radio">
                                            <input type="radio" name="payment" onchange="choosePayment()"
                                                id="payment_cash" checked="">
                                            <label stlye="font-size:11px" for="payment_cash">CASH</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="payment" onchange="choosePayment()"
                                                id="payment_transfer">
                                            <label stlye="font-size:11px" for="payment_transfer">TRANSFER</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Berkas</label>
                                    <input type="file" id="attachment_payment" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer pt-0">
                <div class="row">
                    <div class="col-md-12">
                        <button onclick="submitPayment()" type="button" class="btn btn-block btn-outline-success"><i
                                class="bx bx-save"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
