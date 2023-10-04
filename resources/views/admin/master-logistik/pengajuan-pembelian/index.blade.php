    @extends('admin.layouts.app')
@section('content-header')
    {{--    <div class="content-header-left col-12 mb-2 mt-1">--}}
    {{--        <div class="row breadcrumbs-top">--}}
    {{--            <div class="col-12">--}}
    {{--                <h5 class="content-header-title float-left pr-1 mb-0">LOGISTIK</h5>--}}
    {{--                <div class="breadcrumb-wrapper col-12">--}}
    {{--                    <ol class="breadcrumb p-0 mb-0">--}}
    {{--                        <li class="content-header-title float-left pr-1 mb-0">Form Logistik Keluar--}}
    {{--                        </li>--}}
    {{--                        <a class="content-header-title float-left pr-1 mb-0">LOGISTIK</a>--}}
    {{--                    </ol>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Pengajuan Pembelian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  pb-0  d-flex justify-content-between">
                                    <h4 class="card-title"></h4>
                                    <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                       data-target="#TambahPengajuanPembelian"><i class="bx bx-plus-circle"></i>   Tambah Data</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <label for="defaultFormControlInput" class="form-label">No Pengajuan</label>
                                                <input type="text" class="form-control" id="defaultFormControlInput"
                                                       placeholder="Auto generate"
                                                       aria-describedby="defaultFormControlHelp" readonly/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="defaultFormControlInput" class="form-label">Tanggal Pengajuan</label>
                                                <input type="date" class="form-control" id="defaultFormControlInput"
                                                       placeholder="John Doe"
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-pengajuan-pembelian">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-3p">Nama Toko</th>
                                        <th class="w-3p">Item</th>
                                        <th class="w-10p">Kuantitas</th>
                                        <th class="w-5p">Satuan</th>
                                        <th class="w-5p">Harga Satuan <br> (Rp)</th>
                                        <th class="w-5p">Harga Total <br> (Rp)</th>
                                        <th class="w-10p">Status Transaksi</th>
                                        <th class="w-10p">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @forelse($data as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->toko }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->kuantitas }}</td>
                                        <td>{{ $item->satuan }}</td>

                                        <td>@currency($item->harga)</td>
                                        <td>{{ $item->harga_total }}</td>
                                        <td>{{ $item->cara_bayar }}</td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#DetailSubBagian-{{ $item->id }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </div>
                                                <div class="badge-circle badge-circle-sm badge-circle-warning mr-1 pointer"
                                                     data-toggle="modal"
                                                     data-target="#UpdateSubBagian-{{ $item->id }}">
                                                    <i class="bx bx-edit font-size-base"></i>
                                                </div>
                                                <a class="badge-circle badge-circle-sm badge-circle-danger pointer"
                                                   href=" ">
                                                    <i class="bx bx-trash font-size-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data Pengajuan Pembelian.</td>
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

    @include('admin.master-logistik.pengajuan-pembelian.modal-tambah')
@endsection
    @push('page-scripts')
        <script>

            $(document).ready(function () {
                $("#table-pengajuan-pembelian").DataTable();
            });


        </script>
    @endpush@endpush
