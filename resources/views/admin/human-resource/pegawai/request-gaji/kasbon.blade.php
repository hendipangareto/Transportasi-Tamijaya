<form action="{{ route('human-resource.human-resource.pegawai.request-kasbon-karyawan') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="row  ">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="html5-text-input"
                           class="col-md-3 col-form-label">Bulan / Tahun</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date"
                               name="tanggal" id="tanggal"/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input"
                           class="col-md-3 col-form-label">Nama Pegawai</label>
                    <div class="col-md-9">
                        <select name="employee_id" id="employee_select" class="form-control">
                            <option selected disabled>Pilih nama pegawai</option>
                            @foreach($employee as $item)
                                <option value="{{$item->id}}">{{$item->employee_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-3 col-form-label">Departemen</label>
                    <div class="col-md-9">
                        <input type="text" id="departemen_id" name="departemen_id" class="form-control"
                               style="font-style: italic"
                               placeholder="Departemen otomatis" readonly>
                    </div>
                </div>
                <div class="row">
                    <label for="html5-url-input"
                           class="col-md-3 col-form-label">Jabatan</label>
                    <div class="col-md-9">
                        <input type="text" id="position_id" name="position_id" class="form-control"
                               style="font-style: italic"
                               placeholder="Jabatan otomatis" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="html5-text-input"
                           class="col-md-3 col-form-label">. </label>
                    <div class="col-md-9">

                    </div>
                </div>
                <div class="mb-3 mt5 row">
                    <label for="html5-search-input"
                           class="col-md-3 col-form-label">Kode Pegawai</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="kode_employee" id="kode_employee" readonly/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-3 col-form-label">Status
                        Pegawai</label>
                    <div class="col-md-9">
                        <input type="text" id="employee_status" name="employee_status" class="form-control"
                               style="font-style: italic"
                               placeholder="Status otomatis" readonly>
                    </div>
                </div>
                <div class="row">
                    <label for="html5-url-input"
                           class="col-md-3 col-form-label">.</label>
                    <div class="col-md-9">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<h5><b>PENGAJUAN KASBON</b></h5>
<hr>
<div class="row  ">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="html5-text-input"
                           class="col-md-3 col-form-label">Nominal</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="nominal"/>
                    </div>
                </div>
                <div class="row">
                    <label for="html5-search-input"
                           class="col-md-3 col-form-label">Keterangan</label>
                    <div class="col-md-9">
                                                                <textarea class="form-control"
                                                                          name="keterangan_kasbon"
                                                                          id="keterangan_kasbon" cols="50"
                                                                          rows="3">
                                                                </textarea>
                    </div>
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col ml-auto">
        <div class="dropdown float-right mb-3">
            <a href="{{ route('human-resource.pegawai.request-gaji.list-gaji') }}"
               class="btn btn-warning mr-1"><i
                    class="fe fe-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success">Simpan <i
                    class="bx bx-save"></i>
            </button>
        </div>
    </div>
</div>
</form>
