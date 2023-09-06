@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Filter Data
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
                    <h4 class="card-title">Filter Data Accounting</h4>
                    <button class="btn btn-success"><i class="bx bx-file"></i>Export</button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form action="" id="form-search-transaction">
                            <div class="row">
                                <div class="col-md-4"><label>Periode Transaksi</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" id="start_date_periode" class="form-control form-control-sm"
                                                name="start_date_periode">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" id="end_date_periode" class="form-control form-control-sm"
                                                name="end_date_periode">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"><label>Tipe</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="type_transaction[]" id="type_transaction"
                                                class="form-control form-control-sm select2 select2-size-sm " multiple="multiple" >
                                                <option value="DEBIT">DEBIT</option>
                                                <option value="KREDIT">KREDIT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"><label>Grup</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="group_transaction[]" id="group_transaction"
                                                class="form-control form-control-sm select2 select2-size-sm " multiple="multiple" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"><label>Jurnal</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="account_transaction[]" id="account_transaction"
                                                class="form-control form-control-sm select2 select2-size-sm " multiple="multiple" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-block mt-1" onclick="manageData('search')">
                                        <i class="bx bx-search"></i>Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive mt-2" id="show-data-filter-accounting">
                            <div class="text-center">
                                Silahkan Filter Parameter Data
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @include('admin.finance-accounting.filter-accounting.modal') --}}
@push('page-scripts')
    <script src="{{ asset('script/admin/finance-accounting/filter-accounting.js') }}"></script>
@endpush
