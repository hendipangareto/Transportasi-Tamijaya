
<div class="toolbar row">
    <div class="col-md-12 d-flex">
        <h2 class="h4 "></h2>
        <div class="col ml-auto">
            <div class="dropdown float-right">
{{--                <a href="{{ route('human-resource.pegawai.request-gaji.form-tambah') }}"--}}
{{--                   class="btn btn-primary mr-1">--}}
{{--                    <i class="bx bx-plus-circle"></i> Tambah Data</a>--}}
                <a target="_blank"
                   href=""
                   type="button"
                   class="btn btn-danger text-white mr-1">
                    <i class="bx bx-printer"></i> Report PDF
                </a>
            </div>
        </div>
    </div>
</div>

<form action="">
    @csrf

    <div class="row  ">
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="form-group">
                <label for="" style="color: white">Filter</label><br>
                <button class="btn btn-primary">Filter <i
                        class="bx bx-filter fe-12"></i></button>
                <a href=" " class="btn btn-warning">Clear <i
                        class="bx bx-street-view fe-12"></i></a>
            </div>
        </div>
    </div>
</form>

<br>
<div class="table-responsive">
    <input type="hidden" id="Tablesemployee" value=" ">
    <table class="table table-bordered table-hover" id="table-list-employees">
        <thead>
        <tr class="text-uppercase text-center">
            <th class="w-3p">No</th>
            <th class="w-10p">Nama Karyawan</th>
            <th class="w-10p">Departemen</th>
            <th class="w-10p">Jabatan</th>
            <th class="w-10p">Tanggal</th>
            <th class="w-10p">Prestasi Kerja</th>
            <th class="w-10p">Keterangan</th>
            <th class="w-3p">Aksi</th>
        </tr>
        </thead>
        <tbody id="show-data-employee">
        <tr class="text-center">
            <td>1</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                        data-target="# "><i
                        class="bx bx-info-circle font-size-base"></i></button>
            </td>
        </tr>
        </tbody>
    </table>
</div>

