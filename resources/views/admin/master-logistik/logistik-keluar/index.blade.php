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
                        <li class="breadcrumb-item active">Rekap Logistik Keluar
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
                            <h4 class="card-title">Rekap Logistik Keluar</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified" id="tabDriverConductor" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="logbook-keluar-tab-justified"
                                   data-toggle="tab" href="#logbook-keluar-data" role="tab"
                                   aria-controls="logbook-keluar-data"
                                   aria-selected="true">
                                    Logbook
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sparepart-keluar-tab-justified"
                                   data-toggle="tab" href="#sparepart-keluar-data" role="tab"
                                   aria-controls="sparepart-keluar-data"
                                   aria-selected="true">
                                    Sparepart
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="logistik-keluar-tab-justified"
                                   data-toggle="tab" href="#logistik-keluar-data" role="tab"
                                   aria-controls="logistik-keluar-data"
                                   aria-selected="true">
                                    Logistik
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="atk-keluar-tab-justified"
                                   data-toggle="tab" href="#atk-keluar-data" role="tab" aria-controls="atk-keluar-data"
                                   aria-selected="true">
                                    ATK
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <!-- Tab panes 1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="logbook-keluar-data" role="tabpanel"
                                 aria-labelledby="logbook-keluar-tab-justified">
                                @include('admin.master-logistik.logistik-keluar.logbook')
                            </div>
                            <div class="tab-pane" id="sparepart-keluar-data" role="tabpanel"
                                 aria-labelledby="sparepart-keluar-tab-justified">
                                @include('admin.master-logistik.logistik-keluar.sparepart')
                            </div>
                            <div class="tab-pane" id="logistik-keluar-data" role="tabpanel"
                                 aria-labelledby="logistik-keluar-tab-justified">
                                @include('admin.master-logistik.logistik-keluar.logistik')
                            </div>
                            <div class="tab-pane" id="atk-keluar-data" role="tabpanel"
                                 aria-labelledby="atk-keluar-tab-justified">
                                @include('admin.master-logistik.logistik-keluar.atk')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')
@endpush
