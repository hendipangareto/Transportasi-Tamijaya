<div class="modal fade text-left" id="modal-group-account" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Group Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-group-account" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kode Group Account: </label>
                            <div class="form-group">
                                <input type="text" id="group_account_code" name="group_account_code"
                                    class="form-control" placeholder="Silahkan masukan Kode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Group Account: </label>
                            <div class="form-group">
                                <select id="group_account_type" name="group_account_type" class="form-control">
                                    <option value="">--Silahkan Pilih Jenis--</option>
                                    <option value="DEBIT">DEBIT</option>
                                    <option value="KREDIT">KREDIT</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <label>Nama Group Account: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Group Account" id="group_account_name"
                            name="group_account_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-group-account" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-group-account" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- MODAL DETAIL ACCOUNT --}}
<div class="modal fade text-left" id="modal-list-group-account" tabindex="-1" role="dialog"
    aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header px-1 py-1">
                <h4 class="modal-title" id="modal-title-account">Data Group Account : <span id="title-group-account"></span> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body px-2">
                <div class="row" id="display-detail-account">

                </div>
            </div>

            <div class="modal-footer py-1">
                <button type="button" id="add-list-account" class="btn btn-success"
                    onclick="manageData('submission', null, 'AKTIVA')"><i class="bx bx-check mt"></i> Submit</button>
            </div>
        </div>
    </div>
</div>
