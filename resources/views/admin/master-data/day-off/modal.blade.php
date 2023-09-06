<div class="modal fade text-left" id="modal-day-off" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Hari Libur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-day-off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Kode Hari Libur: </label>
                    <div class="form-group">
                        <input type="text" readonly id="day_off_code" name="day_off_code"
                            class="form-control bg-transparent">
                    </div>
                    <label>Nama Hari Libur: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Hari Libur" id="day_off_name"
                            name="day_off_name" class="form-control">
                    </div>
                    <label>Tanggal Hari Libur: </label>
                    <div class="form-group">
                        <input type="date" id="day_off_date"
                            name="day_off_date" class="form-control">
                    </div>
                    <label>Uraian Hari Libur: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Hari Libur"
                            id="day_off_description" name="day_off_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-day-off" class="btn btn-success mr-1"
                        onclick="manageData('save')"><i class="bx bx-check mt"></i> Submit</button>
                    <button type="submit" id="edit-day-off" class="btn btn-warning mr-1"
                        onclick="manageData('update')"><i class="bx bx-pencil mt"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
