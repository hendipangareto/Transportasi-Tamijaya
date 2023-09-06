<div class="modal fade text-left" id="modal-schedule" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-schedule" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode schedule: </label>
                    <div class="form-group">
                        <input type="text" readonly id="schedule_code" name="schedule_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Tipe Bus/Aramada: </label>
                    <div class="form-group">
                        <select name="schedule_bus" id="schedule_bus" class="form-control">
                            <option value="">--Pilih Jenis Bus/Armada</option>
                            <option value="SUITESS">SUITESS</option>
                            <option value="EXECUTIVE">EXECUTIVE</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jadwal Hari: </label>
                            <div class="form-group">
                                <select name="schedule_day" id="schedule_day" class="form-control">
                                    <option value="">--Pilih Hari</option>
                                    <option value="Mon">SENIN</option>
                                    <option value="Tue">SELASA</option>
                                    <option value="Wed">RABU</option>
                                    <option value="Thu">KAMIS</option>
                                    <option value="Fri">JUMAT</option>
                                    <option value="Sat">SABTU</option>
                                    <option value="Sun">MINGGU</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Destinasi : </label>
                            <div class="form-group">
                                <select name="schedule_destination" id="schedule_destination" class="form-control">
                                    <option value="">--Pilih Destinasi</option>
                                    <option value="JOG-DPS">JOG-DPS</option>
                                    <option value="DPS-JOG">DPS-JOG</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-schedule" class="btn btn-success mr-1" onclick="manageData('save')"><i
                            class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-schedule" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
