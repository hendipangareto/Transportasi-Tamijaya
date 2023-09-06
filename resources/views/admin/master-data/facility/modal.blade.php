<div class="modal fade text-left" id="modal-facility" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Fasilitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-facility" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Fasilitas: </label>
                    <div class="form-group">
                        <input type="text" readonly id="facility_code" name="facility_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Nama Fasilitas: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Fasilitas" id="facility_name"
                            name="facility_name" class="form-control">
                    </div>
                    <label>Uraian Fasilitas: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Fasilitas"
                            id="facility_description" name="facility_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-facility" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-facility" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
