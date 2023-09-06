<div class="modal fade text-left" id="modal-schedule-bus-pariwisata" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h4 class="modal-title" id="modal-title">Jadwal Bus Pariwisata <span id="request-capacity"></span></h4>
                <div class="d-flex justify-content-between">
                    <small id="book-warn-message" class="my-auto"></small>
                    <button type="button" class="btn btn-success px-2" style="display:none;" id="button-book-bus-schedule" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-check-circle"></i> Book
                    </button>
                    <button type="button" class="btn btn-danger ml-1 px-2" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i> Cancel
                    </button>
                </div>
            </div>
            <div class="modal-body px-0 py-1" id="data-schedule-bus">

            </div>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="modal-customer" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-customer" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label>Nama customer: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama customer" id="customer_name"
                            name="customer_name" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Telepon: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" id="customer_phone" name="customer_phone"
                                        class="form-control money" placeholder="Nomor telepon">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email: </label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    </div>
                                    <input type="text" id="customer_email" name="customer_email"
                                        class="form-control money" placeholder="Masukan Email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-customer" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>