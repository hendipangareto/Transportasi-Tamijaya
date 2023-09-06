<div class="modal fade text-left" id="modal-account" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Kode Perkiraan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-account" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Kode Perkiraan: </label>
                    <div class="form-group">
                        <input type="text" id="account_code" name="account_code"
                            class="form-control" placeholder="Silahkan masukan Kode Perkiraan" >
                    </div>
                    <label>Nama Kode Perkiraan: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Kode Perkiraan" id="account_name"
                            name="account_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-account" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-account" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
