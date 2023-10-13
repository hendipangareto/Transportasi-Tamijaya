@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Penjadwalan Bus</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Pariwisata
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
                            <h4 class="card-title" style="color: black"><b>Tata Kelola </b>| Jadwal Bus Pariwisata</h4>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a target="_blank"
                                       href="{{ route('admin.transaction.pariwisata.schedule-pariwisata.cetak-pdf') }}"
                                       type="button"
                                       class="btn btn-danger text-white mr-1">
                                        <i class="bx bx-printer"></i> Report PDF
                                    </a>
                                    <a target="_blank"
                                       href=""
                                       type="button"
                                       class="btn btn-warning text-white mr-1">
                                        <i class="bx bx-calendar"></i>Kalender
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content mt-3">
                    <div class="card-body card-dashboard">
                        @include('admin.transaction.pariwisata.schedule.display')
                       <div class="row">

                           <div class="col ml-auto">
                               <div class="dropdown float-right">
                                   <label for="" style="color: white">Filter</label><br>
                                   <a href="" class="btn btn-primary mr-1" data-toggle="modal"
                                      data-target="#TambahSurat"><i class="bx bx-plus-circle"></i>Tambah Data</a>
                               </div>

                               @if (session('success'))
                                   <div class="alert alert-success">
                                       {{ session('success') }}
                                   </div>
                               @endif

                               @if (session('error'))
                                   <div class="alert alert-danger">
                                       {{ session('error') }}
                                   </div>
                               @endif
                           </div>
                       </div>
                       @include('admin.transaction.pariwisata.schedule.table')
                        {{--                        <div id="form-data-schedule-pariwisata" style="display: none">--}}
                        {{--                            @include('admin.transaction.pariwisata.schedule.form')--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.transaction.pariwisata.schedule.modal')
@endsection

@push('page-scripts')
{{--    <script src="{{ asset('script/admin/transaction/schedule-pariwisata.js') }}"></script>--}}

<script>
    $(document).ready(function () {
        $("#table-jadwal-pariwisata").DataTable();
    });
</script>
@endpush
