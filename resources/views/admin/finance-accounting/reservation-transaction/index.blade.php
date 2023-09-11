@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Reservasi Transaksi</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Reservasi
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
                            <h4 class="card-title">Reservasi Transaksi</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header pb-0 d-flex justify-content-between mt-2">
                    <h4 class="card-title"></h4>
                    <div class="d-flex">
                        <button onclick="filterData()" type="button" class="btn btn-outline-warning mr-1 "><i
                                class="bx bx-filter-alt"></i><span class="align-middle ml-25">Filter</span></button>
                        <button onclick="archieveData()" type="button" class="btn btn-outline-danger mr-1 "><i
                                class="bx bx-folder"></i><span class="align-middle ml-25">Archieve</span></button>
                        <button onclick="exportData()" type="button" class="btn btn-outline-primary mr-1 "><i
                                class="bx bx-export"></i><span class="align-middle ml-25">Export</span></button>
                    </div>
                    <input type="hidden" id="target_export" value="all-transaction">
                    <input type="hidden" id="state_transaction" value="all-transaction">
                </div>
                <div class="card-content pt-1">
                    <div class="card-body px-1">
                        <ul class="nav nav-tabs nav-justified mb-0" id="tab-reservation-transaction" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="all-transaction-tab" data-toggle="tab"
                                    href="#all-transaction" onclick="displayData('all-transaction')" role="tab"
                                    aria-controls="all-transaction" aria-selected="true">
                                    All Transaction
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reguler-transaction-tab" data-toggle="tab"
                                    href="#reguler-transaction" role="tab"
                                    aria-controls="reguler-transaction" aria-selected="true">
                                    Reguler
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pariwisata-transaction-tab" data-toggle="tab"
                                    href="#pariwisata-transaction"
                                    role="tab" aria-controls="pariwisata-transaction" aria-selected="false">
                                    Pariwisata
                                </a>
                            </li>
                        </ul>

                        <style>
                            .table-transaction thead tr th {
                                font-size: 10px !important;
                                padding-top: 15px;
                                padding-bottom: 15px;
                            }

                            .table-transaction tbody tr td {
                                font-size: 12px !important;
                            }

                        </style>
                        <!-- Tab panes -->
                        <div class="tab-content pt-1 px-0">
                            <div class="tab-pane active" id="all-transaction" role="tabpanel"
                                aria-labelledby="all-transaction-tab">
                                {{-- show-data- --}}
                                @include(
                                    'admin.finance-accounting.reservation-transaction.display.all-transaction'
                                )
                            </div>
                            <div class="tab-pane" id="reguler-transaction" role="tabpanel"
                                aria-labelledby="reguler-transaction-tab">
                                COMING SOON
                                {{-- @include(
                                    'admin.transaction.reguler.data-transaction.display.reguler-transaction'
                                ) --}}
                            </div>
                            <div class="tab-pane" id="pariwisata-transaction" role="tabpanel"
                                aria-labelledby="pariwisata-transaction-tab">

                                COMING SOON
                                {{-- @include(
                                    'admin.transaction.reguler.data-transaction.display.pariwisata-transaction'
                                ) --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(
        'admin.finance-accounting.reservation-transaction.modal'
    )
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/finance-accounting/reservation-transaction.js') }}"></script>
@endpush
