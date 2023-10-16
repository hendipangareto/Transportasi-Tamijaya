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
                        <li class="breadcrumb-item active">Pengajuan Dana User
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
                            <h4 class="card-title">List Pengajuan Dana Belanja User</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-pengajuan-dana-belanja-user">
                                        <i class="bx bx-plus-circle"></i> Tambah Data
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
                                        <label for="">No Penagjuan</label>
                                        <select name="no_pengajuan_filter" class="form-control">
                                            <option value="" selected disabled>Pilih no pengajuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tangal</label>
                                        <input type="date" name="tanggal_filter" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="" style="color: white">Filter</label><br>
                                        <button class="btn btn-outline-primary"> Filter <i class="bx bx-filter"></i>
                                        </button>
                                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index')}}" class="btn btn-outline-secondary"> Reset <i class="bx bx-reset"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-header">
                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index')}}" class="btn btn-primary">Pengajuan Dana</a>
                        <a href="{{route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-rekap')}}" class="btn btn-outline-primary">Rekap</a>
                    </div>
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">

                            <table class="table datatables table-bordered table-hover"
                                   id="table-daftar-transaksi-kasir">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Nama Item</th>
                                    <th class="w-5p">Kuantitas</th>
                                    <th class="w-5p">Satuan</th>
                                    <th class="w-5p">Harga Satuan (Rp)</th>
                                    <th class="w-5p">Harga Total (Rp)</th>
                                    <th class="w-10p">Status Transaksi</th>
                                    <th class="w-5p">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_item }}</td>
                                    <td>{{ $item->kuantitas_item }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->harga_item }}</td>
                                    <td>@currency($item->kuantitas_item * $item->harga_item)</td>
                                    <td>{{ $item->cara_bayar_item }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                 data-toggle="modal"
                                                 data-target="#modal-details-pengajuan-dana-belanja-user">
                                                <i class="bx bx-info-circle font-size-base"></i>
                                            </div>
                                            <div
                                                class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                data-toggle="modal" title="edit"
                                                data-target="#modal-edit-pengajuan-dana-belanja-user">
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
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Data pengajuan data user belum diisi !!</td>
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

    @include('admin.finance-accounting.menu-keuangan.user.pengajuan-dana-user.modal')
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
