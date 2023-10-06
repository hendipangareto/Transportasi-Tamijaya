<style>
    .dashed-line {
        border: none;
        border-top: 1px dashed black;
        margin: 0;
        padding: 0;
        width: 100%;
    }
</style>

<div class="modal fade text-left" id="modal-detail-transaksi-reguler" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Detail Transaksi Reguler</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <h5>EXECUTIVE CLASS</h5>
                            <H4>22 Kursi</H4>
                        </div>
                        <div class="form-group">
                            <p style="margin:0px;">Rabu, 04 Oktober 2023</p>
                            <p style="margin-left: 6px; margin-bottom: -2px;font-size: 12px;">Jogjakarta</p>
                            <p style="margin-left: 6px; margin-bottom: -2px; font-size: 12px;">Bali</p>
                            <p style=" margin-left: 6px; font-size: 12px;">Berangkat 05.30(Terminal3)</p>
                        </div>
                        <div class="form-group">
                            <h6 style="margin:0px;">DETAIL PEMBAYARAN</h6>
                            <table width="40%">
                                <tbody>
                                <tr>
                                    <td>Pembayaran Melalui</td>
                                    <td>:</td>
                                    <td>#####</td>
                                </tr>
                                <tr>
                                    <td>Pembayaran</td>
                                    <td>:</td>
                                    <td>#####</td>
                                </tr>
                                <tr>
                                    <td>Cara Pembayaran</td>
                                    <td>:</td>
                                    <td>#####</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 text-center" style="background-color: #F2F4F4">
                        <label for="" class="text-center">Code Booking :</label><br>
                        <h5 style="color: red">R31074629</h5>
                        <div class="text-center">
                            {!! QrCode::size(100)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
                        </div>
                    </div>
                </div>
                <br>
                <hr class="dashed-line">
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="card-title">DAFTAR PENUMPANG</h6>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                    <tr>
                                        <th class="w-3p">No</th>
                                        <th>Jenis Item</th>
                                        <th class="w-5p">Jumlah</th>
                                        <th class="w-10p">Harga Satuan</th>
                                        <th class="w-10p">Jumlah Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Regular Bus</td>
                                        <td>5</td>
                                        <td>5000000</td>
                                        <td>5000000</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="dashed-line">
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <h6>DETAIL PEMBELIAN</h6>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="w-3p">No</th>
                                        <th>Jenis Item</th>
                                        <th class="w-10p">Jumlah</th>
                                        <th class="w-10p">Harga Satuan</th>
                                        <th class="w-10p">Jharga Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Bus Reguler</td>
                                        <td>2</td>
                                        <td>550000</td>
                                        <td>550000</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group row">
                                        <label for="" class="col-md-2 col-form-label">Total</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control money" style="font-style: italic"
                                                       placeholder="Total otomatis" value="1.100.000" readonly>
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
</div>
</div>





