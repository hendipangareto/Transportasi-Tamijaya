@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Penjadwalan Bus</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Reguler
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
                            <h4 class="card-title" style="color: black"><b>Data Master </b>|  Jadwal Bus Reguler</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button"><i class="bx bx-calendar"></i></button>
                                </div>
                                <select name="param_month" id="param_month" class="form-control">
                                    <option value="">Semua Bulan</option>
                                    @php
                                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    @endphp
                                    @foreach ($months as $key => $month)
                                        <option value="{{ $key + 1 }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="showDataShcedule()" type="button">Show
                                        Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <button type="button" class="btn btn-sm btn-outline-primary mr-1"
                                    id="btn-add-schedule-extra-reguler"
                                    onclick="openModal('schedule-reguler','extra-schedule')"><i class="bx bx-calendar-alt"></i>
                                Jadwal
                                Tambahan</button>
                            <button type="button" class="btn btn-sm btn-primary mr-1" id="btn-add-schedule-reguler"
                                    onclick="openModal('schedule-reguler','add')"><i class="bx bx-plus-circle"></i> Tambah
                                Data</button>
                            <button type="button" style="display:none" class="btn btn-warning text-white mr-1"
                                    id="btn-back-schedule-reguler" onclick="openModal('schedule-reguler','back')"><i
                                    class="bx bx-left-arrow-alt"></i> Kembali</button>


                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive" id="show-data-schedule-reguler">
                            <div class="text-center">
                                <div class="spinner-border mr-3 spinner-border text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <h5 for="">Please Wait.....</h5>
                            </div>
                        </div>
                        <div id="form-data-schedule-reguler" style="display: none">
                            @include(
                                'admin.transaction.reguler.schedule.form'
                            )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.transaction.reguler.schedule.modal')
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/transaction/schedule.js') }}"></script>
    <script>
        function showDataShcedule() {
            var month = $("#param_month").val();
            if (month == "") {
                displayData()
            } else {
                displayDataMonth(month)
            }
        }
    </script>
@endpush
