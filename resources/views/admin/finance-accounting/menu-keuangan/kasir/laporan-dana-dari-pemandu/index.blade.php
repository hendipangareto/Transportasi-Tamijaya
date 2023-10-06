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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">Daftar Laporan Dana Dari Pemandu</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tanggal Laporan</label>
                                        <input type="date" name="laporan_tanggal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Pic Pelapor</label>
                                        <select name="pic_pelapor" class="form-control">
                                            <option value="" selected disabled>Pilih pic pelapor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Pembayaran Dana</label>
                                        <select name="status_pembayaran_dana" class="form-control">
                                            <option value="" selected disabled>Pilih status pembayaran dana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Laporan Dana</label>
                                        <select name="status_laporan_dana" class="form-control">
                                            <option value="" selected disabled>Pilih status laporan dana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            {{--                            <input type="hidden" id="tableDaftarTransaksiKasir" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover"
                                   id="table-daftar-laporan-dana-form-pemandu">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Tanggal Laporan</th>
                                    <th class="w-5p">No Invoice Laporan</th>
                                    <th class="w-15p">Pic Pelapor</th>
                                    <th class="w-5p">Nilai Total Transaksi</th>
                                    <th class="w-10p">Status Sumber Dana</th>
                                    <th class="w-10p">Status Laporan Dana</th>
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
                                    <td>
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1"
                                                 title="print pdf">
                                                <a target="_blank" href="{{route('finance-accounting-menu-keuangan-kasir-laporan-dana-dari-pemandu-print-pdf')}}"
                                                   class="bx bx-show-alt" style="color: white"></a>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-success pointer mr-1"
                                                 onclick="approve()"
                                                 title="approve">
                                                <i class='bx bx-check-circle font-size-base' style="color: white"></i>
                                            </div>
                                            <div class="badge-circle badge-circle-sm badge-circle-danger pointer mr-1"
                                                 title="reject" onclick="reject()">
                                                <a href="#" class="bx bx-x-circle" style="color: white"></a>
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

@endsection

@push('page-scripts')
    <script>
        function approve() {
            Swal.fire({
                title: "Yakin akan melakukan APPROVE reservasi?",
                text: "Data yang di approve akan diperbaharui kembali",
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

        function reject() {
            Swal.fire({
                title: "Yakin akan melakukan Reject?",
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
