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
                        <li class="breadcrumb-item active">Detail Pembelajaan
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
                    <div class="toolbar row">
                        <div class="col-md-12 d-flex">
                            <h5>Form Detail Pembelajaan</h5>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('finance-accounting-menu-keuangan-administrasi-detail-pembelajaan-index')}}"
                                       class="btn btn-warning">
                                        <i class="bx bx-arrow-back"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            {{--                            <input type="hidden" id="tableDetailPembelajaan" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover"
                                   id="table-detail-pembelajaan-keuangan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-15p">Nama Toko</th>
                                    <th class="w-10p">Nama Item</th>
                                    <th class="w-5p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-10p">Harga Satuan</th>
                                    <th class="w-10p">Harga Total</th>
                                    <th class="w-5p">Status Transaksi</th>
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
                                    <td>#</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table style="width: 20%">
                                    <tbody>
                                    <tr>
                                        <td>Dana Diberikan</td>
                                        <td>:</td>
                                        <td>#######</td>
                                    </tr>
                                    <tr>
                                        <td>Total Seluruh Pembelajaan</td>
                                        <td>:</td>
                                        <td>#######</td>
                                    </tr>
                                    <tr>
                                        <td>Total Lunas Cash</td>
                                        <td>:</td>
                                        <td>#######</td>
                                    </tr>
                                    <tr>
                                        <td>Total Hutang</td>
                                        <td>:</td>
                                        <td>#######</td>
                                    </tr>
                                    <tr>
                                        <td>Dana Sisa Kurang</td>
                                        <td>:</td>
                                        <td>#######</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Lampirkan Dokumen</label>
                                      <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="float-right">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal-edit-detail-pembelajaan" title="lanjut">
                                <i class="bx bx-check-circle"></i> Lanjut</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.finance-accounting.menu-keuangan.administrasi.detail-pembelajaan.modal')
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
