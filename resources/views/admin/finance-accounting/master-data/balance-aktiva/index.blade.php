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
                        <li class="breadcrumb-item active">Neraca Aktiva
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-5 col-md-5">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6 class="font-weight-bold">NERACA (AKTIVA)</h6>
                    <button type="button" class="btn btn-sm btn-primary mr-1 text-uppercase"
                        onclick="openModal('balance-aktiva','add')"><i class="bx bx-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-balance-aktiva">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="balance-aktiva">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7 col-md-7">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6 class="font-weight-bold" id="title-aktiva">DETAIL ACCOUNT AKTIVA</h6>
                    <input type="hidden" id="selected_aktiva" value="">
                    <button type="button" class="btn btn-sm btn-primary mr-1 text-uppercase" id="btn-balance-detail-aktiva"
                        onclick="openModalDetail('balance-detail-aktiva','add')" style="display: none"><i
                            class="bx bx-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-account-balance-detail-aktiva">
                            <div class="text-center">
                                <h5 for="">Silahkan Pilih Data Neraca Aktiva</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.finance-accounting.master-data.balance-aktiva.modal')
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/finance-accounting/master-data.js') }}"></script>
@endpush
