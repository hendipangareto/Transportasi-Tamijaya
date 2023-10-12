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
                        <li class="breadcrumb-item active">Detail Laporan Nota Pembelajaan
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
                            <h4 class="card-title">Detail Laporan Nota Pembelajaan</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-items-barang">
                                        <i class="bx bx-plus-circle"></i> Tambah Data
                                    </button>
                                    <a href="{{route('finance-accounting-menu-keuangan-user-laporan-nota-belanja-index')}}"
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
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tangal Pengajuan</label>
                                        <input type="date" name="" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">No Pengajuan</label>
                                        <select name="" class="form-control" disabled>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Dana Pengajuan</label>
                                        <select name="" class="form-control" disabled>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            {{--                            <input type="hidden" id="tableDetailNotaPembelajaan" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover"
                                   id="table-detail-nota-pembelajaan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-10p">Nama Item</th>
                                    <th class="w-5p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-10p">Harga Satuan (Rp)</th>
                                    <th class="w-10p">Harga Total (Rp)</th>
                                    <th class="w-10p">Status Transaksi</th>
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
                                    <td>#</td>
                                    <td>Lunas/Hutang</td>
                                    <td>
                                        <div
                                            class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer delete-jurnals-umum"
                                            data-id="" title="delete">
                                            <i class="bx bx-trash font-size-base"></i>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Total Nota</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Total Cash</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Total Hutang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Diskon</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="....">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="col-form-label"><b>%</b></label>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="col-form-label"><b>=</b></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">PPN</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="....">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="col-form-label"><b>%</b></label>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="col-form-label"><b>=</b></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Total Belanja</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.finance-accounting.menu-keuangan.user.laporan-nota-belanja.modal')
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
