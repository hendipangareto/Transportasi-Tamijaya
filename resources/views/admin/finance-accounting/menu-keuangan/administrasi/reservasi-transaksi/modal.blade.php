
{{--Modal detail--}}
<div class="modal fade text-left" id="modal-detail-reservasi-transaksi" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Detail Request Reservasi Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Kode Booking</label>
                            <div class="col-sm-8">
                                <input type="text" id="kode_booking" name="kode_booking"
                                       class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Jenis Transaksi</label>
                            <div class="col-sm-8">
                                <input type="text" id="jenis_transaksi_reservasi" name="jenis_transaksi_reservasi"
                                       class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nominal</label>
                            <div class="col-sm-8">
                                <input type="text" id="nominal_reservasi" name="nominal_reservasi"
                                       class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Berkasi</label>
                            <div class="col-sm-8">
                                <p>berisi image...........</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success mr-1" onclick="approve()"><i
                        class="bx bx-check mt"></i> Approve
                </button>
                <button type="button" class="btn btn-danger mr-1" onclick="reject()"><i
                        class="bx bx-x-circle mt"></i> Reject
                </button>
            </div>
        </div>
    </div>
</div>

{{--Modal Edit--}}
<div class="modal fade text-left" id="modal-edit-voucher" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Voucher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Kode Voucher:</label>
                            <input type="text" id="kode_voucher" name="kode_voucher"
                                   class="form-control" placeholder="Kode automatic" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nilai Voucher</label>
                            <input type="text" id="nilai_voucher" name="nilai_voucher"
                                   class="form-control" placeholder="Masukan nilai voucher">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jumlah Voucher</label>
                            <input type="text" id="jumlah_voucher" name="jumlah_voucher"
                                   class="form-control" placeholder="Masukan jumlah voucher">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">PIC Pembuat</label>
                            <input type="text" id="pic_pembuat" name="pic_pembuat"
                                   class="form-control" placeholder="Masukan nama pic pembuat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Pembuatan</label>
                            <input type="date" id="tanggal_buat" name="tanggal_buat"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Deskripsi:</label>
                            <textarea class="form-control" placeholder="Masukan Deskripsi"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning mr-1"><i
                        class="bx bx-check mt"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>

{{--Modal Detail--}}
<div class="modal fade text-left" id="modal-detail_voucher" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Detail Voucher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Kode Voucher:</label>
                            <input type="text" id="kode_voucher" name="kode_voucher"
                                   class="form-control" placeholder="Kode automatic" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nilai Voucher</label>
                            <input type="text" id="nilai_voucher" name="nilai_voucher"
                                   class="form-control" placeholder="Masukan nilai voucher" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jumlah Voucher</label>
                            <input type="text" id="jumlah_voucher" name="jumlah_voucher"
                                   class="form-control" placeholder="Masukan jumlah voucher" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">PIC Pembuat</label>
                            <input type="text" id="pic_pembuat" name="pic_pembuat"
                                   class="form-control" placeholder="Masukan nama pic pembuat" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Pembuatan</label>
                            <input type="date" id="tanggal_buat" name="tanggal_buat"
                                   class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Deskripsi:</label>
                            <textarea class="form-control" placeholder="Masukan Deskripsi" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning mr-1"><i
                        class="bx bx-check mt"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>
