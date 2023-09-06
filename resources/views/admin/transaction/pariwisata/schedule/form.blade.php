<form action="javascript:void(0)" id="form-schedule-reguler" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id" name="id" value="">
    <div class="row">
        <div class="col-md-3">
            <label>Tanggal Mulai: </label>
            <div class="form-group">
                <input type="date" id="start_date" name="start_date" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-md-3">
            <label>Tanggal Selesai: </label>
            <div class="form-group">
                <input type="date" id="end_date" name="end_date" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-md-3">
            <label>Jenis Bus: </label>
            <div class="form-group">
                {{-- multiple="multiple" --}}
                <select name="type_bus" id="type_bus" class="form-control form-control-sm">
                    <option value="">Pilih Jenis</option>
                    <option value="SUITESS">SUITESS</option>
                    <option value="EXECUTIVE">EXECUTIVE</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-between mt-2 float-right mr-2">
                <button class="btn btn-primary btn-sm" type="button" onclick="generateSchedule()"><i
                        class="bx bx-plus"></i>GENERATE</button>
            </div>
        </div>
    </div>

    <style>
        #table-input-schedule-reguler thead tr th {
            font-size: 11px !important;
            padding-top: 10px;
            padding-bottom: 10px;
        }

    </style>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="table-input-schedule-reguler">
                <thead>
                    <tr>
                        <th class="w-12p">Berangkat</th>
                        <th class="w-12p">Pulang</th>
                        <th class="w-15p">Jenis</th>
                        <th class="w-18p">Armada Bus</th>
                        <th>Sopir 1</th>
                        <th>Sopir 2</th>
                        <th>Kernet</th>
                    </tr>
                </thead>
                <tbody id="input-body-schedule-reguler">
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-block" type="submit" onclick="manageData('save')"><i
                    class="bx bx-check"></i> Submit</button>
        </div>
    </div>
</form>
