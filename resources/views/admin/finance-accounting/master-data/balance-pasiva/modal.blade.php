<div class="modal fade text-left" id="modal-balance-pasiva" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Neraca Pasiva</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-balance-pasiva" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Neraca: </label>
                    <div class="form-group">
                        <input type="text" id="balance_pasiva_code" name="balance_pasiva_code" class="form-control"
                            placeholder="Silahkan masukan Kode Pasiva">
                    </div>
                    <label>Nama Neraca Pasiva: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Pasiva" id="balance_pasiva_name"
                            name="balance_pasiva_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-balance-pasiva" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-balance-pasiva" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- MODAL DETAIL ACCOUNT --}}
<div class="modal fade text-left" id="modal-balance-detail-pasiva" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header px-1 py-1">
                <h4 class="modal-title" id="modal-title-account"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="card mb-0">
                <div class="card-body px-1 py-1 ">
                    <input type="hidden" id="submission_target" name="submission_target" value="">
                    <div id="show-data-account" class="">

                    </div>
                </div>
            </div>
            <div class="modal-footer py-1">
                <button type="button" id="add-balance-detail-pasiva" class="btn btn-success"
                    onclick="manageData('submission',null,'PASIVA')"><i class="bx bx-check mt"></i> Submit</button>
            </div>
        </div>
    </div>
</div>
