<form action="#" enctype="multipart/form-data"
      method="post">
    @csrf
    <div class="modal fade text-left" id="modal-add-pengajuan-dana-belanja-user" tabindex="-1" role="dialog"
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
                                <label for="">Nama Toko <sub style="color: red">*</sub></label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected disabled>Pilih Toko</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tipe</label>
                                <input type="text" class="form-control" id="tipe_items" name="tipe_items" placeholder="Masukan tipe items">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Item <sub style="color: red">*</sub></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Toko</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kuantitas <sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="kuantitas_items" name="kuantitas_items" placeholder="Masukan kuantitas">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan <sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="satuan_items" name="satuan_items" placeholder="Masukan satuan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Satuan <sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="harga_satuan_items" name="harga_satuan_items" placeholder="Masukan harga Satuan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="catatan_items" id="catatan_items" class="form-control" placeholder="Masukan catatan item"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Cara Bayar <sub style="color: red">*</sub></label>
                                <select name="cara_bayar_item" id="cara_bayar_item" class="form-control">
                                    <option value="" selected disabled>Pilih cara bayar</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Batas Waktu Pembayaran</label>
                                <input type="date" class="form-control" id="batas_waktu_bayar_items" name="batas_waktu_bayar_items">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success mr-1"><i
                            class="bx bx-check mt"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

{{--Modal edit--}}
<form action="#" enctype="multipart/form-data"
      method="post">
    @csrf
    <div class="modal fade text-left" id="modal-edit-pengajuan-dana-belanja-user" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Form Edit Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Toko <sub style="color: red">*</sub></label>
                                <select name="edit_store_id" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Toko</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tipe</label>
                                <input type="text" class="form-control" id="edit_tipe_items" name="edit_tipe_items">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Item <sub style="color: red">*</sub></label>
                                <select name="edit_item_name" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Toko</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kuantitas <sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="edit_kuantitas_items" name="edit_kuantitas_items">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan <sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="edit_satuan_items" name="edit_satuan_items">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Satuan <sub style="color: red">*</sub></label>
                                <input type="text" class="form-control" id="edit_harga_satuan_items" name="edit_harga_satuan_items">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="edit_catatan_items" id="edit_catatan_items" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Cara Bayar <sub style="color: red">*</sub></label>
                                <select name="edit_cara_bayar_item" id="edit_cara_bayar_item" class="form-control">
                                    <option value="" selected disabled>Pilih cara bayar</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Batas Waktu Pembayaran</label>
                                <input type="date" class="form-control" id="edit_batas_waktu_bayar_items" name="edit_batas_waktu_bayar_items">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning"><i
                            class="bx bx-check mt"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


{{--Modal Detail--}}

<div class="modal fade text-left" id="modal-details-pengajuan-dana-belanja-user" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Detail Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Toko <sub style="color: red">*</sub></label>
                            <select name="edit_store_id" id="" class="form-control" disabled>
                                <option value="" selected disabled>Pilih Toko</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipe</label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Item <sub style="color: red">*</sub></label>
                            <select name="edit_item_name" id="" class="form-control" disabled>
                                <option value="" selected disabled>Pilih Toko</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kuantitas <sub style="color: red">*</sub></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Satuan <sub style="color: red">*</sub></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Harga Satuan <sub style="color: red">*</sub></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Catatan</label>
                            <textarea class="form-control" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cara Bayar <sub style="color: red">*</sub></label>
                            <select name="edit_cara_bayar_item" id="edit_cara_bayar_item" class="form-control" disabled>
                                <option value="" selected disabled>Pilih cara bayar</option>
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Batas Waktu Pembayaran</label>
                            <input type="date" class="form-control" value="" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
