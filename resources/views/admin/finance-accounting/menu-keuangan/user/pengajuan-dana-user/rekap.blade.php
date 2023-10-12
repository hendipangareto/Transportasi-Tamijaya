@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Rekap Pengajuan Dana User
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
                            <h4 class="card-title">List Rekap Pengajuan Dana Belanja User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">No Penagjuan</label>
                                        <select name="no_pengajuan_filter" class="form-control">
                                            <option value="" selected disabled>Pilih no pengajuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tangal</label>
                                        <input type="date" name="tanggal_filter" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i>
                                        </button>
                                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-rekap')}}" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header">
                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index')}}" class="btn btn-outline-primary">Pengajuan Dana</a>
                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-rekap')}}" class="btn btn-primary">Rekap</a>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            {{--                            <input type="hidden" id="tableRekapPengajuanDanaUser" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover"
                                   id="table-rekap-penagjuan-dana-user">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-15p">Tanggal Pengajuan</th>
                                    <th class="w-10p">No Pengajuan</th>
                                    <th class="w-5p">Dana Diajukan (Rp)</th>
                                    <th class="w-5p">Status Pengajuan Dana</th>
                                    <th class="w-5p">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer">
                                                <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-detail-rekap')}}" class="bx bx-info-circle font-size-base" style="color: white"></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.finance-accounting.menu-keuangan.user.pengajuan-dana-user.modal')
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
