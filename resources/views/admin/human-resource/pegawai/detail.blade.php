@foreach($data as $item)
    <div class="modal fade text-left" id="DetailGaji-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class="pb-2 text-center">Detail Data Gaji Pegawai</h5>
                    <div class="card">
                        <div class="table">
                            ==================================================
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Departemen</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->department_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Jabatan</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->position_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Nama Pegawai</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->employee_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Status Pegawai</h6>
                                        <div class="col-sm-7">
                                            : {{ $item->employee_status }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Gaji Pegawai</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->g_pokok }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tunjangan Masa Kerja</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->t_masa_kerja }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tunjangan Transport</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->t_transport }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tunjangan Kapasitas</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->t_transport }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tunjangan Akademik</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->t_akademik }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">Tunjangan Struktur</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->t_struktur }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">BPJS Kesehatan</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->bpjs_kesehatan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <h6 class="col-sm-5">BPJS Ketenagakerjaan</h6>
                                        <div class="col-sm-7">
                                            : Rp.{{ $item->bpjs_ketenagakerjaan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ==================================================
                        </div>
                        <div class="row ml-1 justify-content-lg-end">
                            <button type="button"   class="btn btn-secondary mr-1"  data-dismiss="modal" > Kembali ➡
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
