<div class="modal fade text-left" id="modal-premi" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form premi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-premi" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Premi: </label>
                    <div class="form-group">
                        <input type="text" readonly id="premi_code" name="premi_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Nama Premi: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama premi" id="premi_name" name="premi_name"
                            class="form-control">
                    </div>
                    <label>Nominal Premi: </label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" id="premi_amount" name="premi_amount" class="form-control money"
                                placeholder="Silahkan masukan nominal premi">
                        </div>

                    </div>
                    <label>Uraian premi: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian premi"
                            id="premi_description" name="premi_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-premi" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-premi" class="btn btn-warning mr-1" onclick="manageData('update')"><i
                            class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
