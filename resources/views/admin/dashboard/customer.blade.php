@extends('admin.layouts.app')
{{-- @section('content-header')
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">DataTables</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Datatable
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@section('content')   <div class="row">
    <!-- Website Analytics Starts-->
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Website Analytics (Daily)</h4>
            </div>
            <div class="card-content">
                <div class="card-body pb-1">
                    <div class="d-flex justify-content-around align-items-center flex-wrap">
                        <div class="user-analytics">
                            <i class="bx bx-user mr-25 align-middle"></i>
                            <span class="align-middle text-muted">Pengguna</span>
                            <div class="d-flex">
                                <div id="radial-success-chart"></div>
                                <h3 class="mt-1 ml-50">20</h3>
                            </div>
                        </div>
                        <div class="sessions-analytics">
                            <i class="bx bx-show-alt align-middle mr-25"></i>
                            <span class="align-middle text-muted">Pengunjung</span>
                            <div class="d-flex">
                                <div id="radial-warning-chart"></div>
                                <h3 class="mt-1 ml-50">92K</h3>
                            </div>
                        </div>
                        <div class="bounce-rate-analytics">
                            <i class="bx bx-trending-up align-middle mr-25"></i>
                            <span class="align-middle text-muted">Bounce Rate</span>
                            <div class="d-flex">
                                <div id="radial-danger-chart"></div>
                                <h3 class="mt-1 ml-50">72.6%</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Inbox (Daily)</h4>
            </div>
            <div class="card-content">
                <div class="card-body pb-1"><table class="table table-bordered table-hover " id="table-product">
                    <thead>
                        <tr>
                            <th class="w-20p">Pengirim</th>
                            <th>Pesan</th>
                            <th class="w-15p text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">
                                Tidak Terdapat Pesan Hari Ini
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-3 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-xl-12 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center"> 
                                    <div class="total-amount">
                                        <h5 class="">Top Product Visited</h5>
                                        <div class="list-group list-group-labels">                                            
                                        <label class="text-muted">1. Apa</label>
                                        <label class="text-muted">1. Apa</label>
                                        <label class="text-muted">1. Apa</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="primary-line-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-xl-12 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-rgba-warning m-0 p-25 mr-75 mr-xl-2">
                                        <div class="avatar-content">
                                            <i class="bx bx-dollar text-warning font-medium-2"></i>
                                        </div>
                                    </div>
                                    <div class="total-amount">
                                        <h5 class="mb-0">$53,659</h5>
                                        <small class="text-muted">Income</small>
                                    </div>
                                </div>
                                <div id="warning-line-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
