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
                            <h4 class="card-title" style="color: black"><b>PERAWATAN </b>| Bengkel Dalam | Notifikasi Perbaikan Komponen</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header" >
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h2 class="h4"> </h2>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href=" "
                                       class="btn btn-primary mr-1" data-toggle="modal" data-target="#TambahToko">
                                        <i class="bx bx-plus-circle"></i> Tambah Data</a>
                                    <a target="_blank"
                                       href=" "
                                       type="button"
                                       class="btn btn-danger text-white mr-1">
                                        <i class="bx bxs-file-pdf"></i> Report PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Provinsi/Kota:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button class="btn btn-outline-primary">Filter <i
                                            class="bx bx-filter"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <input type="hidden" id="Tablesemployee" value="">
                        <table class="table table-bordered table-hover" id="table-list-employees">
                            <thead>
                            <tr class="text-uppercase text-center">
                                <th class="w-2p">No</th>
                                <th class="w-2p">Armada</th>
                                <th class="w-10p">Tipe Armada</th>
                                <th class="w-10p">Tipe <br> Perjalanan</th>
                                <th class="w-10p">Keluhan</th>
                                <th class="w-10p">PIC Checker</th>
                                <th class="w-10p">Tanggal <br> Check</th>
                                <th class="w-10p">SVP Checker</th>
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
                                <td><a href=""  data-toggle="modal" data-target="#DetailBengkelDalam"><i class="bx bx-street-view btn btn-outline-primary"></i></a></td>
                                <td>asdas </td>
                                <td>asdas </td>
                                <td>adsfasfasfasffas </td>
                                <td>adsfasfasfasffas </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary"> Check Sekarang</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')
    <script>


        $(document).ready(function () {
            $("#table-employee").DataTable();
        });

    </script>

@endpush
