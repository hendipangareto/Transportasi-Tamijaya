<div class="modal fade text-left" id="modal-payment-request" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="" id="modal-title">Detail Payment Request</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-payment-request" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" id="id_booking_payment">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Nominal</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input type="text" class="form-control bg-transparent" readonly id="nominal_payment">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Tipe Pembayaran</label>
                                    <input type="text" id="payment_type"
                                        class="form-control form-control-sm  bg-transparent" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Berkas</label>
                                    <img src="{{ asset('images/Bus-Tamijaya.png') }}" class="w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="approve-payment-request" class="btn btn-sm btn-outline-success mr-1"
                        onclick="manageData('approve')"><i class="bx bx-check"></i> Approve</button>
                    <button type="submit" id="reject-payment-request" class="btn btn-sm btn-outline-danger mr-1"
                        onclick="manageData('reject')"><i class="bx bx-x-circle"></i> Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>
