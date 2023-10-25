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
                            <h4 class="card-title">Rekap Pengajuan Dana</h4>
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
                    <div class="card-body">
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
                        <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-index')}}"
                           class="btn btn-outline-primary">Pengajuan Dana</a>
                        <a href=" "
                           class="btn btn-outline-primary">Rekap Pengajuan Dana</a>
                        <button class="btn btn-success">Dana Disetujui</button>
                    </div>



                    <form action="">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <input type="hidden" id="totalTerpilih" value="{{$danaDisetujui->count()}}">
                                <table class="table datatables table-bordered table-hover table-data" id="table-dana-disetuji-administrasi">
                                    <thead>
                                    <tr class="text-center">

                                        <th class="w-3p">No</th>
                                        <th class="w-10p">Nama Toko</th>
                                        <th class="w-5p">Nama Item</th>
                                        <th class="w-8p">Kuantitas</th>
                                        <th class="w-10p">Satuan</th>
                                        <th class="w-10p">Harga Satuan <br> (Rp.)</th>
                                        <th class="w-10p">Harga Total <br> (Rp)</th>
                                        <th class="w-10p">Status Transaksi</th>
                                        <th class="w-10p">Detail</th>
{{--                                        <th class="w-10p">Akun Perkiraan <input type="checkbox" id="check-all"></th>--}}
{{--                                        <th class="w-10p">Approve Keuangan <input type="checkbox" id="check-all"></th>--}}
                                    </tr>
                                    </thead>
                                    <tbody id="show-data-rencana-kerja-terpilih">
                                    @php
                                        $totalLunas = 0;
                                        $totalHutang = 0;
                                    @endphp
                                    @forelse ($danaDisetujui as $item)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->toko}}</td>
                                            <td>{{$item->item}}</td>
                                            <td>{{$item->kuantitas}}</td>
                                            <td>{{$item->satuan}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>@currency($item->kuantitas * $item->harga)</td>
                                            @if($item->status_pimpinan == null)
                                                <td><a class="badge bg-warning" style="color: #ffffff">Required</a></td>
                                            @elseif($item->status_pimpinan == 1)
                                                <td><a class="badge bg-success" style="color: #ffffff">Disetujui Pimpinan</a></td>
                                            @endif
                                            <td>
                                                @if($item->status_keuangan != 3)
                                                    <a href="{{ route('finance-accounting-menu-keuangan-administrasi-dana-ditransfer', $item->id) }}" class="btn btn-secondary" id="btn-setujui-{{ $item->id }}" onclick="changeButtonColor('btn-setujui-{{ $item->id }}'); this.disabled=true;">
                                                        <i class="bx bx-check-circle"></i> Transfer Dana
                                                    </a>
                                                @endif
                                                @if($item->status_keuangan != 4)
                                                    <a href="{{ route('finance-accounting-menu-keuangan-administrasi-dana-chas', $item->id) }}" class="btn btn-primary" id="btn-tolak-{{ $item->id }}" onclick="changeButtonColor('btn-tolak-{{ $item->id }}'); this.disabled=true;">
                                                        <i class="bx bx-x-circle"></i> Dana Khas
                                                    </a>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1"
                                                        title="view"
                                                        data-toggle="modal" data-target="#">
                                                        <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengiriman-dana', $item->id)}}"
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
{{--                        <div class="card-footer">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">Total Cash</label>--}}
{{--                                        <input type="text" class="form-control" placeholder="Rp" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">Total Hutang</label>--}}
{{--                                        <input type="text" class="form-control" placeholder="Rp" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">Total Pengajuan Dana</label>--}}
{{--                                        <input type="text" class="form-control" placeholder="Rp" readonly>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="float-right">--}}
{{--                                        <button class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{--    @include('admin.finance-accounting.menu-keuangan.administrasi.rekap-penagihan-transaksi.modal')--}}
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#table-dana-disetuji-administrasi").DataTable();
        });
    </script>
@endpush
