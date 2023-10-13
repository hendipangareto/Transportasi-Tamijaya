<style>
    #table-schedule-pariwisata thead tr th {
        font-size: 11px !important;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #table-schedule-pariwisata tbody tr td {
        font-size: 11px !important;
    }

</style>


<div class="row">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Tipe Armada :</label>
            <select class="form-control" name="id_armada">
                <option disabled selected>Pilih Armada</option>
                @foreach($armadas as $dpt)
                    @php
                        $selected = ($params['id_armada'] == $dpt->id) ? "selected" : "";
                    @endphp
                    <option value="{{$dpt->id}}" {{$selected}}>
                        {{ $dpt->armada_merk }} - <b style="color: #83f602">{{ $dpt->armada_no_police }}</b> ({{ $dpt->armada_type }})
                    </option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Kota Keberangkatan :</label>
            <select class="form-control" name="id_pick_point">
                <option disabled selected>Kota Keberangkatan</option>
                @php
                    $usedPickPoints = [];
                @endphp
                @foreach($PickPoin as $kb)
                    @if (!in_array($kb->pick_point_origin, $usedPickPoints))
                        @php
                            $selectedKota = ($params['id_pick_point'] == $kb->pick_point_origin) ? "selected" : "";
                        @endphp
                        <option value="{{ $kb->pick_point_origin }}" {{ $selectedKota }}>
                            {{ $kb->pick_point_origin }}
                        </option>
                        @php
                            $usedPickPoints[] = $kb->pick_point_origin;
                        @endphp
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Nama Sopir</label>
            <select name="sopir_1" id="sopir_1" class="form-control form-control-sm">
                <option disabled selected>Silah Pilih Sopir</option>
                @foreach($employees as $employee)
                    @if($employee->id_department === 5)
                        <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control"
                    name="postionfilter">
                <option disabled selected>Status</option>

            </select>
        </div>
    </div>
</div>
<div class="row mt-2 mb-2">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" name="" id="">
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Kota Tujuan</label>
            <select name="id_destination_wisata" id="id_destination_wisata"
                    class="form-control form-control-sm">
                <option disabled selected>Kota Tujuan</option>
                @foreach($DestinasiWisata as $data)
                    <option value="{{ $data->id }}">{{ $data->destination_wisata_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Nama Kernet</label>

            <select name="id_employee" id="id_employee" class="form-control form-control-sm">
                <option value="">Silahkan Pilih Kernet</option>
                @foreach($employees as $employee)
                    @if(isset($employee->id) && isset($employee->id_department) && $employee->id_department === 6)
                        <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="" style="color: white">Filter</label><br>
            <button class="btn btn-primary">Filter <i
                    class="bx bx-filter"></i></button>
            <a href="{{ route('admin.transaction.pariwisata.schedule-pariwisata.data') }}"
               class="btn btn-warning">Clear <i
                    class="bx bx-reset"></i></a>
        </div>
    </div>
</div>
