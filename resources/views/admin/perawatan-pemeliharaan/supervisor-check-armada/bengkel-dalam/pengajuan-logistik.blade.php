@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12  mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1  ">Perawatan & Pemeliharaan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 ">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Pengajuan Sparepart
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12 my-4">
        <div class="card shadow">
            <div class="card-header" style="background-color: #00b3ff">
                <div class="toolbar row ">
                    <div class="col-md-12 d-flex">
                        <h4 class="card-title" style="color: black"><b>PERAWATAN </b>| Bengkel Dalam | Form Pengajuan Sparepart</h4>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label>Bagian : </label>
                                <div class="form-group">
                                    <input type="text"  id="" name=""
                                           class="form-control bg-transparent" placeholder="Bagian">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label>Sub Bagian : </label>
                                <div class="form-group">
                                    <input type="text"  id="" name=""
                                           class="form-control bg-transparent" placeholder="Sub Bagian">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label>Komponen : </label>
                                <div class="form-group">
                                    <input type="text"  id="" name=""
                                           class="form-control bg-transparent" placeholder="Komponen">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <div class="form-group">
                                <label>Jumlah : </label>
                                <div class="form-group">
                                    <input type="text"  id="" name=""
                                           class="form-control bg-transparent" placeholder="kategori barang">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <div class="table-responsive">
                    <input type="hidden" id="table-daftar-gaji" value="">
                    <table class="table datatables table-bordered table-hover"
                           id="table-daftar-gaji-pegawai">
                        <thead>
                        <tr class="text-truncate text-center">
                            <th class="w-3p">No</th>
                            <th class="w-10p">Bagian</th>
                            <th class="w-10p">Komponen</th>
                            <th class="w-2p">Jumlah</th>
                            <th class="w-10p">PIC</th>
                            <th class="w-10p">Tanggal Order</th>
                            <th class="w-5p">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>#</td>
                                <td>$</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="card-header  pb-0  d-flex justify-content-between">
                        <h4 class="card-title"></h4>
                        <button type="submit" class="btn btn-success mr-1"><i class="bx bxs-check-circle"></i> Notifikasi Ke Bagian Logistik</button>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection
