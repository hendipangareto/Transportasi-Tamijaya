@extends('admin.layouts.app')
@section('content-header')
{{--    <div class="content-header-left col-12 mb-2 mt-1">--}}
{{--        <div class="row breadcrumbs-top">--}}
{{--            <div class="col-12">--}}
{{--                <h5 class="content-header-title float-left pr-1 mb-0">LOGISTIK</h5>--}}
{{--                <div class="breadcrumb-wrapper col-12">--}}
{{--                    <ol class="breadcrumb p-0 mb-0">--}}
{{--                        <li class="content-header-title float-left pr-1 mb-0">Rekap Logistik Keluar--}}
{{--                        </li>--}}
{{--                        <h6>Logistik Perjalanan</h6>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black">LOGISTIK | Rekap Keluar Logistik</h4>
                </div>
                <div class="card-content mt-3">
                    <div class="card-body card-dashboard">
                        <form action="" id="form-search-transaction">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('master-logistik-logbook-sparepart-list-data') }}"
                                               class="btn btn-primary btn-block mt-1"> <i class="bx bx-plus-circle"></i>
                                                Sparepart</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('master-logistik-logbook-logistik-list-data') }}"
                                               class="btn btn-info btn-block mt-1"> <i class="bx bx-plus-circle"></i>
                                                Logistik</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('master-logistik-logbook-atk-list-data') }}"
                                               class="btn btn-danger btn-block mt-1"> <i class="bx bx-plus-circle"></i>
                                                ATK</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-3">
                                    <label>Tanggal Diambil : </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="DD-YYYY-MM" id="armada_year"
                                               name="armada_year" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title" style="color: black">DAFTAR SPAREPART PERJALANAN</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-armada">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Petugas <br> Pengambil</th>
                                    <th class="w-10p">Tanggal Pengambilan</th>
                                    <th class="w-10p">Jam Pengambilan</th>
                                    <th class="w-10p">Vol. <br> Gudang</th>
                                    <th class="w-5p">Jumlah Keluar</th>
                                    <th class="w-5p">Jumlah Masuk</th>
                                    <th class="w-10p">Stok Akhir</th>
                                    <th class="w-5p">Satuan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title" style="color: black">DAFTAR LOGISTIK PERJALANAN</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-armada">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Petugas <br> Pengambil</th>
                                    <th class="w-10p">Tanggal Pengambilan</th>
                                    <th class="w-10p">Jam Pengambilan</th>
                                    <th class="w-10p">Vol. <br> Gudang</th>
                                    <th class="w-5p">Jumlah Keluar</th>
                                    <th class="w-5p">Jumlah Masuk</th>
                                    <th class="w-10p">Stok Akhir</th>
                                    <th class="w-5p">Satuan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title" style="color: black">LOGBOOK ATK</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive" id="show-data-filter-accounting">
                            <table class="table table-bordered table-hover" id="table-armada">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Petugas <br> Pengambil</th>
                                    <th class="w-10p">Tanggal Pengambilan</th>
                                    <th class="w-10p">Jam Pengambilan</th>
                                    <th class="w-10p">Vol. <br> Gudang</th>
                                    <th class="w-5p">Jumlah Keluar</th>
                                    <th class="w-5p">Jumlah Masuk</th>
                                    <th class="w-10p">Stok Akhir</th>
                                    <th class="w-5p">Satuan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
