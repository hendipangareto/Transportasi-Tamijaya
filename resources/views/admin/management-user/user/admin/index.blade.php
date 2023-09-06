@extends('admin.layouts.app')
@section('content-header')
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">User Admin</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">User Admin
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
                <h4 class="card-title">List Data Master User Admin</h4>
                <button type="button" id="btn-add-user-admin" class="btn btn-primary mr-1" onclick="openForm('user-admin','add')">
                    <i class="bx bx-plus-circle"></i> Tambah Data</button>
                <button type="button" id="btn-cancel-user-admin" style="display:none" class="btn btn-danger mr-1" onclick="openForm('user-admin','cancel')">
                    <i class="bx bx-x-circle"></i> Batalkan</button>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">

                        <div class="col-md-7">
                            <div class="table-responsive" id="show-data-user-admin">
                                <div class="text-center">
                                    <div class="spinner-border mr-3 spinner-border text-center" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <h5 for="">Please Wait.....</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            @include('admin.management-user.user.admin.form')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-scripts')
<script src="{{ asset('script/admin/management-user/index.js') }}"></script>
<script>


</script>
@endpush
