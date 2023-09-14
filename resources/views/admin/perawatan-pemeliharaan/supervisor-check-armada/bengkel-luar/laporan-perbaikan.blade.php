@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Master Karyawan
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
                            <h2 class="h4 mb-1"><b>PERAWATAN | Bengkel Luar |Laporan Penggunaan Jasa</b></h2>

                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Tanggal Pengajuan</label>
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Nomor Pengajuan</label>
                                    <select class="form-control"
                                            name="employee_status" id="employee_status">
                                        <option value="">asfas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="">Status Laporan</label>
                                    <select class="form-control"
                                            name="postionfilter">
                                        <option disabled selected>Pilih Jabatan</option>
                                        <option value="">sasf</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="" style="color: white">Filter</label><br>
                                    <button class="btn btn-outline-primary">Filter Data <i
                                            class="bx bx-filter"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <input type="hidden" id="Tablesemployee" value=" ">
                        <table class="table table-bordered table-hover" id="table-list-employees">
                            <thead>
                            <tr class="text-uppercase">
                                <th class="w-3p">No</th>
                                <th class="w-10p">Tanggal Pengajuan</th>
                                <th class="w-10p">No Pengajuan</th>
                                <th class="w-10p">Dana Diberikan <br> (Rp.)</th>
                                <th class="w-10p">Total Belanja <br> (Rp.)</th>
                                <th class="w-10p">Status Laporan</th>h>
                                <th class="w-2p">Action</th>
                            </tr>
                            </thead>
                            <tbody id="show-data-employee">

                                <tr>
                                    <td># </td>
                                    <td># </td>
                                    <td># </td>
                                    <td># </td>
                                    <td># </td>
                                    <td># </td>


                                    <td>
                                        <a href=" "
                                           class="btn btn-sm btn-outline-primary"><i
                                                class="bx bx-info-circle font-size-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col ml-auto">
                        <div class="dropdown float-right">
                            <a href=" "
                               class="btn btn-success mr-1">
                                <i class="bx bx-save"></i> Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

