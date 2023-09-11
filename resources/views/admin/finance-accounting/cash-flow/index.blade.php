@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Cash Flow Management</h5>
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
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="">Cash Flow <span id="month-title">Maret 2022</span> </h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header mt-3">
                    <div class="row">

                        <div class="col-md-3 justify-content-center">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button"><i class="bx bx-calendar"></i></button>
                                </div>
                                <select name="param_month" id="param_month" class="form-control">
                                    <option value="">Semua Bulan</option>
                                    @php
                                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        $month_now = date('m');

                                    @endphp
                                    @foreach ($months as $key => $month)
                                        <option @if ($month_now == $key + 1) selected @else @endif
                                            value="{{ $key + 1 }}">
                                            {{ $month }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="displayData()" type="button">Show
                                        Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between float-right">

                                <button type="button" class="btn btn-sm btn-outline-primary mr-1" id="btn-filter-cash-flow"
                                    onclick="openModal('cash-flow','generate-journal')"><i class="bx bxs-file"></i> Generate Jurnal</button>
                                <button type="button" class="btn btn-sm btn-primary mr-1" id="btn-add-cash-flow"
                                    onclick="openModal('cash-flow','add')"><i class="bx bx-plus-circle"></i> Tambah
                                    Data</button>
                                {{-- <button type="button" class="btn btn-sm btn-warning mr-1" id="btn-refresh-cash-flow"
                                    onclick="manageData('cash-flow','refresh')"><i class="bx bx-rotate-right"></i>
                                    Refresh</button> --}}
                                <button type="button" style="display:none" class="btn btn-warning text-white mr-1"
                                    id="btn-back-cash-flow" onclick="openModal('cash-flow','back')"><i
                                        class="bx bx-left-arrow-alt"></i> Kembali</button>
                            </div>


                        </div>
                    </div>
                </div>

                <style>
                    #table-cash-flow thead tr th {
                        font-size: 11px !important;
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }

                </style>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-cash-flow">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                        </div>
                        <div id="form-data-cash-flow" style="display: none">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.finance-accounting.cash-flow.modal')
@push('page-scripts')
    <script src="{{ asset('script/admin/finance-accounting/cashflow.js') }}"></script>
@endpush
