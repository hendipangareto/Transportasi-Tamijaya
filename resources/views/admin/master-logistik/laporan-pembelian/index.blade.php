@extends('admin.layouts.app')
{{--@section('content-header')--}}
{{--        <div class="content-header-left col-12 mb-2 mt-1">--}}
{{--            <div class="row breadcrumbs-top">--}}
{{--                <div class="col-12">--}}
{{--                    <h5 class="content-header-title float-left pr-1 mb-0">LOGISTIK</h5>--}}
{{--                    <div class="breadcrumb-wrapper col-12">--}}
{{--                        <ol class="breadcrumb p-0 mb-0">--}}
{{--                            <li class="content-header-title float-left pr-1 mb-0">Form Logistik Keluar--}}
{{--                            </li>--}}
{{--                            <a class="content-header-title float-left pr-1 mb-0">LOGISTIK</a>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--@endsection--}}
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="background-color: #00b3ff">
                    <h4 class="card-title" style="color: black"><b>LOGISTIK </b>| Laporan Pembelian</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="defaultFormControlInput" class="form-label">Tanggal Pengajuan</label>
                                                <input type="date" class="form-control" id="defaultFormControlInput"
                                                       placeholder="Auto generate"
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="defaultFormControlInput" class="form-label">No. Pengajuan</label>
                                                <input type="text" class="form-control" id="defaultFormControlInput"
                                                       placeholder=""
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="defaultFormControlInput" class="form-label">Status Laporan</label>
                                                <input type="text" class="form-control" id="defaultFormControlInput"
                                                       placeholder=""
                                                       aria-describedby="defaultFormControlHelp"/>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="defaultFormControlInput" class="form-label"> </label>
                                                <a href="" class="btn btn-danger  mt-2"><i class="bx bx-filter"></i>Filter</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" method="">
                            <div class="table-responsive mt-2" id="show-data-filter-accounting">
                                <table class="table table-bordered table-hover" id="table-armada">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="w-3p">No</th>
                                        <th class="w-3p">Tanggal Pengajuan</th>
                                        <th class="w-3p">No Pengajuan</th>
                                        <th class="w-5p">Dana Diberikan <br> (Rp)</th>
                                        <th class="w-5p">Total Belanja <br> (Rp)</th>
                                        <th class="w-10p">Status Laporan</th>
                                        <th class="w-3p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($detail as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_pengajuan }}</td>
                                        <td>{{ $item->kode_pengajuan }}</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a class="badge-circle badge-circle-sm badge-circle-primary mr-1 pointer text-center"
                                                    href="{{ route('master-logistik-detail-laporan-pengajuan-pembelian', $item->id) }}">
                                                    <i class="bx bx-info-circle font-size-base"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data Laporan Pembelian.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
