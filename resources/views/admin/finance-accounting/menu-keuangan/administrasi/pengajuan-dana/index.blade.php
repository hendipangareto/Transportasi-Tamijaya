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
                <div class="card-header">
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
                <div class="card-content pt-1">
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
                        <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-rekap')}}" class="btn btn-outline-primary">Rekap Pengajuan Dana</a>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">

                        <div class="table-responsive">
                            <input type="hidden" id="totalTerpilih" value="{{$danaUser->count()}}">
                            <table class="table datatables table-bordered table-hover table-data"
                                   id="table-rekapitulasi-pekerjaan-terpilih">
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
                                                <div class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1" title="view"
                                                     data-toggle="modal" data-target="#">
                                                    <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-detail-Pengajuan', $item->id)}}" class="bx bx-show" style="color: white"></a>
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

{{--                            <div class="table-responsive">--}}
{{--                                <input type="hidden" id="totalTerpilih" value="{{$terpilih->count()}}">--}}
{{--                                <table class="table datatables table-bordered table-hover table-data"--}}
{{--                                       id="table-rekapitulasi-pekerjaan-terpilih">--}}
{{--                                    <thead>--}}
{{--                                    <tr class="text-center">--}}
{{--                                        <th class="w-3p">No</th>--}}
{{--                                        <th class="w-10p">Nama Toko</th>--}}
{{--                                        <th class="w-5p">Nama Item</th>--}}
{{--                                        <th class="w-8p">Kuantitas</th>--}}
{{--                                        <th class="w-10p">Satuan</th>--}}
{{--                                        <th class="w-10p">Harga Satuan <br> (Rp.)</th>--}}
{{--                                        <th class="w-10p">Harga Total <br> (Rp)</th>--}}
{{--                                        <th class="w-10p">Status Transaksi</th>--}}

{{--                                        <th class="w-5p">Action</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody id="show-data-rencana-kerja-terpilih">--}}
{{--                                    @php--}}
{{--                                        $totalLunas = 0;--}}
{{--                                        $totalHutang = 0;--}}
{{--                                    @endphp--}}
{{--                                    @forelse ($terpilih as $item)--}}
{{--                                        <tr class="text-center">--}}
{{--                                            <td>{{$loop->iteration}}</td>--}}
{{--                                            <td>{{$item->toko}}</td>--}}
{{--                                            <td>{{$item->item}}</td>--}}
{{--                                            <td>{{$item->kuantitas}}</td>--}}
{{--                                            <td>{{$item->satuan}}</td>--}}
{{--                                            <td>{{$item->harga}}</td>--}}
{{--                                            <td>@currency($item->kuantitas * $item->harga)</td>--}}

{{--                                            <td>--}}
{{--                                                @if($item->status_pimpinan != 2)--}}
{{--                                                    <a href="{{ route('master-logistik-setujui-pengajuan-pembelian', $item->id) }}"--}}
{{--                                                       class="btn btn-primary" id="btn-setujui-{{ $item->id }}"--}}
{{--                                                       onclick="changeButtonColor('btn-setujui-{{ $item->id }}'); showButton('btn-tolak-{{ $item->id }}'); hideButton('btn-setujui-{{ $item->id }}')">--}}
{{--                                                        <i class="bx bx-check-circle"></i> Setujui--}}
{{--                                                    </a>--}}
{{--                                                @endif--}}
{{--                                                @if($item->status_pimpinan != 1)--}}
{{--                                                    <a href="{{ route('master-logistik-tolak-pengajuan-pembelian', $item->id) }}"--}}
{{--                                                       class="btn btn-danger" id="btn-tolak-{{ $item->id }}"--}}
{{--                                                       onclick="changeButtonColor('btn-tolak-{{ $item->id }}'); showButton('btn-setujui-{{ $item->id }}'); hideButton('btn-tolak-{{ $item->id }}')">--}}
{{--                                                        <i class="bx bx-x-circle"></i> Tolak--}}
{{--                                                    </a>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}

{{--                                            <td>--}}
{{--                                                <div class="row d-flex">--}}
{{--                                                    <div class="col-md-2">--}}
{{--                                                        <form action="{{ route('master-logistik-terpilih-delete-pengajuan-pembelian') }}" method="post" class="mb-1">--}}
{{--                                                            @csrf--}}
{{--                                                            <input type="hidden" name="id_qs" value="{{$item->id}}">--}}
{{--                                                            <button type="submit" class="badge-circle badge-circle-sm badge-circle-danger mr-1 pointer">--}}
{{--                                                                <span class="bx bx-x"></span>--}}
{{--                                                            </button>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-2">--}}
{{--                                                        @php--}}
{{--                                                            if($terpilih->count() > 0){--}}
{{--                                                        @endphp--}}
{{--                                                        <form action="{{route('master-logistik-proses-terpilih-pengajuan-pembelian')}}" class="d-inline" method="post">--}}
{{--                                                            @csrf--}}
{{--                                                            @foreach ($terpilih as $terpilihItem)--}}
{{--                                                                <input type="hidden" name="id_qs" value="{{$terpilihItem->id}}">--}}
{{--                                                            @endforeach--}}
{{--                                                            <button type="submit" class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer" id="btn-submit-pekerjaan-sm">--}}
{{--                                                                <i class="bx bx-check"></i>--}}
{{--                                                            </button>--}}
{{--                                                        </form>--}}
{{--                                                        @php--}}
{{--                                                            }--}}
{{--                                                        @endphp--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <div class="d-flex">--}}
{{--                                                            <a class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-detail', $item->id) }}">--}}
{{--                                                                <i class="bx bx-info-circle font-size-base"></i>--}}
{{--                                                            </a>--}}
{{--                                                            @if ($item->status === 'Request')--}}
{{--                                                                <a class="badge-circle badge-circle-sm badge-circle-success mr-1 pointer" href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-detail', $item->id) }}">--}}
{{--                                                                </a>--}}
{{--                                                            @endif--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}

{{--                                        </tr>--}}
{{--                                    @empty--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="15" class="text-center">Data tidak ditemukan</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforelse--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
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
