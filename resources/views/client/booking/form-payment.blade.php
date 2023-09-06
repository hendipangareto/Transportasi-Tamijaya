<div id="detail-payment" class="mt-3">
    <h5>Payment Method: </h5>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <input type="hidden" id="payment_method" name="payment_method" value="CASH">
                <input type="hidden" id="id_payment" name="id_payment">
                <div class="col-md-6">
                    <label class="payment" for="payment_cash">
                        <input onchange="choosePayment()" checked type="radio" name="payment" id="payment_cash" />
                        <div class="payment-content">
                            <img src="{{ asset('images/icon-cash.png') }}" alt="Icon Payment Cash" />
                            <div class="payment-details">
                                <span>Cash</span>
                                <p>Total pembayaran dengan cash Rp.</p>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-md-6">
                    <label class="payment" for="payment_transfer">
                        <input onchange="choosePayment()" type="radio" name="payment" id="payment_transfer" />
                        <div class="payment-content">
                            <img src="{{ asset('images/icon-transfer.png') }}" alt="Icon Payment Transfer" />
                            <div class="payment-details">
                                <span>Transfer</span>
                                <p>Total pembayaran dengan bukti transfer.</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <h5>Keterangan Payment Method: </h5>
            <div id="payment-method-information">

                {{-- PAYMENT CASH --}}
                <div class="card card--payment-method" id="payment-description-cash">
                    <label>Total Pembayaran dengan cash:</label>
                    <div class="d-flex">
                        <h4 class="font-weight-bold title-transfer-amount">Rp. 0,-</h4>
                    </div>
                </div>

                {{-- PAYMENT TRANSFER --}}
                <div class="card card--payment-method" id="payment-description-transfer" style="display: none">

                    <div class="row" id="row-bank-transfer" style="display: none">
                        <div class="col-md-12">
                            <label>Bank Transfer:</label>
                            <div class="form-group">
                                <select id="id_bank_transfer" onchange="chooseBank()" name="id_bank_transfer"
                                    class="form-control">
                                    <option value="">Choose Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">
                                            {{ $bank->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-header px-0 pt-0 d-flex justify-content-between">
                        <h6 class="card-title" id="title-transfer-payment">
                            Payment Transfer </h6>
                        <img id="image-transfer-payment" style="width: 20%" src="" alt="">
                    </div>
                    <div class="card-content collapse show px-0">
                        <div class="card-body px-0">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Nomor Rekening:</label>
                                    <h6 class="font-weight-bold" id="title-transfer-account"></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6 for="" class="font-weight-bold pointer mt-1 text-primary">
                                        Salin
                                        <i class="bx bx-copy-alt"></i>
                                    </h6>
                                </div>
                                <div class="col-md-8">
                                    <label>Total Pembayaran:</label>
                                    <div class="d-flex">
                                        <h6 class="font-weight-bold title-transfer-amount">
                                            Rp.
                                        </h6>
                                        <i class="bx bx-copy-alt text-primary pointer"></i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h6 for="" class="font-weight-bold pointer mt-1 text-primary">
                                        Lihat Detail
                                    </h6>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <h6>Lampirkan Bukti Transfer:</h6>
                                    <div class="form-group">
                                        <input type="file" id="payment_attachment" name="payment_attachment"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <div id="preview" class="text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
