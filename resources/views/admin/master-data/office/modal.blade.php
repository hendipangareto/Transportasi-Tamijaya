<div class="modal fade text-left" id="modal-office" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Kantor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-office" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kode Kantor: </label>
                            <div class="form-group">
                                <input type="text" readonly id="office_code" name="office_code"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Lokasi Kantor: </label>
                            <div class="form-group">
                                <select name="office_origin" id="office_origin" class="form-control">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="YOGYAKARTA">YOGYAKARTA</option>
                                    <option value="BALI">BALI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Nama Kantor: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Kantor" id="office_name"
                            name="office_name" class="form-control">
                    </div>
                    <label>Nomor Telepon: </label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                            </div>
                            <input type="text" id="office_phone" name="office_phone" class="form-control money"
                                placeholder="Silahkan masukan nomor telepon">
                        </div>

                    </div>

                    <label>Alamat Kantor: </label>
                    <div class="form-group">
                        <textarea type="text" rows="3" placeholder="Silahkan masukan alamat Kantor"
                            id="office_address" name="office_address" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-office" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-office" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
