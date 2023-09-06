<div class="modal fade text-left" id="modal-position" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-position" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Jabatan: </label>
                    <div class="form-group">
                        <input type="text" readonly id="position_code" name="position_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Department: </label>
                    <div class="form-group">
                        <select name="" id="id_department" name="id_department"class="form-control">
                            <option value="">Silahkan Pilih Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Nama Jabatan: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama position" id="position_name"
                            name="position_name" class="form-control">
                    </div>
                    <label>Uraian Jabatan: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian position"
                            id="position_description" name="position_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-position" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-position" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
