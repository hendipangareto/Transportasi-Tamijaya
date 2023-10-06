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
                        <li class="breadcrumb-item active">Kasir
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .dashed-line {
            border: none;
            border-top: 1px dashed grey;
            margin: 0;
            padding: 0;
            width: 100%;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">List Daftar Transaksi</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('finance-accounting-menu-keuangan-kasir-daftar-transaksi-index')}}"
                                       class="btn btn-warning">
                                        <i class="bx bx-arrow-back"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>DETAIL PEMESANAN :</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <table width="30%">
                                    <tbody>
                                    <tr>
                                        <td>PEMBAYARAN MELALUI</td>
                                        <td>:</td>
                                        <td>#####</td>
                                    </tr>
                                    <tr>
                                        <td>PEMBAYARAN</td>
                                        <td>:</td>
                                        <td>#####</td>
                                    </tr>
                                    <tr>
                                        <td>CARA PEMBAYARAN</td>
                                        <td>:</td>
                                        <td>#####</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="dashed-line">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>DAFTAR PENUMPANG</h6>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Item</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan (Rp)</th>
                                            <th>Jumlah Harga (Rp)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="dashed-line">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>DETAIL PEMBELIAN</h6>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Item</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan (Rp)</th>
                                            <th>Jumlah Harga (Rp)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr style="background-color: whitesmoke">
                                            <td colspan="4" class="text-center">Total</td>
                                            <td>RP. ######</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">Total</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control money"
                                                           style="font-style: italic"
                                                           placeholder="Total otomatis" value="1.100.000" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">Status Pembayaran</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control money"
                                                       style="font-style: italic"
                                                       placeholder="Total otomatis" value="Lunas" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">Cara Pembayaran</label>
                                            <div class="col-md-4">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected disabled>Pilih cara pembayaran</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="transfer">Transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">Kas / Bank</label>
                                            <div class="col-md-4">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected disabled>Pilih kas / bank</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button class="btn btn-danger"><i class="bx bxs-file-pdf"></i> Cetak Kwitansi</button>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-success mr-1"><i class="bx bx-save"></i> Simpan</button>
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
