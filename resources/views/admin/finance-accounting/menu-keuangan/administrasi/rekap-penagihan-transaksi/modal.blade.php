{{--Modal detail--}}
<div class="modal fade text-left" id="modal-detail-rekap-penagihan-transaksi" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Detail Penagihan Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table dataTables table-bordered table-hover"
                                   id="table-detail-rekap-penagihan-transaksi">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Tanggal Transaksi</th>
                                    <th class="w-10p">Kode Transaksi</th>
                                    <th class="w-10p">Tipe Armada</th>
                                    <th class="w-10p">Jumlah Tiket</th>
                                    <th class="w-10p">Nilai Transaksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Total Nilai Transaksi</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Total nilai" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Cara Pembayaran</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Transfer" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Nama Bank</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="Nama Bank" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">No Rekening</label>
                            <div class="col-md-8">
                                <input type="text" placeholder="No Rekening" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Lampirkan Dokumen</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success mr-1" onclick="approve()"><i
                        class="bx bx-check mt"></i> Approve
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
