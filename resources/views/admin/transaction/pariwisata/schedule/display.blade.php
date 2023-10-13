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
            <select class="form-control"
                    name="departemen_id">
                <option disabled selected>Pilih Tipe Armada</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Kota Keberangkatan :</label>
            <select class="form-control">
                <option disabled selected>Kota Keberangkatan</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Nama Sopir</label>
            <select class="form-control"
                    name="postionfilter">
                <option disabled selected>Nama Sopir</option>

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
            <select class="form-control">
                <option disabled selected>Kota Tujuan</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label for="">Nama Kernet</label>
            <select class="form-control"
                    name="postionfilter">
                <option disabled selected>Nama Kernet</option>

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
