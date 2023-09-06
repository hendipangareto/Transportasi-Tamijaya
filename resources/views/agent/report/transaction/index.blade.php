@extends('agent.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Laporan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Transaksi Harian
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
                <div class="card-header  pb-0  d-flex justify-content-between">
                    <h4 class="card-title">Laporan Transaksi Harian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        {{-- START TAB TRAVEL DETAIL --}}

                        <div class="row">
                            <div class="col-6">
                                <label>Tanggal: <span style="color:red;">*</span></label>
                                <div class="form-group mb-0">
                                    <input type="date" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Jenis Tanggal: <span style="color:red;">*</span></label>
                                <div class="form-group mb-0">
                                    <select name="" class="form-control form-control-sm" id="">
                                        <option value="">--Pilih Tipe Laporan--</option>
                                        <option value="">Tanggal Berangkat</option>
                                        <option value="">Tanggal Transaksi</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <label>Agen:</label>
                                <div class="form-group mb-0">
                                    <select name="" class="form-control form-control-sm" id="">
                                        <option value="">--Pilih Agen--</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <label>Tipe Bus:</label>
                                <div class="form-group mb-0">
                                    <select name="" class="form-control form-control-sm" id="">
                                        <option value="">--Pilih Tipe Bus--</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <label>Rute:</label>
                                <div class="form-group mb-0">
                                    <select name="" class="form-control form-control-sm" id="">
                                        <option value="">--Pilih Rute Bus--</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <label>Driver:</label>
                                <div class="form-group mb-0">
                                    <select name="" class="form-control form-control-sm" id="">
                                        <option value="">--Pilih Driver Bus--</option>
                                    </select>

                                </div>
                            </div>

                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block" onclick="searchTravel()"><i
                                        class="bx bx-search-alt"></i> Tampil Laporan Harian</button>
                            </div>
                        </div>
                        <hr />
                        <div id="report-daily-not-available" style="display: none">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">
                                Mohon maaf tidak ada laporan harian untuk transaksi yang anda cari.
                            </div>
                        </div>
                        {{-- style="display: none" --}}
                        <style>
                            #table-daily-report thead tr th {
                                font-size: 10px !important;
                                padding-top: 5px;
                                padding-bottom: 5px;
                            }

                            #table-daily-report tbody tr td {
                                font-size: 12px !important;
                                padding-top: 5px;
                                padding-bottom: 5px;
                            }

                        </style>
                        <div id="report-daily-data">
                            <table
                                class="table table-responsive  table-responsive-lg table-responsive-xl table-responsive-md table-bordered table-hover"
                                id="table-daily-report">
                                <thead>
                                    <tr>
                                        <th>Kode Reservasi</th>
                                        <th>Nama Customer</th>
                                        <th>Kelas</th>
                                        <th>Rute</th>
                                        <th>Dari</th>
                                        <th>Ke</th>
                                        <th>Agent</th>
                                        <th>Pemesan</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><a href="{{ url('agent/report/detail-transaction/R093123') }}"
                                                target="_blank">R093123</a></td>
                                        <td>Johanes Adhitya</td>
                                        <td>
                                            <div class="badge badge-success " style="padding-right: 5px;padding-left:5px">
                                                Suitess</div>
                                        </td>
                                        <td>Jogjakarta - Denpasar</td>
                                        <td>Jogjakarta : Garasi</td>
                                        <td>Denpasar : Jl. Kelud Wahidin</td>
                                        <td>Agen Garasi Ergo</td>
                                        <td>Ike</td>
                                        <td>20 Februari 2022</td>
                                        <td>20 Februari 2022</td>
                                        <td>550.000</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td>1.100.000</td>
                                    </tr>
                                    <tr class="font-weight-bold">
                                        <td class="text-right" colspan="13">Total Transaksi</td>
                                        <td class="text-left">1.100.000</td>
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

@push('page-scripts')
@endpush
