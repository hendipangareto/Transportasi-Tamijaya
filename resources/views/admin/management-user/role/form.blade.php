<div class="card" style="box-shadow: -8px 12px 18px 0 rgb(25 42 70 / 13%) !important">
    <div class="card-header">
        <h4 class="card-title">Form Data Peran</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="javascript:void(0)" id="form-role" class="form" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="role_code">Kode Peran</label>
                                <input type="text" id="role_code" class="form-control" name="role_code"
                                    placeholder="Silahkan masukan kode peran">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="role_name">Nama Peran</label>
                                <input type="text" id="role_name" class="form-control" name="role_name"
                                    placeholder="Silahkan masukan nama peran">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="role_description">Deskripsi Peran</label>
                                <input type="text" id="role_description" class="form-control" name="role_description"
                                    placeholder="Silahkan masukan deskripsi peran">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="role_level">Level</label>
                                <select name="role_level" id="role_level" class="form-control">
                                    <option value="">Silahkan masukan level peran</option>
                                    @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end" >
                            <button type="submit" style="display: none" onclick="manageData('save')" class="btn btn-success" id="add-role"><i class="bx bx-check"></i>Simpan</button>
                            <button type="submit" style="display: none" onclick="manageData('update')" class="btn btn-light-warning" id="edit-role"><i class="bx bx-edit"></i>Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
