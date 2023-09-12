@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Master Logistik</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Master Bagian
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
                    <h4 class="card-title" style="color: black"><b>Data Master </b>| Bagian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-success mr-1" data-toggle="modal" data-target="#TambahBagian"><i class="bx bx-plus-circle"></i>   Tambah Data</a>
                                </div>
                                {{--                                <div class="row">--}}
                                {{--                                    <div class="col-md-6">--}}
                                {{--                                        <div class="row">--}}
                                {{--                                            <div class="col-md-4">--}}
                                {{--                                                <label for="defaultFormControlInput" class="form-label">No Pengajuan</label>--}}
                                {{--                                                <input type="text" class="form-control" id="defaultFormControlInput"--}}
                                {{--                                                       placeholder="Auto generate"--}}
                                {{--                                                       aria-describedby="defaultFormControlHelp" readonly/>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-md-4">--}}
                                {{--                                                <label for="defaultFormControlInput" class="form-label">Tanggal Pengajuan</label>--}}
                                {{--                                                <input type="date" class="form-control" id="defaultFormControlInput"--}}
                                {{--                                                       placeholder="John Doe"--}}
                                {{--                                                       aria-describedby="defaultFormControlHelp"/>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-md-6">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <form action="" method="">
                            <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-3p">ID Bagian</th>
                                        <th class="w-3p">Nama Bagian</th>
                                        <th class="w-10p">Deskripsi </th>
                                        <th class="w-10p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>#</td>
                                        <td>#</td>

                                        <td>#</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#DetailBagian"><i class="bx bx-info-circle font-size-base"></i></a>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#EditBagian"><i class="bx bx-edit font-size-base"></i></a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#"><i class="bx bx-trash font-size-base"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.master-logistik.bagian.modal-tambah')
    @include('admin.master-logistik.bagian.modal-edit')
    @include('admin.master-logistik.bagian.modal-detail')
@endsection
