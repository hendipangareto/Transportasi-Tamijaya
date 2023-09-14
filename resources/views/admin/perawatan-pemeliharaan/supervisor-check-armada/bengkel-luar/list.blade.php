@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Perawatan Pemeliharaan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Notifikasi Perbaikan Komponen
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
            <div class="card shadow">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title" style="color: black"><b>PERAWATAN </b>| Bengkel Luar | Form Perbaikan Komponen</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-3">
                    <div class="table-responsive">
                        <input type="hidden" id="Tablesemployee" value="">
                        <table class="table table-bordered table-hover" id="table-list-employees">
                            <thead>
                            <tr class="text-uppercase text-center">
                                <th class="w-2p">No</th>
                                <th class="w-2p">Armada</th>
                                <th class="w-10p">Bagian</th>
                                <th class="w-10p">Keluhan</th>
                                <th class="w-10p">Nama Bengkel Luar</th>
                                <th class="w-10p">Tanggal Masuk</th>
                                <th class="w-10p">Estimasi Harga <br> (Rp.)</th>
                                <th class="w-10p">Estimasi Selesai <br> Waktu</th>
                                <th class="w-3p">Ajukan</th>
                                <th class="w-3p">Status</th>
                                <th class="w-3p">Action</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-employee">
                            <tr class="text-center">
                                <td>1</td>
                                <td>asdfasdfas </td>
                                <td>asdas </td>
                                <td>asdas </td>
                                <td>#</td>
                                <td>asdas </td>
                                <td>asdas </td>
                                <td>adsfasfasfasffas </td>
                                <td>adsfasfasfasffas </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">Diajukan</a>
                                </td>
                                <td><a href="" class="btn-outline-warning"> <i class="bx bx-edit"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header" >
                        <div class="toolbar row ">
                            <div class="col-md-12 d-flex">
                                <h2 class="h4"> </h2>
                                <div class="col ml-auto">
                                    <div class="dropdown float-right">

                                        <a target="_blank"
                                           href=" "
                                           type="button"
                                           class="btn btn-danger text-white mr-1">
                                            <i class="bx bxs-file-pdf"></i> Cetak SPJ
                                        </a>
                                        <a href=" "
                                           class="btn btn-success mr-1" data-toggle="modal" data-target="#TambahToko">
                                            <i class="bx bx-check-circle"></i> konfirmasi Keuangan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-dalam.modal')
    @include('admin.master-logistik.toko.modal-detail')
    @include('admin.master-logistik.toko.modal-edit')
@endsection

@push('page-scripts')
    <script>


        $(document).ready(function () {
            $("#table-employee").DataTable();
        });

    </script>

@endpush

