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
    <div class="col-md-12 my-4">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-12 d-flex">
                        <h2 class="h4 mb-1">Detail Data Karyawan</h2>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                <a href="{{route('human-resource-master-employee-list-data')}}"
                                   class="btn btn-warning mr-1"><i
                                        class="fe fe-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kode Pegawai</label>
                            <input type="text" class="form-control"
                                   value="{{$employee->employee_id}}"
                                   readonly >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Pegawai</label>
                            <input type="text" value="{{$employee->employee_name}}"
                                   class="form-control bg-transparent" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Departemen</label>
                            <input type="text" value="{{$employee->department_name}}"
                                   class="form-control bg-transparent" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" value="{{$employee->position_name}}"
                                       class="form-control bg-transparent" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Status Pegawai</label>
                            <input type="text" class="form-control bg-transparent"
                                   value="{{$employee->employee_status}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Awal Kontrak</label>
                            <input type="date" class="form-control bg-transparent"
                                   value="{{$employee->awal_kontrak}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" class="form-control bg-transparent"
                                   value="{{$employee->jenis_kelamin}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control bg-transparent"
                                   value="{{$employee->tanggal_lahir}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Status Pernikahan</label>
                            <input type="text" class="form-control bg-transparent"
                                   value="{{$employee->status_perkawinan}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Selesai Kontrak</label>
                            <input type="date" class="form-control bg-transparent"
                                   value="{{$employee->selesai_kontak}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Alamat KTP</label>
                            <textarea class="form-control bg-transparent" readonly>{{$employee->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Alamat Domisili</label>
                            <label class="float-right" style="color: red">Sama dengan alamat KTP</label>
                            <textarea class="form-control bg-transparent"
                                      readonly>{{$employee->alamat_domisili}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nik</label>
                            <input type="text" class="form-control bg-transparent" value="{{$employee->nik}}"
                                   readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">NPWP</label>
                            <input type="text" class="form-control bg-transparent" value="{{$employee->npwp}}"
                                   readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">BPJS Kesehatan</label>
                            <input type="text" class="form-control bg-transparent"
                                   value="{{$employee->bpjs_kesehatan}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">BPJS Ketenagakerjaan</label>
                            <input type="text" class="form-control bg-transparent"
                                   value="{{$employee->bpjs_ketenagakerjaan}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">No Hp</label>
                            <input type="number" class="form-control bg-transparent" value="{{$employee->telepon}}"
                                   readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control bg-transparent" value="{{$employee->email}}"
                                   readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nama Rekening</label>
                            <input type="text" class="form-control bg-transparent"
                                   value="{{$employee->rekening_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">No Rekening</label>
                            <input type="number" class="form-control bg-transparent"
                                   value="{{$employee->no_rekening}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="toolbar row">
                    <div class="col-md-12 d-flex">
                        <h2 class="h4 mb-1">Detail Data Keluarga</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatables table-bordered table-hover table-data">
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
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($keluargaEmployee as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_keluarga}}</td>
                                <td>{{$item->status_keluarga}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->tanggal_lahir}}</td>
                                <td>{{$item->telepon}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->alamat_ktp}}</td>
                                <td>{{$item->alamat_domisili}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->npwp}}</td>
                                <td>{{$item->bpjs_kesehatan}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')

@endpush
