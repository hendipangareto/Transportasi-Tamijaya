
@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active">Request Pengajuan Dana</li>
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
                            <h4 class="card-title">List Request Pengajuan Dana</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="#" class="btn btn-danger">
                                        <i class="bx bxs-file-pdf"></i> Print Pdf
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
                                        <label for="">Tanggal Pengajuan</label>
                                        <input type="date" name="tanggal_pengajuan" class="form-control">
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
                                            <option value="" selected disabled>Pilih Pic</option>
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
                            <table class="table datatables table-bordered table-hover" id="table-request-pengajuan-dana-pimpinan">
                                <thead>
                                <tr>
                                    <th class="w-3p text-center">No</th>
                                    <th class="w-5p text-center">Tanggal Pengajuan</th>
                                    <th class="w-5p text-center">No Pengajuan</th>
                                    <th class="w-10p text-center">Dana Diajukan (Rp)</th>
                                    <th class="w-15p text-center">PIC</th>
                                    <th class="w-10p text-center">Status Pengajuan Dana</th>
                                    <th class="w-5p text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalLunas = 0;
                                    $totalHutang = 0;
                                @endphp
                                @forelse($dataPengajuanPembelian as $item)

                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_pengajuan }}</td>
                                        <td>{{ $item->kode_pengajuan }}</td>
                                        <td>@currency($item->kuantitas * $item->harga)</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        @if($item->status == null)
                                            <td>
                                                <a href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-disetujui-pengajuan', $item->id) }}" class="badge bg-xs btn-primary btn-flat"><i class="fa fa-check"></i> Setujui</a>
                                                <a href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-ditolak-pengajuan', $item->id) }}" class="badge bg-xs btn-danger btn-flat"><i class="fa"></i> Tolak</a>
                                            </td>
                                        @elseif($item->status == 1)
                                            <td>
                                                <a href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-disetujui-pengajuan', $item->id) }}" class="badge bg-xs btn-primary btn-flat">Di Setujui</a>
                                            </td>
                                        @elseif($item->status == 2)
                                            <td>
                                                <a href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-ditolak-pengajuan', $item->id) }}" class="badge bg-xs btn-danger btn-flat"><i class="bx bx-reject"></i>Di Tolak</a>
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="d-flex">
                                                    <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" title="detail pengajuan">
                                                        <a href="{{route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-approval-pengajuan')}}" class="bx bx-info-circle font-size-base" style="color: white"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data Pengajuan Pembelian.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script>
        // Tambahkan skrip JavaScript jika diperlukan
    </script>
@endpush
