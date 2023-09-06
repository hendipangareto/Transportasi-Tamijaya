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
                        <li class="breadcrumb-item active">Jurnal
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
                    <h4 class="card-title">List Data Master Jurnal</h4>
                    <div class="d-flex">
                        <button type="button" class="btn btn-success mr-1" id="btn-import-journal"
                            onclick="openModal('journal','import')"><i class="bx bx-import"></i> Import Journal</button>
                        <button type="button" class="btn btn-primary mr-1" id="btn-add-journal"
                            onclick="openModal('journal','add')"><i class="bx bx-plus-circle"></i> Tambah Data</button>
                        <button type="button" style="display:none" class="btn btn-warning text-white mr-1"
                            id="btn-back-journal" onclick="openModal('journal','back')"><i class="bx bx-left-arrow-alt"></i>
                            Kembali</button>
                    </div>

                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-journal">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                        </div>
                        <div id="form-data-journal" style="display: none">
                            @include('admin.finance-accounting.journal.form')
                        </div>
                        <div id="form-import-journal" style="display: none">
                            @include(
                                'admin.finance-accounting.journal.import'
                            )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.finance-accounting.journal.modal')
@push('page-scripts')
    {{-- <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/app-assets/js/scripts/forms/select/form-select2.js') }}"></script> --}}
    <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.js') }}"></script>
    <script src="{{ asset('script/admin/finance-accounting/journal.js') }}"></script>
@endpush
