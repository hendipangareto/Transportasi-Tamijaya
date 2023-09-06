<div class="modal fade text-left" id="modal-detail-inbox" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal-content-inbox">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Detail Pesan Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-inbox" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id" readonly name="id" />
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Pengirim: </label>
                            <div class="form-group">
                                <input type="text" id="inbox_name" readonly name="inbox_name"
                                    class="form-control bg-transparent    ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Pesan: </label>
                            <div class="form-group">
                                <input type="text" id="created_at" readonly name="created_at"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Telepon: </label>
                            <div class="form-group">
                                <input type="text" id="inbox_phone" readonly name="inbox_phone"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email: </label>
                            <div class="form-group">
                                <input type="text" id="inbox_email" readonly name="inbox_email"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Subjek: </label>
                            <div class="form-group">
                                <input type="text" id="inbox_subject" readonly name="inbox_subject"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Pesan: </label>
                            <div class="form-group">
                                <textarea type="text" id="inbox_message" readonly rows="3" name="inbox_message"
                                    class="form-control bg-transparent"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card " id="reply-body">
                        <div class="card-body my-0 py-0 px-0 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Balas Pesan: </label>
                                    <div class="form-group">
                                        <textarea type="text" id="inbox_reply"
                                            style="background-color: rgb(209, 255, 150)" rows="3"
                                            name="inbox_reply" class="form-control "></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" id="reply-inbox"
                            class="btn btn-block btn-warning mr-1" onclick="manageData('update')"><i
                                class="bx bx-reply"></i> Reply</button></div>
                    <div class="col-md-4"><button type="button" id="read-inbox"
                            class="btn btn-block btn-primary mr-1" onclick="manageData('read')"><i
                                class="bx bx-show"></i> Mark As Read</button></div>


                </div>
            </form>
        </div>
    </div>
</div>
