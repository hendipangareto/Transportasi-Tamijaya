@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Logistik</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Notifikasi Permintaan Logistik
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
                            <h4 class="card-title">Notifikasi Permintaan Logistik</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="">Armada</label>
                                    <select name="armada_logistik" id="armada_logistik" class="form-control">
                                        <option value="" selected disabled>-Pilih Armada-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="">Tanggal Order</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="">Pic Pemohon</label>
                                    <select name="pic_pemohon_logistik" id="pic_pemohon_logistik" class="form-control">
                                        <option value="" selected disabled>-Pilih Pic pemohon-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-dashboard">
                        <ul class="nav nav-tabs nav-justified" id="tabDriverConductor" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="sparepart-tab-justified"
                                   data-toggle="tab" href="#sparepart-data" role="tab" aria-controls="sparepart-data"
                                   aria-selected="true">
                                    Sparepart
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="logistik-tab-justified"
                                   data-toggle="tab" href="#logistik-data" role="tab" aria-controls="logistik-data"
                                   aria-selected="true">
                                    Logistik
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="atk-tab-justified"
                                   data-toggle="tab" href="#atk-data" role="tab" aria-controls="atk-data"
                                   aria-selected="true">
                                    ATK
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body card-dashboard">
                        <!-- Tab panes 1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="sparepart-data" role="tabpanel"
                                 aria-labelledby="sparepart-tab-justified">
                                @include('admin.master-logistik.notif-permintaan-logistik.sparepart')
                            </div>
                            <div class="tab-pane" id="logistik-data" role="tabpanel"
                                 aria-labelledby="logistik-tab-justified">
                                @include('admin.master-logistik.notif-permintaan-logistik.logistik')
                            </div>
                            <div class="tab-pane" id="atk-data" role="tabpanel"
                                 aria-labelledby="atk-tab-justified">
                                @include('admin.master-logistik.notif-permintaan-logistik.atk')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    @include('admin.finance-accounting.menu-keuangan.kasir.daftar-transaksi.modal')--}}
@endsection

@push('page-scripts')
    @include('admin.master-logistik.notif-permintaan-logistik.script')
@endpush
