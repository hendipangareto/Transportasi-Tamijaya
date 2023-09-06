<div class="modal fade text-left" id="TambahPengajuanPembelian" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Data Supllier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-date" class="form-label">Nama Toko</label>
                                        <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-time" class="form-label">Tipe</label>
                                        <input type="text" class="form-control" placeholder="" id="flatpickr-time" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <label for="flatpickr-datetime" class="form-label">Nama Item</label>
                                        <input type="text" class="form-control" placeholder="" id="flatpickr-datetime" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="flatpickr-multi" class="form-label">Kuantitas*</label>
                                                <input type="text" class="form-control" placeholder="" id="flatpickr-multi" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="flatpickr-multi" class="form-label">Satuan*</label>
                                                <input type="text" class="form-control" placeholder="" id="flatpickr-multi" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <label for="flatpickr-range" class="form-label">Harga Satuan</label>
                                        <input type="text" class="form-control" placeholder="" id="flatpickr-range" />
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <label class="form-label" for="bootstrap-maxlength-example2">Catatan</label>
                                        <textarea id="bootstrap-maxlength-example2" class="form-control bootstrap-maxlength-example" rows="3" maxlength="255"></textarea>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-disabled-range" class="form-label">Cara Pembayaran</label>
                                        <input type="text" class="form-control" placeholder=" " id="flatpickr-disabled-range" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="flatpickr-inline" class="form-label">Batas Waktu Pembayaran</label>
                                        <input type="date" class="form-control mb-1" placeholder=" " id="flatpickr-inline" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add-agent" class="btn btn-warning mr-1"  data-dismiss="modal" ><i
                            class="bx bx-arrow-back"></i> Kembali
                    </button>
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
