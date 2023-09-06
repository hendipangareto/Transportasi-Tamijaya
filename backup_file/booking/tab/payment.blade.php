{{-- START TAB PAYMENT --}}
<h6>Payment Method: <span style="color:red;">*</span></h6>
<div class="row">
    <div class="col-4 col-md-4 " style="border-right:1px solid #cecece">
        <div class="row">
            <input type="hidden" id="payment_method" name="payment_method" value="CASH">
            <input type="hidden" id="id_payment" name="id_payment">
            <div class="col-md-6">
                <div class="radio">
                    <input type="radio" name="payment" onchange="choosePayment()" id="payment_cash" checked>
                    <label for="payment_cash">CASH</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="radio">
                    <input type="radio" name="payment" onchange="choosePayment()" id="payment_transfer">
                    <label for="payment_transfer">TRANSFER</label>
                </div>
            </div>
        </div>
        <div class="row" id="row-bank-transfer" style="display: none">
            <div class="col-md-12">
                <label>Bank Transfer: <span style="color:red;">*</span></label>
                <div class="form-group">
                    <select id="id_bank_transfer" onchange="chooseBank()" name="id_bank_transfer"
                        class="form-control">
                        <option value="">Choose Bank</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- <h5>Keterangan Payment Method</h5> --}}
    <div class="col-5 col-md-5">
        <h6>Keterangan Payment Method: </h6>
        <div id="payment-method-information">

            {{-- PAYMENT CASH --}}
            <div class="card px-0 pt-0" id="payment-description-cash">
                <label>Total Pembayaran dengan cash:</label>
                <div class="d-flex">
                    <h6 class="font-weight-bold title-transfer-amount">Rp. 0,-</h6>
                </div>
                <button type="button" class="btn btn-success w-100 submit_transaction_pariwisata" style="display: none" onclick="submitTransaction()">Submit Data</button>
            </div>

             {{-- PAYMENT TRANSFER --}}
            <div class="card px-0 pt-0" id="payment-description-transfer" style="display: none">
                <div class="card-header px-0 pt-0 d-flex justify-content-between">
                    <h6 class="card-title" id="title-transfer-payment">Payment Transfer </h6>
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
                                <h6 for="" class="font-weight-bold pointer mt-1 text-primary">Salin <i
                                        class="bx bx-copy-alt"></i></h6>
                            </div>
                            <div class="col-md-8">
                                <label>Total Pembayaran:</label>
                                <div class="d-flex">
                                    <h6 class="font-weight-bold title-transfer-amount" >Rp. </h6><i
                                        class="bx bx-copy-alt text-primary pointer"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 for="" class="font-weight-bold pointer mt-1 text-primary">Lihat Detail</h6>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h6>Lampirkan Bukti Transfer:</h6>
                                <div class="form-group">
                                    <input type="file" id="payment_attachment" name="payment_attachment" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <div id="preview" class="text-center"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success w-100 submit_transaction_pariwisata" style="display: none" onclick="submitTransaction()">Submit Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
