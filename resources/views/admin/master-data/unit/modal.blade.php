<div class="modal fade text-left" id="modal-unit" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Satuan Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-unit" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kode Satuan Unit: </label>
                            <div class="form-group">
                                <input type="text" readonly id="unit_code" name="unit_code"
                                    class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Alias Satuan Unit: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Masukan Alias Unit" id="unit_alias"
                                    name="unit_alias" class="form-control">
                            </div>
                        </div>
                    </div>
                    <label>Nama Satuan Unit: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Satuan Unit" id="unit_name"
                            name="unit_name" class="form-control">
                    </div>
                    <label>Uraian Satuan Unit: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Satuan Unit"
                            id="unit_description" name="unit_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-unit" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-unit" class="btn btn-warning mr-1" onclick="manageData('update')"><i
                            class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
