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
                        <li class="breadcrumb-item active">Approval Pengajuan Dana
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
                            <h4 class="card-title">List Approval Pengajuan Dana</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="{{route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index')}}" class="btn btn-warning">
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
                                        <label for="">No Pengajuan</label>
                                        <select name="no_pengajuans" class="form-control">
                                            <option value="" selected disabled>Pilih no pengajuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tangal</label>
                                        <input type="date" name="tanggal_pengajuan" class="form-control">
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

                            <table class="table datatables table-bordered table-hover"
                                   id="table-request-approval-pengajuan-dana-pimpinan">
                                <thead>
                                <tr class="text-center">
                                    <th class="w-3p">No</th>
                                    <th class="w-15p">Nama Toko</th>
                                    <th class="w-10p">Nama Item</th>
                                    <th class="w-5p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-5p">Harga Satuan</th>
                                    <th class="w-5p">Harga Total</th>
                                    <th class="w-5p">Status Transaksi</th>
                                    <th class="w-5p">Approval Pengajuan</th>
                                    <th class="w-5p">Approval Pimpinan</th>
                                </tr>
                                </thead>
                                @php
                                    $no =1;
                                 @endphp

                                <tbody>

                                @foreach($terpilih as $item)
                                    <tr class="text-center">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->toko }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->kuantitas }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>@currency($item->kuantitas * $item->harga)</td>
                                        <td><b style="color: {{ ($item->cara_bayar === 'lunas') ? '#0077ff' : ($item->cara_bayar === 'hutang' ? '#ff7e00' : '') }};  ">{{ $item->cara_bayar }}</b></td>
                                        <td>#</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer" title="detail nota">
                                                    <a href="#" class="bx bx-info-circle font-size-base" style="color: white"></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Total Lunas</label>
                                    <input type="text" class="form-control" placeholder="Rp" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Total Hutang</label>
                                    <input type="text" class="form-control" placeholder="Rp" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Total Pengajuan Dana</label>
                                    <input type="text" class="form-control" placeholder="Rp" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    {{--    @include('admin.finance-accounting.menu-keuangan.user.laporan-nota-belanja.modal')--}}
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
