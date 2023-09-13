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
                        <li class="breadcrumb-item active">Pengajuan Logistik Perjalanan
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
                    <h4 class="card-title" style="color: black"><b>PEMELIHARAAN </b>| Form Pengajuan Logistik Perjalanan</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-md-7 mt-3">
                                <div class="card shadow-none bg-transparent border border-secondary mb-3">
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label" for="formValidationName">Armada :</label>

                                                <input class="form-control" type="email" id="formValidationEmail"
                                                       name="formValidationEmail" readonly/>
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label class="form-label" for="formValidationEmail">Tipe Armada :</label>
                                                <input class="form-control" type="email" id="formValidationEmail"
                                                       name="formValidationEmail" readonly/>
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label class="form-label" for="formValidationName">Tipe Perjalanan :</label>
                                                <input type="text" id="formValidationName" class="form-control"
                                                       name="formValidationName" readonly/>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label" for="formValidationEmail">ID Perjalanan :</label>
                                                <input class="form-control" type="email" id="formValidationEmail"
                                                       name="formValidationEmail" readonly/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form action="" id="form-search-transaction">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href=" " class="btn   mt-1" STYLE="background-color: pink">SPAREPART ARMADA</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href=" " class="btn btn-info mt-1">LOGISTIK PERJALANAN</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahLaporanPerjalanan"><i class="bx bx-plus-circle"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-2 mb-3" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-armada">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-2p">No</th>
                                    <th class="w-3p">PIC</th>
                                    <th class="w-10p">Nama Item</th>
                                    <th class="w-10p">Jumlah <br> Permintaan</th>
                                    <th class="w-10p">Satuan</th>
                                    <th class="w-10p">ID <br> Produk</th>
                                    <th class="w-10p">Kode <br> Produk</th>
                                    <th class="w-10p">Bagian</th>
                                    <th class="w-10p">Sub Bagian</th>
                                    <th class="w-10p">Komponen</th>
                                    <th class="w-10p">Action</th>
                                    <th class="w-10p">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td><a href="" data-toggle="modal" data-target="#DetailNotifikasi"><i class="bx bx-street-view btn btn-outline-primary"></i></a></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td> <i class="bx bx-edit btn btn-outline-warning"></i></td>
                                    <td  style="background-color: #fab86e;"><a href="" style="color: black">Diajukan</a></td>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <form action="" method="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card shadow-none bg-transparent   mb-3">
                                        <div class="card-body">
                                            <div class="row mt-3">
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label" for="formValidationName">Status Cuci :</label>
                                                    <input class="form-control" type="email" id="formValidationEmail"
                                                           name="formValidationEmail"/>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label" for="formValidationEmail">Status Check :</label>
                                                    <input class="form-control" type="email" id="formValidationEmail"
                                                           name="formValidationEmail"/>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label" for="formValidationEmail">Status Perawatan :</label>
                                                    <input class="form-control" type="email" id="formValidationEmail"
                                                           name="formValidationEmail"/>
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label" for="formValidationName">Status Final :</label>
                                                    <input type="text" id="formValidationName" class="form-control"
                                                           name="formValidationName"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
