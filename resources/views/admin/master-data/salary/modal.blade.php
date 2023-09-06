<div class="modal fade text-left" id="modal-salary" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form salary</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-salary" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode salary: </label>
                    <div class="form-group">
                        <input type="text" readonly id="salary_code" name="salary_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Nama salary: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama salary" id="salary_name" name="salary_name"
                            class="form-control">
                    </div>
                    <label>Nominal salary: </label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" id="salary_amount" name="salary_amount" class="form-control money"
                                placeholder="Silahkan masukan nominal salary">
                        </div>

                    </div>
                    <label>Uraian salary: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian salary"
                            id="salary_description" name="salary_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-salary" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-salary" class="btn btn-warning mr-1" onclick="manageData('update')"><i
                            class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
