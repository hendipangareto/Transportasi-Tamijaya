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
                        <li class="breadcrumb-item active">Reservasi Transaksi
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
                            <h4 class="card-title">List Reservasi Transaksi</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tanggal Transaksi</label>
                                        <select name="date_transaksi" class="form-control">
                                            <option value="" selected disabled>Pilih bulan/tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Jenis Transaksi</label>
                                        <select name="jenis_transaksi" class="form-control">
                                            <option value="" selected disabled>Pilih jenis transaksi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Pembelian</label>
                                        <select name="bulan_tahu" class="form-control">
                                            <option value="" selected disabled>Pilih status pembelian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Pembayaran</label>
                                        <select name="pic_make" class="form-control">
                                            <option value="" selected disabled>Pilih status pembayaran</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                            {{--                            <input type="hidden" id="tableReservasiTransaksi" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover" id="table-reservasi-transaksi-keuangan">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Tanggal Transaksi</th>
                                    <th class="w-5p">Kode Booking</th>
                                    <th class="w-10p">Jenis Transaksi</th>
                                    <th class="w-10p">Nilai Transaksi (Rp)</th>
                                    <th class="w-5p">Cara Pembelian</th>
                                    <th class="w-5p">Status Transaksi</th>
                                    <th class="w-10p">Status Pemesanan</th>
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
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary pointer" data-toggle="modal" data-target="#modal-detail-reservasi-transaksi">
                                                <i class="bx bx-info-circle font-size-base"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-success pointer" onclick="approve()">
                                                <i class="bx bx-check-circle font-size-base"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-danger pointer" onclick="reject()">
                                                <i class="bx bx-x-circle font-size-base"></i>
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

        @include('admin.finance-accounting.menu-keuangan.administrasi.reservasi-transaksi.modal')
@endsection

@push('page-scripts')
    <script>
        function openModal() {
            $("#modal-add-voucher").modal('show');
        }

       function approve(){
           Swal.fire({
               title: "Yakin akan melakukan APPROVE reservasi?",
               text: "Data yang di approve akan diperbaharui dan masuk ke journal akunting",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Ya, saya yakin!"
           }).then(result => {
               if (result.isConfirmed) {
                   if (id == null) {
                   }
                   $.ajax({
                       url: ``,
                       method: "post",
                       data: {
                           id,
                           action: 'APPROVE'
                       },
                       success: function (response) {
                           Toast.fire({
                               icon: "success",
                               title: response.message,
                           });
                       },
                       error: function (err) {
                           console.log(err);
                       },
                   });
               }
           });
       }

       function reject(){
           Swal.fire({
               title: "Yakin akan melakukan Reject reservasi?",
               text: "Data yang di reject akan dikembalikan ulang",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Ya, saya yakin!"
           }).then(result => {
               if (result.isConfirmed) {
                   if (id == null) {
                   }
                   $.ajax({
                       url: ``,
                       method: "post",
                       data: {
                           id,
                       },
                       success: function (response) {
                           Toast.fire({
                               icon: "success",
                               title: response.message,
                           });
                       },
                       error: function (err) {
                           console.log(err);
                       },
                   });
               }
           });
       }

    </script>
@endpush
