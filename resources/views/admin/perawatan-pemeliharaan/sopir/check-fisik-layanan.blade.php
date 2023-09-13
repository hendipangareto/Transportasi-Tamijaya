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
                        <li class="breadcrumb-item active">Sopir
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
                    <h4 class="card-title" style="color: black"><b>PEMELIHARAAN </b>| Form Laporan Perjalanan</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <div class="row">
                        <div class="col-md-7 mt-3">
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="formValidationName">Armada :</label>
                                            <select name="employee_id" id="employee_select" class="form-control">
                                                <option selected disabled class="text-center">--Pilih Armada--</option>
                                                <option value=" ">jkljlk </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="formValidationEmail">Titik Keberangkatan :</label>
                                            <input class="form-control" type="email" id="formValidationEmail"
                                                   name="formValidationEmail" readonly/>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="formValidationEmail">Tipe Armada :</label>
                                            <input class="form-control" type="email" id="formValidationEmail"
                                                   name="formValidationEmail" readonly/>
                                        </div>

                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="formValidationName">Tipe Perjalanan :</label>
                                            <input type="text" id="formValidationName" class="form-control"
                                                    name="formValidationName" readonly/>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="formValidationEmail">Titik Kedatangan :</label>
                                            <input class="form-control" type="email" id="formValidationEmail"
                                                   name="formValidationEmail" readonly/>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="formValidationEmail">ID Perjalanan :</label>
                                            <input class="form-control" type="email" id="formValidationEmail"
                                                   name="formValidationEmail" readonly/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 mt-3">
                            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-5 mt-3">
                                            <label class="form-label" for="formValidationName">Jarak Tempuh Terakhir :</label>
                                            <input class="form-control" type="email" id="formValidationEmail"
                                                   name="formValidationEmail"/>
                                        </div>
                                        <div class="col-md-6 mb-5 mt-3">
                                            <label class="form-label" for="formValidationEmail">Bar BBM :</label>
                                            <input class="form-control" type="email" id="formValidationEmail"
                                                   name="formValidationEmail" readonly/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahLaporanPerjalanan"><i class="bx bx-plus-circle"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <form action="" method="">
                            <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-3p">Bagian</th>
                                        <th class="w-10p">Keluhan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header  pb-0  d-flex justify-content-between">
                                <h4 class="card-title"></h4>
                                <button type="submit" class="btn btn-success mr-1"><i class="bx bx-save"></i> Submit</button>
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
