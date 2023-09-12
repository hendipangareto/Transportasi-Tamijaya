<div class="modal fade text-left" id="EditBengkel" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Edit Bengkel Luar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>ID Alat : </label>
                    <div class="form-group">
                        <input type="text" id="agent_code" name="akun_code"
                               class="form-control bg-transparent" placeholder="Id Komponen">
                    </div>
                    <label>PIC: </label>
                    <div class="form-group">
                        <input type="text" id="nama_akun" name="nama_akun"
                               class="form-control bg-transparent" placeholder="PIC">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>No Telepon: </label>
                                    <input type="text" id="departemen_id" name="departemen_id" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Departemen otomatis" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label>No HP : </label>
                                    <input type="text" id="departemen_id" name="departemen_id" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Departemen otomatis" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label  >Provinsi</label>
                                    <select name="employee_id" id="employee_select" class="form-control">

                                        <option selected disabled>Pilih Provinsi</option>
                                        <option value=" ">afasf </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label  >Kabupaten/Kota</label>
                                    <select name="employee_id" id="employee_select" class="form-control">
                                        <option selected disabled>Pilih Kabupaten/Kota</option>
                                        <option value=" ">afasf </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Alamat : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="agent_description"
                                  id="agent_description" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                    <label>Deskripsi : </label>
                    <div class="form-group">
                        <textarea class="form-control" name="agent_description"
                                  id="agent_description" cols="30"
                                  rows="3"
                                  placeholder="Silahkan masukan deskripsi agent">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit-agent" class="btn btn-success mr-1"><i
                            class="bx bx-save mt"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
