<div class="modal fade text-left" id="modal-detail-reguler-transaction" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Detail Data Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body px-0 py-1" id="detail-data-transaction">
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="modal-archieve-reguler-transaction" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title-archieve">Archieve Data Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body" id="data-archieve-reguler-transaction">
                <table class="table table-bordered table-hover table-transaction" id="table-all-transaction">
                    <thead>
                        <tr>
                            <th class="w-10p">Kode</th>
                            <th class="w-10p">Tipe</th>
                            <th class="w-12p">Departure</th>
                            <th class="w-10p">Tujuan</th>
                            <th>Origin - Destination</th>
                            <th class="w-12p text-right">Nominal</th>
                            <th class="w-8p">Status</th>
                            <th class="w-5p text-center">Act.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td class="w-10p">Kode</td>
                        <td class="w-10p">Tipe</td>
                        <td class="w-12p">Departure</td>
                        <td class="w-10p">Tujuan</td>
                        <td>Origin - Destination</td>
                        <td class="w-12p text-right">Nominal</td>
                        <td class="w-8p">Status</td>
                        <td class="w-5p text-center">
                            <div class="d-flex">
                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                    onclick="restoreData(this)">
                                    <i class="bx bx-revision font-size-base"></i>
                                </div>
                                <div class="badge-circle badge-circle-sm badge-circle-danger pointer"
                                    onclick="deleteData(this)">
                                    <i class="bx bx-trash font-size-base"></i>
                                </div>
                            </div>
                        </td>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="modal-payment-reguler-transaction" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Pembayaran Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body py-1" id="payment-data-transaction">
               
            </div>
        </div>
    </div>
</div>
