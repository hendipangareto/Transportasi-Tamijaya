<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> - Absensi</label>
                    <div class="col-md-1">
                        <input class="form-control" type="text" readonly/>
                    </div>
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> Jam</label>

                    <label for="html5-url-input"
                           class="col-md-2 col-form-label"> X </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text"/>
                    </div>
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> - Terlambat</label>
                    <div class="col-md-1">
                        <input class="form-control" type="text" readonly/>
                    </div>
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> Jam</label>

                    <label for="html5-url-input"
                           class="col-md-2 col-form-label"> X </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text"/>
                    </div>
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> - Pulang
                        Awal</label>
                    <div class="col-md-1">
                        <input class="form-control" type="text" readonly/>
                    </div>
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> Jam</label>

                    <label for="html5-url-input"
                           class="col-md-2 col-form-label"> X </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text"/>
                    </div>
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-9 col-form-label"> - Kasbon</label>
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
            </div>
            <hr>
            <h5><b>TAMBAHAN</b></h5>
            <hr>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> - Lembur</label>
                    <div class="col-md-1">
                        <input class="form-control" type="text" readonly/>
                    </div>
                    <label for="html5-email-input"
                           class="col-md-2 col-form-label"> Jam</label>

                    <label for="html5-url-input"
                           class="col-md-2 col-form-label"> X </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text"/>
                    </div>
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
                <div class="  row">
                    <label for="html5-email-input"
                           class="col-md-9 col-form-label"> -
                        Bonus/Insentive</label>
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <h4 class="col-md-9">TOTAL DITERIMA</h4>
                    {{--                                                            <label for="html5-email-input" class="col-md-9 col-form-label"> - Bonus/Insentive</label>--}}
                    <label for="html5-url-input"
                           class="col-md-1 col-form-label"> = </label>
                    <div class="col-md-2">
                        <input class="form-control" type="text" readonly/>
                    </div>
                </div>
            </div>
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

    </div>
</div>
