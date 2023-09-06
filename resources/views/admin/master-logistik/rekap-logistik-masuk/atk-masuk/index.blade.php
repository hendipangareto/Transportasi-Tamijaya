@extends('admin.layouts.app')
@section('content-header')
    {{--    <div class="content-header-left col-12 mb-2 mt-1">--}}
    {{--        <div class="row breadcrumbs-top">--}}
    {{--            <div class="col-12">--}}
    {{--                <h5 class="content-header-title float-left pr-1 mb-0">LOGISTIK</h5>--}}
    {{--                <div class="breadcrumb-wrapper col-12">--}}
    {{--                    <ol class="breadcrumb p-0 mb-0">--}}
    {{--                        <li class="content-header-title float-left pr-1 mb-0">Form Logistik Keluar--}}
    {{--                        </li>--}}
    {{--                        <a class="content-header-title float-left pr-1 mb-0">Perjalanan</a>--}}
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
                <div class="card-header d-flex justify-content-between" style="background-color: #f83b4b">
                    <h4 class="card-title" style="color: black">LOGISTIK | Daftar ATK Masuk</h4>
                </div>
                <div class="card-content mt-3">
                    <div class="card-body card-dashboard">
                        <form action="" id="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{ route('master-logistik-masuk-list-rekap-data') }}"
                                                       class="btn btn-warning btn-block mt-1"> <i
                                                            class="bx bx-arrow-back"></i>
                                                        Kembali</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ route('master-logistik-masuk-list-sparepart') }}"
                                                       class="btn btn-primary btn-block mt-1"> <i
                                                            class="bx bx-plus-circle"></i>
                                                        Sparepart</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{ route('master-logistik-masuk-list-logistik') }}"
                                                       class="btn btn-info btn-block mt-1"> <i
                                                            class="bx bx-plus-circle"></i>
                                                        Logistik</a>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama
                                                    Item :</label>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <select id="armada_category" name="armada_category"
                                                                class="form-control" onChange="handleArmadaType(this)">
                                                            <option value="">Pilih Item</option>
                                                            <option value="PARIWISATA">Ban</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Tanggal Masuk: </label>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="YYYY-MM-DD"
                                                                       id="armada_year"
                                                                       name="armada_year" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Jam Masuk: </label>
                                                            <div class="form-group">
                                                                <input type="time"
                                                                       placeholder="Silahkan masukan tahun armada"
                                                                       id="armada_year" name="armada_year"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>No. Registrasi: </label>
                                                            <div class="form-group">
                                                                <input type="text"
                                                                       placeholder="Silahkan masukan tahun armada"
                                                                       id="armada_year"
                                                                       name="armada_year" class="form-control" readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="" method="">
                            <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-3p">PIC</th>
                                        <th class="w-3p">Tanggal Masuk</th>
                                        <th class="w-10p">Jam Masuk</th>
                                        <th class="w-5p">Kode Barang</th>
                                        <th class="w-5p">Nama Item</th>
                                        <th class="w-5p">Merk</th>
                                        <th class="w-10p">Jumlah Masuk</th>
                                        <th class="w-10p">Stock Akhir</th>
                                        <th class="w-5p">Satuan</th>
                                        <th class="w-5p">Checklist</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>1</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>
                                            <div class="mb-1">
                                                <label class="form-check m-0">
                                                    <input type="checkbox" class="form-check-input"/>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="defaultFormControlInput" class="form-label">Lampiran Dokumen Surat Jalan</label>
                                                    <input type="file" class="form-control" id="defaultFormControlInput"
                                                           placeholder="John Doe"
                                                           aria-describedby="defaultFormControlHelp"/>
                                                    <div id="defaultFormControlHelp" class="form-text text-danger">Format file.pdf
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="defaultFormControlInput" class="form-label">Foto Bukti Barang Datang</label>
                                                    <input type="file" class="form-control" id="defaultFormControlInput"
                                                           placeholder="John Doe"
                                                           aria-describedby="defaultFormControlHelp"/>
                                                    <div id="defaultFormControlHelp" class="form-text text-danger">Format foto.jgp/jpeg/png
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                    <div class="card-header  pb-0  d-flex justify-content-between">
                                        <h4 class="card-title"></h4>
                                        <button type="submit" class="btn btn-success mr-1"><i class="bx bx-save"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

