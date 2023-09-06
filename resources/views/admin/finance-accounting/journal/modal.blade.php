<div class="modal fade text-left" id="modal-detail-journal" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Data Detail Journal </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>

            <div class="modal-body p-1">
                <div class="row">
                    <div class="col-md-3">
                        <label>Nomor Jurnal: </label>
                        <div class="form-group">
                            <input type="text" id="detail-journal_number" readonly class="form-control form-control-sm bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Tanggal: </label>
                        <div class="form-group">
                            <input type="text" id="detail-journal_date" readonly
                                class="form-control form-control-sm bg-transparent">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Deskripsi: </label>
                        <div class="form-group">
                            <input type="text" id="detail-journal_description" readonly
                                class="form-control form-control-sm bg-transparent">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <style>
                            .table-data thead tr th {
                                font-size: 11px !important;
                                padding-top: 10px !important;
                                padding-bottom: 10px !important;
                            }

                        </style>
                        <table class="table table-bordered table-hover table-data">
                            <thead>
                                <tr>
                                    <th class="w-20p">Kode Perkiraan</th>
                                    <th class="w-25p">Nama Account</th>
                                    <th class="w-15p text-right">Debit</th>
                                    <th class="w-15p text-right">Kredit</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="detail-account-journal">
                            </tbody>
                        </table>
                        <div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <fieldset class="form-group">
                                        <label class="text-success">DEBIT</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp. </span>
                                            </div>
                                            <input type="text" class="form-control bg-transparent" id="detail-journal_debit" name=""
                                                readonly>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="text-danger">KREDIT</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp. </span>
                                            </div>
                                            <input type="text" class="form-control bg-transparent" id="detail-journal_kredit" name=""
                                                readonly>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>BALANCE</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp. </span>
                                            </div>
                                            <input type="text" class="form-control bg-transparent" id="detail-journal_balance" name=""
                                                readonly>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
