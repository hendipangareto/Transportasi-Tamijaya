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
                        <li class="breadcrumb-item active">Voucher
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
                            <h4 class="card-title">List Voucher</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button type="button" class="btn btn-primary" onclick="openModal()">
                                        <i class="bx bx-plus-circle"></i> Tambah Voucher
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bx bxs-file-pdf"></i> Report Pdf
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nilai Voucher</label>
                                        <select name="nilai_v" class="form-control">
                                            <option value="" selected disabled>Pilih nilai voucher</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Dibuat</label>
                                        <input type="date" name="date_make" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PIC Pembuat Voucher</label>
                                        <select name="pic_make" class="form-control">
                                            <option value="" selected disabled>Pilih pic pembuat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Dikeluarkan</label>
                                        <input type="date" name="date_make" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PIC Pengeluar Voucher</label>
                                        <select name="pic_pengeluar" class="form-control">
                                            <option value="" selected disabled>Pilih pic pengeluar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Dipakai</label>
                                        <input type="date" name="date_use" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                       <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i></button>
                                       <a href="#" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            {{--                            <input type="hidden" id="tablesVoucher" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover" id="table-vouchermenu-keuangan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Kode Voucher</th>
                                    <th class="w-5p">Nilai Voucher</th>
                                    <th class="w-5p">Tanggal Dibuat</th>
                                    <th class="w-10p">PIC (Pembuat Voucher)</th>
                                    <th class="w-5p">Jumlah Voucher Dibuat</th>
                                    <th class="w-5p">Tanggal Keluar</th>
                                    <th class="w-10p">PIC (Pengeluar Voucher)</th>
                                    <th class="w-5p">Jumlah Voucher Keluar</th>
                                    <th class="w-5p">Stock Akhir</th>
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
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#modal-detail_voucher">
                                                <i class="bx bx-info-circle font-size-base"></i>
                                            </div>
                                            <div
                                                class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                data-toggle="modal" title="edit"
                                                data-target="#modal-edit-voucher">
                                                <i class="bx bx-edit font-size-base"></i>
                                            </div>
                                            <div
                                                class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer delete-jurnals-umum"
                                                data-id="" title="delete">
                                                <i class="bx bx-trash font-size-base"></i>
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

    @include('admin.finance-accounting.menu-keuangan.administrasi.voucher.modal')
@endsection

@push('page-scripts')
    <script>
        function openModal() {
            $("#modal-add-voucher").modal('show');
        }

        // $(function () {
        //     if (parseInt($("#tablesjurnalUmums").val()) > 0) {
        //         $("#table-jurnal-umum-menu-keuangan").DataTable();
        //     }
        // });
    </script>
@endpush
