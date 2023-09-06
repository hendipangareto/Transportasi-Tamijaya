<div class="modal fade text-left" id="modal-tambah-keluarga" tabindex="-1" role="dialog"
     aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal-content-next-meeting">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title-meeting">Tambah Data Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form-tambah-karyawan" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Keluarga</label>
                                <input type="text" class="form-control" id="nama-anggota-keluarga"
                                       placeholder="Masukan nama keluarga">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="" id="jk-anggota-keluarga" class="form-control">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" id="tgl-lahir-anggota-keluarga" class="form-control"
                                       value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status Keluarga</label>
                                <select id="status_keluarga" class="form-control">
                                    <option value="" selected disabled>Pilih Status Keluarga</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Suami/Istri">Suami/Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Saudara Kandung">Saudara Kandung</option>
                                    <option value="Lain-lain">Lain-Lain</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Alamat KTP</label>
                                <textarea id="alamat-Ktp-keluarga" class="form-control"
                                          placeholder="Alamat sesuai KTP"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Alamat Domisili</label>
                                <label class="float-right" style="color: red">Sama dengan alamat KTP</label>
                                <textarea id="alamat-domisili-keluarga" class="form-control"
                                          placeholder="Alamat sesuai KTP"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nik</label>
                                <input id="nik-keluarga" type="number" class="form-control" placeholder="Masukan nik">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">NPWP</label>
                                <input id="npwp-keluarga" type="number" class="form-control" placeholder="Masukan NPWP">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">BPJS Kesehatan</label>
                                <input id="bpjs-kesehatan-keluarga" type="number" class="form-control"
                                       placeholder="Masukan no bpjs kesehatan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input id="no-telepon-keluarga" type="number" class="form-control"
                                       placeholder="Masukan no hp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input id="email-keluarga" type="email" class="form-control"
                                       placeholder="Masukan Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kontak Darurat</label>
                                <input id="kontak-darurat-keluarga" type="number" class="form-control"
                                       placeholder="Masukan no kontak darurat">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning mr-2" data-dismiss="modal"><i
                        class="fe fe-arrow-left"></i> Kembali
                </button>
                <button id="btn-simpan-anggota-keluarga" type="button" class="btn btn-success">Simpan <i
                        class="fe fe-check-circle"></i>
                </button>
            </div>
        </div>
    </div>
</div>


@foreach($keluargaEmployees as $item)
    <form action="{{route('human-resource-master-employee-form-update-keluarga', $item->id)}}" method="POST" id="form-update-keluarga-employee">
        @csrf
        <div class="modal fade text-left" id="modal-edit-keluarga-{{ $item->id }}" tabindex="-1" role="dialog"
             aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal-content-next-meeting">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-meeting">Form Edit Data Keluarga</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Keluarga</label>
                                    <input type="text" id="nama_keluarga_edit" name="nama_keluarga_edit"
                                           class="form-control"
                                           value="{{$item->nama_keluarga}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jk_keluarga_edit" id="jk_keluarga_edit"
                                            class="form-control">
                                        @php
                                            $l = "";
                                            $p = "";

                                            if ($item->jenis_kelamin == "L"){
                                                $l = "selected";
                                            }else {
                                                $p = "selected";
                                            }
                                        @endphp
                                        <option value="L" {{$l}}>L</option>
                                        <option value="P" {{$p}}>P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir_edit" name="tgl_lahir_edit"
                                           class="form-control"
                                           value="{{$item->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Status Keluarga</label>
                                    <select name="status_keluarga_edit" id="status_keluarga_edit"
                                            class="form-control">

                                        @php
                                            $ayah = "";
                                            $ibu = "";
                                            $suamiIstri = "";
                                            $anak = "";
                                            $saudaraKandung = "";
                                            $lainLain = "";

                                            if ($item->status_keluarga == "Ayah"){
                                                $ayah = "selected";
                                            }else if ($item->status_keluarga == "Ibu"){
                                                $ibu = "selected";
                                            }else if ($item->status_keluarga == "Suami/Istri"){
                                                $suamiIstri = "selected";
                                            }else if ($item->status_keluarga == "Anak"){
                                                $anak = "selected";
                                            }else if ($item->status_keluarga == "Saudara Kandung"){
                                                $saudaraKandung = "selected";
                                            }else {
                                                $lainLain = "selected";
                                            }
                                        @endphp
                                        <option value="Ayah" {{$ayah}}>Ayah</option>
                                        <option value="Ibu" {{$ibu}}>Ibu</option>
                                        <option value="Suami/Istri" {{$suamiIstri}}>Suami/Istri</option>
                                        <option value="Anak"{{$anak}}>Anak</option>
                                        <option value="Saudara Kandung"{{$saudaraKandung}}>Saudara Kandung</option>
                                        <option value="Lain-Lain"{{$lainLain}}>Lain-Lain</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Alamat KTP</label>
                                    <textarea id="ktp_kelaurga_edit" name="ktp_kelaurga_edit"
                                              class="form-control"
                                    >{{$item->alamat_ktp}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Alamat Domisili</label>
                                    <label class="float-right" style="color: red">Sama dengan alamat KTP</label>
                                    <textarea id="alamat_domisili_edit" name="alamat_domisili_edit"
                                              class="form-control"
                                    >{{$item->alamat_domisili}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nik</label>
                                    <input type="number" id="nik_keluarga_edit" name="nik_keluarga_edit"
                                           class="form-control " value="{{$item->nik}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NPWP</label>
                                    <input type="number" id="npwp_keluarga_edit" name="npwp_keluarga_edit"
                                           class="form-control" value="{{$item->npwp}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">BPJS Kesehatan</label>
                                    <input type="number" id="bpjs_kesehatan_keluarga_edit"
                                           name="bpjs_kesehatan_keluarga_edit"
                                           class="form-control"
                                           value="{{$item->bpjs_kesehatan}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">No Hp</label>
                                    <input type="number" id="hp_keluarga_edit" name="hp_keluarga_edit"
                                           class="form-control"
                                           value="{{$item->telepon}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" id="email_keluarga_edit" name="email_keluarga_edit"
                                           class="form-control" value="{{$item->email}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak Darurat</label>
                                    <input type="number" id="kontak_darurat_keluarga_edit"
                                           name="kontak_darurat_keluarga_edit"
                                           class="form-control"
                                           value="{{$item->kontak_darurat}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <input type="hidden" id="id_keluarga_employees" name="id_keluarga_employees" value="{{$item->id}}">
                            <button type="submit" class="btn btn-warning"><i class="fe fe-edit"></i> Update Keluarga
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
