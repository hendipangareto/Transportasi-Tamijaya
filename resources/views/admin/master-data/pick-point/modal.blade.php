<div class="modal fade text-left" id="modal-pick-point" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Titik Penjemputan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-pick-point" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Titik Penjemputan: </label>
                    <div class="form-group">
                        <input type="text" readonly id="pick_point_code" name="pick_point_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Asal Penjemputan: </label>
                    <div class="form-group">
                        <select id="pick_point_origin" name="pick_point_origin" class="form-control">
                            <option value="">Silahkan Pilih Asal</option>
                            <option value="JOGJA">JOGJA</option>
                            <option value="KLATEN-SOLO-NGAWI">KLATEN-SOLO-NGAWI</option>
                            <option value="DENPASAR">DENPASAR</option>
                        </select>
                    </div>
                    <label>Nama Titik Penjemputan: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Titik Penjemputan" id="pick_point_name"
                            name="pick_point_name" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label>Waktu Penjemputan: </label>
                            <div class="form-group">
                                <input type="time" id="pick_point_eta"
                                    name="pick_point_eta" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label>Zona Waktu: </label>
                            <div class="form-group">
                                <select id="pick_point_zone" name="pick_point_zone" class="form-control">
                                    <option value="">Pilih Zona Waktu</option>
                                    <option value="WIB">WIB</option>
                                    <option value="WITA">WITA</option>
                                    <option value="WIT">WIT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Uraian Titik Penjemputan: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Titik Penjemputan"
                            id="pick_point_description" name="pick_point_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-pick-point" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-pick-point" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
