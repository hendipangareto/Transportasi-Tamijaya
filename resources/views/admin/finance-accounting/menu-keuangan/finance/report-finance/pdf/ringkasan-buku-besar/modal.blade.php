<div class="modal fade text-left" id="modal-ringkasan-buku-besar" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Parameter Laporan Ringkasan Buku Besar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Tanggal Awal</label>
                            <div class="col-md-8">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Tanggal Akhir</label>
                            <div class="col-md-8">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Parameter Tambahan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="select2Multiple" class="col-md-4 col-form-label"><input type="checkbox"></label>
                            <div class="col-md-8">
                                <label for="">Tampilkan data dengan saldo nol</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a target="_blank" href="{{route('finance-accounting-menu-keuangan-finance-report-finance-reportPdfRingkasanBukuBesar')}}" class="btn btn-primary">
                    <i class='bx bx-check-circle'></i> Tampilkan
                </a>
            </div>
        </div>
    </div>
</div>
