<style>
    .modal-lg {
        max-width: 60% !important;
    }
</style>
<form action="{{route('data-gaji-pegawai.human-resource-pegawai-form-simpan')}}" id="form-tambah-daftar-gaji"
      enctype="multipart/form-data" method="post">
    @csrf
    <div class="modal fade text-left" id="modal-tambah-daftar-gaji-pegawai" tabindex="-1" role="dialog"
         aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Tambah Daftar Gaji Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fe fe-x"></i>
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <select name="employee_id" id="employee_select" class="form-control">
                                        <option selected disabled>Pilih nama pegawai</option>
                                        @foreach($employee as $item)
                                            <option value="{{$item->id}}">{{$item->employee_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status Pegawai</label>
                                <div class="col-sm-8">
                                    <input type="text" id="employee_status" name="employee_status" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Status otomatis" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Departemen</label>
                                <div class="col-sm-8">
                                    <input type="text" id="departemen_id" name="departemen_id" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Departemen otomatis" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <input type="text" id="position_id" name="position_id" class="form-control"
                                           style="font-style: italic"
                                           placeholder="Jabatan otomatis" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gaji Pokok</label>
                                <div class="col-sm-8">
                                    <input type="number" id="g_pokok" name="g_pokok" class="form-control" value="0"
                                           placeholder="Masukan gaji pokok">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tunjangan Masa Kerja</label>
                                <div class="col-sm-8">
                                    <input type="number" id="t_masa_kerja" name="t_masa_kerja" class="form-control"
                                           value="0" placeholder="Masukan tunjangan masa kerja">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tunjangan Transport</label>
                                <div class="col-sm-8">
                                    <input type="number" id="t_transport" name="t_transport" class="form-control"
                                           value="0" placeholder="Masukan tunjangan transport">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tunjangan Kapasitas</label>
                                <div class="col-sm-8">
                                    <input type="number" id="t_kapasitas" name="t_kapasitas" class="form-control"
                                           value="0" placeholder="Masukan tunjangan kapasitas">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tunjangan Akademik</label>
                                <div class="col-sm-8">
                                    <input type="number" id="t_akademik" name="t_akademik" class="form-control"
                                           value="0" placeholder="Masukan tunjangan akademik">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tunjangan Struktur</label>
                                <div class="col-sm-8">
                                    <input type="number" id="t_struktur" name="t_struktur" class="form-control"
                                           value="0" placeholder="Masukan tunjangan akademik">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">BPJS Kesehatan</label>
                                <div class="col-sm-8">
                                    <input type="number" id="bpjs_kesehatan" name="bpjs_kesehatan" class="form-control"
                                           placeholder="Masukan bpjs kesehatan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">BPJS Ketenagakerjaan</label>
                                <div class="col-sm-8">
                                    <input type="number" id="bpjs_ketenagakerjaan" name="bpjs_ketenagakerjaan"
                                           class="form-control" placeholder="Masukan bpjs kesehatan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" id="tanggal_gaji" name="tanggal_gaji"
                                           class="form-control" value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" id="keterangan" name="keterangan"
                                           class="form-control" placeholder="Masukan keterangan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-warning"  >
                                    <i class="bx bx-arrow-back"></i> Kembali
                                </button>
                                <button class="btn btn-success" id="btn-simpan-add-gaji-employee">
                                    <i class="bx bx-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




