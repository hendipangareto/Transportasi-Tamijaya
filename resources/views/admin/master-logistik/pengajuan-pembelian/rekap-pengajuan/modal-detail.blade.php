<div class="modal fade text-left" id="DetailPengajuan" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Detail Rekap Pengajuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-4">
                                <div class="card invoice-preview-card">
                                    <div class="table-responsive">
                                        <table class="table border-top m-0 table-hover">
                                            <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Toko</th>
                                                <th>Nama Item</th>
                                                <th>Kuantitas</th>
                                                <th>Satuan</th>
                                                <th>Harga Satuan <br> (Rp.)</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="text-center">
                                                <td>$32</td>
                                                <td>$32</td>
                                                <td>$32</td>
                                                <td>$32</td>
                                                <td>$32</td>
                                                <td>1</td>
                                                <td>$32.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Total Lunas/Cas</h6>
                                                <h6 style="background-color: #ff9900">Rp.600.0000</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Total Hutang</h6>
                                                <h6 style="background-color: #fd5656">Rp.800.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Total Pengajuan Dana</h6>
                                                <h6 style="background-color: #95fa6b">Rp.900.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
