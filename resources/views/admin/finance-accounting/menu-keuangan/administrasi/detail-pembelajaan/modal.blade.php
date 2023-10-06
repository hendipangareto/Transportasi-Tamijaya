{{--Modal edit--}}
<div class="modal fade text-left" id="modal-edit-detail-pembelajaan" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Pengembalian Penerimaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">No Pengajuan</label>
                            <div class="col-md-8">
                                <input type="text" name="no_penagjuan_pengembalian" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Dana Sisa/Kurang</label>
                            <div class="col-md-8 mb-1">
                                <input type="text" placeholder="Transfer" class="form-control" readonly>
                            </div>
                            <label for="" class="col-md-4 col-form-label"></label>
                            <div class="col-md-8">
                                <select name="dana_sisa_kurang" id="" class="form-control">
                                    <option value="" selected disabled>Pengembalian penerimaan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Cara Pembayaran</label>
                            <div class="col-md-8">
                                <select name="cara_pembayarans" id="" class="form-control">
                                    <option value="" selected disabled>Pilih cara bayar</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Kas/Bank</label>
                            <div class="col-md-8">
                                <select name="banks_id" id="" class="form-control">
                                    <option value="" selected disabled>Pilih kas/bank</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <div class="float-right">
                   <button type="button" class="btn btn-success"><i
                           class="bx bx-check mt"></i> Simpan
                   </button>
               </div>
            </div>
        </div>
    </div>
</div>

