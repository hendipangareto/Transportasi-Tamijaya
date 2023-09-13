@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Perawatan & Pemeliharaan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-bus"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Supervisor Cuci Mobil
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>PEMELIHARAAN </b>| Notifikasi Approval Cuci Armada</h4>
                </div>
                <div class="card-content mt-3">
                    <div class="card-body card-dashboard">
                        <form action="" method="">
                            <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-2p">No</th>
                                        <th class="w-3p">Armada</th>
                                        <th class="w-10p">Tipe Armada</th>
                                        <th class="w-10p">Tipe Perjalanan</th>
                                        <th class="w-10p">Keluahan</th>
                                        <th class="w-10p">PIC Cuci</th>
                                        <th class="w-10p">Tanggal Cuci</th>
                                        <th class="w-10p">Status Cuci</th>
                                        <th class="w-10p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><a href="" data-toggle="modal" data-target="#DetailNotifikasi"><i class="bx bx-street-view"></i></a></td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td><a href="{{ route('perawatan-pemeliharaan.petugas-cuci.list-form-cuci') }}" class="btn btn-primary">Cuci Sekarang</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header  pb-0  d-flex justify-content-between">
                                <h4 class="card-title"></h4>
                                <button type="submit" class="btn btn-danger mr-1"><i class="bx bx-printer"></i> Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.perawatan-pemeliharaan.sopir.modal-tambah')
    @include('admin.master-logistik.bagian.modal-edit')
    @include('admin.master-logistik.bagian.modal-detail')
@endsection
