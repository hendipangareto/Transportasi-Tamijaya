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
                        <li class="breadcrumb-item active">Supervisor Check Armada
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
                    <h4 class="card-title" style="color: black"><b>PEMELIHARAAN </b>| Form Approval Check Armada | Sparepart</h4>
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
                            <div class="table-responsive mt-2 mb-3" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead class="text-center">
                                    <tr >
                                        <th  class="w-2p" rowspan="2">No</th>
                                        <th  class="w-10p" rowspan="2">Bagian</th>
                                        <th colspan="2"  class="w-5p">Check Kondisi</th>
                                        <th  class="w-3p" rowspan="2">Approval <br> SPV</th>
                                        <th  class="w-10p" rowspan="2">Catatan</th>
                                    </tr>
                                    <tr>
                                        <td>Baik, Lengkap</td>
                                        <td>Rusak, Perlu Perawatan</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="6" style="background-color: #f8d5b0">SPAREPART</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td >1</td>
                                        <td >Roda Kemudi</td>
                                        <td ><input type="checkbox"></td>
                                        <td ><input type="checkbox"></td>
                                        <td ><input type="checkbox"></td>
                                        <td >Ban Kempes</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td >2</td>
                                        <td >Roda Kemudi</td>
                                        <td ><input type="checkbox"></td>
                                        <td ><input type="checkbox"></td>
                                        <td ><input type="checkbox"></td>
                                        <td >Ban Kempes</td>
                                    </tr>
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
