<div class="modal fade text-left" id="modal-grafik-proyeksi-kas" tabindex="-1" role="dialog"
     aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Parameter Laporan Grafik Proyeksi Kas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">Dari</label>
                            <div class="col-md-8">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label">s/d</label>
                            <div class="col-md-8">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a target="_blank" href="{{route('finance-accounting-menu-keuangan-finance-report-finance-reportPdfJurnalUmum')}}" class="btn btn-primary">
                    <i class='bx bx-check-circle'></i> Tampilkan
                </a>
            </div>
        </div>
    </div>
</div>
