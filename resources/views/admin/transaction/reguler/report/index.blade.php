@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Laporan Transaksi</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Reguler
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
                <div class="card-header d-flex justify-content-between">

                    <button type="button" class="btn btn-primary mr-1" id="btn-add-report-transaction-reguler"
                        onclick="openModal('report-transaction-reguler','create')"><i class="bx bx-plus-circle"></i> Buat
                        Laporan</button>
                    <button type="button" class="btn btn-light-primary mr-1" id="btn-show-report-transaction-reguler"
                        onclick="openModal('report-transaction-reguler','show')"><i class="bx bx-info-circle"></i> Tampil
                        Laporan</button>
                    {{-- <button type="button" style="display:none" class="btn btn-warning text-white mr-1" id="btn-back-report-transaction-reguler"
                        onclick="openModal('report-transaction-reguler','back')"><i class="bx bx-left-arrow-alt"></i> Kembali</button> --}}
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div id="show-data-report-transaction-reguler">
                            <div class="alert alert-secondary text-center font-weight-bold mb-2" role="alert">
                                <h5 class="text-white text-uppercase font-weight-bold">Laporan Transaksi Reguler Tami Jaya
                                </h5>
                                <hr>
                                <p>Please Create Some Report</p>
                            </div>
                        </div>
                        <div id="daily-report mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daily Report Transaction Reguler</h4>
                                    <a class="heading-elements-toggle">
                                        <i class="bx bx-dots-vertical font-medium-3"></i>
                                    </a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a data-action="reload">
                                                    <i class="bx bx-revision"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="form-data-report-transaction-reguler" style="display: none">
                            @include('admin.transaction.reguler.schedule.form')
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('admin.master-data.report-transaction-reguler.modal') --}}
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/transaction/schedule.js') }}"></script>
@endpush
