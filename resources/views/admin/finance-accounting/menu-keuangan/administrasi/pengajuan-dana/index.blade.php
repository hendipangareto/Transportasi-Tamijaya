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
                        <li class="breadcrumb-item active">Administrasi
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
                <div class="card-header justify-content-between" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">Pengajuan Dana</h4>
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
                <div class="card-content pt-1 mt-1">
                    <div class="card-body card-dashboard">
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tanggal Pengajuan</label>
                                        <input type="date" name="date_pengajuan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">No Pengajuan</label>
                                        <select name="no_pengajuan" class="form-control">
                                            <option value="" selected disabled>Pilih no pengajuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">PIC</label>
                                        <select name="pic_pengajuan" class="form-control">
                                            <option value="" selected disabled>Pilih pic pengajuan</option>
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
                    <div class="card-header">
                        <button class="btn btn-primary">Pengajuan Dana</button>
                        <a href=" "
                           class="btn btn-outline-secondary">Rekap Pengajuan Dana</a>
                        <a href="{{route('finance-accounting-menu-keuangan-administrasi-disetujui-pimpinan')}}"
                           class="btn btn-outline-success">Dana Disetujui</a>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">

                            <div class="table-responsive">
                                <input type="hidden" id="totalTerpilih" value="{{$danaUser->count()}}">
                                <table class="table datatables table-bordered table-hover table-data"
                                       id="table-pengajuan-dana-administrasi">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-5p">Tanggal Pengajuan</th>
                                        <th class="w-10p">No Pengajuan</th>
                                        <th class="w-15p">Pic</th>
                                        <th class="w-10p">Dana Diajukan</th>
                                        <th class="w-5p">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody id="show-data-rencana-kerja-terpilih">
                                    @php
                                        $totalLunas = 0;
                                        $totalHutang = 0;
                                    @endphp
                                    @forelse ($danaUser as $item)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->tanggal_pengajuan}}</td>
                                            <td>{{$item->kode_pengajuan}}</td>
                                            <td>{{$item->auth}}</td>
                                            <td>@currency($item->kuantitas * $item->harga)</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1"
                                                        title="view"
                                                        data-toggle="modal" data-target="#">
                                                        <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-detail-Pengajuan', $item->id)}}"
                                                           class="bx bx-show" style="color: white"></a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="15" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    @include('admin.finance-accounting.menu-keuangan.administrasi.rekap-penagihan-transaksi.modal')--}}
        @endsection

        @push('page-scripts')
            <script>

                $(document).ready(function () {
                    $("#table-pengajuan-dana-administrasi").DataTable();
                });
            </script>
    @endpush
