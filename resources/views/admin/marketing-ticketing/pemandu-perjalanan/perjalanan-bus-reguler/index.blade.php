@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Daftar Perjalanan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Bus Reguler
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
                            {{--                            <h4 class="card-title">List Detail Pembelajaan</h4>--}}
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
                                        <label for="">Tanggal Berangkat</label>
                                        <input type="date" name="tgl_berangkat" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Tipe Armada</label>
                                        <select name="tipe_armadas" class="form-control">
                                            <option value="" selected disabled>Pilih tipe armada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Status Perjalanan</label>
                                        <select name="status_perjalanan" class="form-control">
                                            <option value="" selected disabled>Pilih status perjalanan</option>
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
                            {{--                            <input type="hidden" id="tablePerjalananBusReguler" value="{{$data->count()}}">--}}
                            <table class="table datatables table-bordered table-hover"
                                   id="table-perjalanan-bus-reguler">
                                <thead>
                                <tr>
                                    <th class="w-3p">No</th>
                                    <th class="w-5p">Tanggal Berangkat</th>
                                    <th class="w-15p">Tipe Armada</th>
                                    <th class="w-10p">Nopol Armada</th>
                                    <th class="w-15p">Status Perjalanan</th>
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
                                    <td class="text-center">
                                        <div class="d-flex text-center">
                                            <div class="badge-circle badge-circle-sm badge-circle-primary pointer mr-1">
                                                <a href="#" class="bx bx-show-alt" style="color: white"></a>
                                            </div>
                                            {{--                                            <div class="badge-circle badge-circle-sm badge-circle-warning pointer mr-1">--}}
                                            {{--                                                <i class="bx bx-revision" style="color: white"></i>--}}
                                            {{--                                            </div>--}}
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

    {{--    @include('admin.finance-accounting.menu-keuangan.administrasi.detail-pembelajaan.modal')--}}
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
