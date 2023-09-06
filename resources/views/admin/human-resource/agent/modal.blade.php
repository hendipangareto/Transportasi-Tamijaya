<div class="modal fade text-left" id="modal-agent" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Agent</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-agent" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Agent: </label>
                    <div class="form-group">
                        <input type="text" readonly id="agent_code" name="agent_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Domisili: </label>
                    <div class="form-group">
                        <select name="agent_domicile" id="agent_domicile" class="form-control">
                            <option value="">--Pilih Domisili Agen--</option>
                            <option value="JOGJAKARTA">JOGJAKARTA</option>
                            <option value="KLATEN">KLATEN</option>
                            <option value="SOLO">SOLO</option>
                            <option value="JAKARTA">JAKARTA</option>
                            <option value="DENPASAR">DENPASAR</option>
                        </select>
                    </div>
                    <label>Nama Agent: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Agent" id="agent_name" name="agent_name"
                            class="form-control">
                    </div>
                    <label>Deskripsi Agent: </label>
                    <div class="form-group">
                        <textarea class="form-control" name="agent_description" id="agent_description" cols="30"
                            rows="3" placeholder="Silahkan masukan deskripsi agent"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-agent" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check"></i> Submit</button>
                    <button type="submit" id="edit-agent" class="btn btn-warning mr-1" onclick="manageData('update')"><i
                            class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                                Akun Agent</button>
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
                        <div class="col-md-6"><button type="submit" id="add-agent"
                                class="btn btn-block btn-success mr-1" onclick="manageData('save')"><i
                                    class="bx bxs-save"></i> Create Account</button>
                        </div>
                        <div class="col-md-6"><button type="submit" id="add-agent"
                                class="btn btn-block btn-warning mr-1" onclick="manageData('save')"><i
                                    class="bx bx-edit-alt"></i> Update Account</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
