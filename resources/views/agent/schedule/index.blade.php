@extends('agent.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Jadwal Travel</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Jadwal Travel
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
                <div class="card-header pb-1 mb-1 alert alert-primary d-flex justify-content-between">
                    <h4 class="card-title text-white">Daftar Booking</h4>
                </div>
                
                <div class="card-body pt-0">

                    <style>
                        #table-schedule thead tr th {
                            font-size: 12px !important;
                            padding-top: 5px;
                            padding-bottom: 5px;
                        }

                        #table-schedule tbody tr td {
                            font-size: 12px !important;
                            padding-top: 5px;
                            padding-bottom: 5px;
                        }

                    </style>
                    <div id="report-daily-data">
                        <table
                            class="table table-responsive table-bordered table-hover"
                            id="table-schedule">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Customer</th>
                                    <th>Telepon</th>
                                    <th>Dari</th>
                                    <th>Ke</th>
                                    <th>Agent</th>
                                    <th>Pemesan</th>
                                    <th>Kursi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header pb-1 mb-1 alert alert-warning d-flex justify-content-between">
                    <h4 class="card-title text-white">Daftar Hapusan Booking</h4>
                </div>
                
                <div class="card-body pt-0">

                    <style>
                        #table-booking-deleted thead tr th {
                            font-size: 10px !important;
                            padding-top: 5px;
                            padding-bottom: 5px;
                        }

                        #table-booking-deleted tbody tr td {
                            font-size: 12px !important;
                            padding-top: 5px;
                            padding-bottom: 5px;
                        }

                    </style>
                    <div id="report-daily-data">
                        <table
                            class="table table-responsive table-bordered table-hover"
                            id="table-booking-deleted">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Customer</th>
                                    <th>Telepon</th>
                                    <th>Dari</th>
                                    <th>Ke</th>
                                    <th>Agent</th>
                                    <th>Pemesan</th>
                                    <th>Kursi</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal</th>
                                    <th>Tanggal Hapus</th>
                                    <th>Penghapus</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('page-scripts')
    @endpush
