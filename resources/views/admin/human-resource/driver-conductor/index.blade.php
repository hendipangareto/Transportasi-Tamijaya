@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Human Resource</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Sopir & Kondektur
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
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h4 class="card-title">List Data Sopir & Kondektur</h4>
                    {{-- <button type="button" class="btn btn-primary mr-1" onclick="openModal('driver-conductor','add')"><i
                            class="bx bx-plus-circle"></i> Tambah Data</button> --}}
                </div>
                <div class="card-content pt-1">
                    <div class="card-body ">
                        <ul class="nav nav-tabs nav-justified" id="tabDriverConductor" role="tablist">
                            <li class="nav-item current">
                                <a class="nav-link active" onclick="displayData('driver')" id="driver-tab-justified"
                                    data-toggle="tab" href="#driver-data" role="tab" aria-controls="driver-data"
                                    aria-selected="true">
                                    Sopir
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="displayData('conductor')" id="conductor-tab-justified"
                                    data-toggle="tab" href="#conductor-data" role="tab" aria-controls="conductor-data"
                                    aria-selected="true">
                                    Kondektur
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content pt-1">
                            <div class="tab-pane active" id="driver-data" role="tabpanel"
                                aria-labelledby="driver-tab-justified">
                                  <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="master-employee">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                            </div>
                            <div class="tab-pane" id="conductor-data" role="tabpanel"
                                aria-labelledby="conductor-tab-justified">
                                  <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="master-employee">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('admin.human-resource.driver-conductor.modal') --}}
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/human-resource/driver-conductor.js') }}"></script>
    <script>
    </script>
@endpush
