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
                        <li class="breadcrumb-item active">Rekap Logistik Masuk
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
                            <h4 class="card-title">Rekap Logistik Masuk</h4>
                        </div>
                    </div>
                </div>
                <div class="card-content pt-1">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified" id="tabDriverConductor" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" id="logbook-masuk-tab-justified"
                                   data-toggle="tab" href="#logbook-masuk-data" role="tab"
                                   aria-controls="logbook-masuk-data"
                                   aria-selected="true">
                                    Logbook
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sparepart-masuk-tab-justified"
                                   data-toggle="tab" href="#sparepart-masuk-data" role="tab"
                                   aria-controls="sparepart-masuk-data"
                                   aria-selected="true">
                                    Sparepart
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="logistik-masuk-tab-justified"
                                   data-toggle="tab" href="#logistik-masuk-data" role="tab"
                                   aria-controls="logistik-masuk-data"
                                   aria-selected="true">
                                    Logistik
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="atk-masuk-tab-justified"
                                   data-toggle="tab" href="#atk-masuk-data" role="tab" aria-controls="atk-masuk-data"
                                   aria-selected="true">
                                    ATK
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <!-- Tab panes 1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="logbook-masuk-data" role="tabpanel"
                                 aria-labelledby="logbook-masuk-tab-justified">
                                @include('admin.master-logistik.logistik-masuk.logbook')
                            </div>
                            <div class="tab-pane" id="sparepart-masuk-data" role="tabpanel"
                                 aria-labelledby="sparepart-masuk-tab-justified">
                                @include('admin.master-logistik.logistik-masuk.sparepart')
                            </div>
                            <div class="tab-pane" id="logistik-masuk-data" role="tabpanel"
                                 aria-labelledby="logistik-masuk-tab-justified">
                                @include('admin.master-logistik.logistik-masuk.logistik')
                            </div>
                            <div class="tab-pane" id="atk-masuk-data" role="tabpanel"
                                 aria-labelledby="atk-masuk-tab-justified">
                                @include('admin.master-logistik.logistik-masuk.atk')
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
