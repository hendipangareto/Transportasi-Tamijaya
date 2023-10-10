<div class="modal fade text-left" id="modal-master-employee" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Karayawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-master-employee" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Jabatan: </label>
                    <div class="form-group">
                        <input type="text" readonly id="employee_id" name="employee_id"
                            class="form-control bg-transparent">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Department: </label>
                            <div class="form-group">
                                <select onchange="changeDeparment()" id="id_department" name="id_department" class="form-control">
                                    <option value="">Silahkan Pilih Department</option>
                                    @foreach ($deparments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Jabatan: </label>
                            <div class="form-group">
                                <select id="id_position" name="id_position" class="form-control">
                                    <option value="">Silahkan Pilih Jabatan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <label>Nama Jabatan: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Karyawan" id="employee_name"
                            name="employee_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-master-employee" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-master-employee" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
