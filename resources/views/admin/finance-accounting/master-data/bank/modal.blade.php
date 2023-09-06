<div class="modal fade text-left" id="modal-bank" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-bank" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Bank: </label>
                    <div class="form-group">
                        <input type="text" id="bank_code" name="bank_code"
                            class="form-control bg-transparent" readonly placeholder="Silahkan masukan Bank" >
                    </div>
                    <label>Nama Bank: </label>
                    <div class="form-group">
                        <select name="bank_name" id="bank_name" class="form-control">
                            <option value="">Silahkan pilih Bank</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="BCA">BCA</option>
                            <option value="PERMATA">PERMATA</option>
                        </select>
                    </div>
                    <label>Nama Pemilik Rekening: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan Pemilik Rekening" id="bank_holder"
                            name="bank_holder" class="form-control">
                    </div>
                    <label>Nomor Rekening Bank: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan Nomor Rekening" id="bank_account"
                            name="bank_account" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-bank" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-bank" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
