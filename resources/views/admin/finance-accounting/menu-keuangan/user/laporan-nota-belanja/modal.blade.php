<form action="#" enctype="multipart/form-data"
      method="post">
    @csrf
    <div class="modal fade text-left" id="modal-add-items-barang" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Tambah Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Product</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Masukan Nama Product">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kuantitas</label>
                                <input type="text" class="form-control" id="qyt_product" name="qyt_product" placeholder="Masukan kuantitas product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <input type="text" name="satuan_product" class="form-control" placeholder="Masukan satuan product">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Satuan</label>
                                <input type="text" class="form-control" id="harga_satuan_product" name="harga_satuan_product" placeholder="Masukan harga satuan product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tipe Pembayaran</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Masukan Nama Product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Batas Waktu Pembayaran</label>
                                <input type="date" name="batas_waktu_bayar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status Transaksi</label>
                                <input type="text" class="form-control" id="qyt_product" name="qyt_product" placeholder="Masukan kuantitas product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Bank</label>
                                <input type="text" name="satuan_product" class="form-control" placeholder="Masukan satuan product">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Rekening</label>
                                <input type="text" class="form-control" id="harga_satuan_product" name="harga_satuan_product" placeholder="Masukan harga satuan product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea class="form-control" name="catatan_product" placeholder="Masukan Catatan terkait product"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-check mt"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
