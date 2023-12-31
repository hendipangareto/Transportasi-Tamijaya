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
                        <li class="breadcrumb-item active">Detail Rekap Pengajuan Dana User
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
                            <h4 class="card-title">Detail Rekap Pengajuan Dana Belanja</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-rekap')}}" class="btn btn-warning">
                                        <i class="bx bx-arrow-back"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Nama Toko</label>
                                        <select name="toko_names" class="form-control">
                                            <option value="" selected disabled>Pilih nama toko</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i>
                                        </button>
                                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-detail-rekap')}}"
                                           class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            {{--                            <input type="hidden" id="tableDetailRekapPengajuanDanaUser" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover"
                                   id="table-detail-rekap-pengajuan-dana-user">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-15p">Nama Toko</th>
                                    <th class="w-10p">Nama Item</th>
                                    <th class="w-5p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-10p">Harga Satuan (Rp)</th>
                                    <th class="w-10p">Harga Total (Rp)</th>
                                    <th class="w-10p">Status Transaksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>Lunas/Hutang</td>
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
    <script>

    </script>
@endpush
