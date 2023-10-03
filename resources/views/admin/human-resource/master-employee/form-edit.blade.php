@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">

                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Data Master Karyawan
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('human-resource-master-employee-form-update', $employee->id) }}" method="post"
          id="form-edit-karyawan">
        @csrf
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-header">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4 mb-1">Edit Data Karyawan</h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('human-resource-master-employee-list-data')}}"
                                       class="btn btn-warning mr-1"><i
                                            class="fe fe-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-success">Simpan <i
                                            class="fe fe-check-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ID Pegawai</label>
                                <input type="text" id="edit_id_pegawai" name="edit_id_pegawai" class="form-control"
                                       value="{{$employee->employee_id}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Pegawai</label>
                                <input type="text" id="edit_nama_pegawai" name="edit_nama_pegawai" class="form-control"
                                       value="{{$employee->employee_name}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fingerprint Pegawai :</label>
                                <input type="number" class="form-control" name="id_fingerprint" value="{{ $employee->id_fingerprint }}" style="font-style: italic"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Departemen</label>
                                <select class="form-control" id="edit_departemen" name="edit_departemen">
                                    @foreach($departemen as $item)
                                        @php
                                            $selected = ($employee->departemen_id == $item->id) ? "selected" : "";
                                        @endphp

                                        <option value="{{$item->id}}" {{$selected}}>{{$item->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select name="edit_jabatan" id="edit_jabatan" class="form-control">
                                    @foreach($jabatan as $item)
                                        @php
                                            $selected = ($employee->position_id == $item->id) ? "selected" : "";
                                        @endphp

                                        <option value="{{$item->id}}" {{$selected}}>{{$item->position_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status Pegawai</label>
                                <select name="edit_status_pegawai_id" id="edit_status_pegawai_id"
                                        class="form-control">

                                    @php
                                        $tetap = "";
                                        $kontrak = "";
                                        $partTime = "";

                                        if ($employee->employee_status == "Tetap"){
                                            $tetap = "selected";
                                        }else if ($employee->employee_status == "Kontrak"){
                                            $kontrak = "selected";
                                        }else {
                                            $partTime = "selected";
                                        }

                                    @endphp

                                    <option value="Tetap" {{$tetap}}>Tetap</option>
                                    <option value="Kontrak" {{$kontrak}}>Kontrak</option>
                                    <option value="Part Time" {{$partTime}}>Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Awal Kontrak</label>
                                <input type="date" id="edit_tgl_awal_kontrak" name="edit_tgl_awal_kontrak"
                                       class="form-control" value="{{ $employee->awal_kontrak }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="edit_jk_pegawai_id" id="edit_jk_pegawai_id" class="form-control">

                                    @php
                                        $l = "";
                                        $p = "";

                                        if ($employee->jenis_kelamin == "L"){
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" id="edit_tgl_lahir_id" name="edit_tgl_lahir_id" class="form-control"
                                       value="{{ $employee->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status Pernikahan</label>

                                <select class="form-control" id="edit_status_nikah" name="edit_status_nikah">

                                    @php
                                        $belumKawin = "";
                                        $kawin = "";
                                        $ceraiHidup = "";
                                        $ceraiMti = "";

                                        if($employee->status_perkawinan == "Belum Kawin"){
                                            $belumKawin = "selected";
                                        }else if($employee->status_perkawinan == "Kawin"){
                                            $kawin = "selected";
                                        }else if($employee->status_perkawinan == "Cerai Hidup"){
                                            $ceraiHidup = "selected";
                                        }else{
                                            $ceraiMti = "selected";
                                        }

                                    @endphp

                                    <option value="Belum Kawin" {{$belumKawin}}>Belum Kawin</option>
                                    <option value="Kawin" {{$kawin}}>Kawin</option>
                                    <option value="Cerai Hidup" {{$ceraiHidup}}>Cerai Hidup</option>
                                    <option value="Cerai Mati" {{$ceraiMti}}>Cerai Mati</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Selesai Kontrak</label>
                                <input type="date" id="selesai_kontak_pegawai" name="selesai_kontak_pegawai"
                                       class="form-control" value="{{ $employee->selesai_kontrak }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat KTP</label>
                                <textarea class="form-control"
                                          id="edit_alamat_pegawai"
                                          name="edit_alamat_pegawai">{{$employee->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Alamat Domisili</label>
                                <label class="float-right" style="color: red">Sama dengan alamat KTP</label>
                                <textarea class="form-control"
                                          id="edit_domisili_pegawai"
                                          name="edit_domisili_pegawai">{{$employee->alamat_domisili}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nik</label>
                                <input type="text" id="edit_nik_pegawai" name="edit_nik_pegawai" class="form-control"
                                       value="{{$employee->nik}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">NPWP</label>
                                <input type="text" id="edit_npwp_pegawai" name="edit_npwp_pegawai" class="form-control"
                                       value="{{$employee->npwp}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">BPJS Kesehatan</label>
                                <input type="text" id="edit_bpjs_kesehatan_pegawai" name="edit_bpjs_kesehatan_pegawai"
                                       class="form-control" value="{{$employee->bpjs_kesehatan}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">BPJS Ketenagakerjaan</label>
                                <input type="text" id="edit_bpjs_ketenagakerjaan" name="edit_bpjs_ketenagakerjaan"
                                       class="form-control" value="{{$employee->bpjs_ketenagakerjaan}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input type="number" id="edit_hp_pegawai" name="edit_hp_pegawai" class="form-control"
                                       value="{{$employee->telepon}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" id="edit_email_pegawai" name="edit_email_pegawai"
                                       class="form-control" value="{{$employee->email}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Naman Rekening</label>
                                <input type="text" id="edit_nama_rekening" name="edit_nama_rekening"
                                       class="form-control" value="{{$employee->rekening_name}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No Rekening</label>
                                <input type="number" id="edit_rekening_pegawai" name="edit_rekening_pegawai"
                                       class="form-control" value="{{$employee->no_rekening}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h5>DETAIL DATA KELUARGA KARYAWAN</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatables table-bordered table-hover table-data"
                               id="table-detail-data-keluarga-employee">
                            <thead>
                            <tr class="text-uppercase">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>ALamat KTP</th>
                                <th>Alamat Domisili</th>
                                <th>Nik</th>
                                <th>NPWP</th>
                                <th>BPJS Kesehatan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-keluarga-employee">
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($keluargaEmployees as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_keluarga}}</td>
                                    <td>{{$item->status_keluarga}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>{{$item->tanggal_lahir}}</td>
                                    <td>{{$item->telepon}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->alamat_ktp}}</td>
                                    <td>{{$item->alamat_domisili}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td>{{$item->npwp}}</td>
                                    <td>{{$item->bpjs_kesehatan}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                                data-target="#modal-edit-keluarga-{{ $item->id }}"><i
                                                class="bx bx-pencil font-size-base"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center">Data keluarga tidak ditemukan</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('admin.human-resource.master-employee.tambah-keluarga')
@endsection

@push('page-scripts')
    <script>
        {{--$("#btn-update-data-keluarga").click(function () {--}}

        {{--    $("#edit-nama-keluarga").val();--}}
        {{--    $("#edit-jk-keluarga").val();--}}
        {{--    $("#edit-tgl-lahir").val();--}}
        {{--    $("#edit-status-keluarga").val();--}}
        {{--    $("#edit-alamat-ktp").val();--}}
        {{--    $("#edit-alamat-domisili").val();--}}
        {{--    $("#edit-nik").val();--}}
        {{--    $("#edit-npwp").val();--}}
        {{--    $("#edit-bpjs-kesehatan").val();--}}
        {{--    $("#edit-hp").val();--}}
        {{--    $("#edit-email").val();--}}
        {{--    $("#edit-kontak-darurat").val();--}}

        {{--    $("#show-data-keluarga-employee").show();--}}
        {{--    $("#modal-edit-keluarga-{{ $item->id }}").modal('hide');--}}
        {{--});--}}
    </script>

@endpush
