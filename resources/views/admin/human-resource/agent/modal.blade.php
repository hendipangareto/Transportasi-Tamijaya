<div class="modal fade text-left" id="TambahAgent" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Tambah Agent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="{{ route('human-resource-data-agent-store') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="agent_code" id="agent_code">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Agent</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="agent_name" name="agent_name"
                                           placeholder="Silahkan masukan nama agent"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Provinsi</label>
                                <div class="col-sm-9">
                                    <select onchange="changeProvince()" id="id_province" name="id_province"
                                            class="form-control">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Kota</label>
                                <div class="col-sm-9">
                                    <select name="id_city" id="id_city" class="form-control">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="agent_tlp" name="agent_tlp"
                                           placeholder="Masukan no telepon"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">No. HP</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="agent_hp" name="agent_hp"
                                           placeholder="Masukan no hp"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="agent_email" name="agent_email"
                                           placeholder="Masukan email"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea id="agent_alamat" name="agent_alamat" class="form-control"
                                              placeholder="Silahkan masukan alamat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea id="agent_description" name="agent_description" class="form-control"
                                              placeholder="Silahkan masukan deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="edit-agent" class="btn btn-success"><i
                            class="bx bx-check-circle"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--DETAIL AGENT--}}
<div class="modal fade text-left" id="modal-detail-agent" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Detail Agent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-detail-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Agent: </label>
                            <div class="form-group">
                                <input type="text" readonly id="detail-agent_name" name="detail-agent_name"
                                       class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Domisili: </label>
                            <div class="form-group">
                                <input type="text" readonly id="detail-agent_domicile" name="detail-agent_domicile"
                                       class="form-control bg-transparent">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-outline-primary"><i class="bx bx-user-check"></i> Manage
                                Akun Agent
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Username: </label>
                            <div class="form-group">
                                <input type="text" id="username_agent" name="username_agent"
                                       class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Password: </label>
                            <div class="form-group position-relative">
                                <input type="password" class="form-control">
                                <div class="form-control-position">
                                    <i class="bx
                                    bx-show-alt pointer"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Confirmation Password: </label>
                            <div class="form-group position-relative">
                                <input type="password" class="form-control">
                                <div class="form-control-position">
                                    <i class="bx
                                    bx-show-alt pointer"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" id="add-agent"
                                    class="btn btn-block btn-success mr-1" onclick="manageData('save')"><i
                                    class="bx bxs-save"></i> Create Account
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="add-agent"
                                    class="btn btn-block btn-warning mr-1" onclick="manageData('save')"><i
                                    class="bx bx-edit-alt"></i> Update Account
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
