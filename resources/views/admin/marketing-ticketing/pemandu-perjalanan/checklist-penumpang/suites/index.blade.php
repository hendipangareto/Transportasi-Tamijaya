@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Checklist Penumpang</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Suites Class
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    {{--    <div class="row">--}}
    {{--        <div class="col-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Hari Tanggal</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Nama Supir 1</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" placeholder="Supir satu" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Jenis Armada</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" placeholder="Executive" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Jam Berangkat</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Nama Supir 2</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" placeholder="Supir dua" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Nopol Armada</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" placeholder="Executive" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Jumlah Penumpang</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="form-group row">--}}
    {{--                                <label for="" class="col-md-4 col-form-label">Nama Kernet</label>--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <input type="text" class="form-control" placeholder="Supir Kernet" readonly>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #00b3ff">
                    <div class="toolbar row ">
                        <div class="col-md-12 d-flex">
                            <h4 class="card-title">Suites Class</h4>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <table width="60%">
                                <tbody>
                                <tr>
                                    <th>Hari/Tanggal</th>
                                    <td>:</td>
                                    <td style="color: red">{{date('Y-m-d')}}</td>
                                </tr>
                                <tr>
                                    <th>Jam Berangkat</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Penumpang</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table width="60%">
                                <tbody>
                                <tr>
                                    <th>Nama Supir 1</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                <tr>
                                    <th>Nama Supir 2</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                <tr>
                                    <th>Nama Kernet</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table width="60%">
                                <tbody>
                                <tr>
                                    <th>Jenis Armada</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                <tr>
                                    <th>Nopol Armada</th>
                                    <td>:</td>
                                    <td style="color: red">$$$$$$$$$</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-add-penumpang-suites">+ Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <link href="{{ asset('css/animate-seat.css') }}" rel="stylesheet">
                        <div class="col-md-2" id="display-seat-suitess">
                            <ul class="nav nav-tabs-bus" style="justify-content: start" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Bottom</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Top</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    {{-- Ground Floor --}}
                                    <h4>Bottom Floor</h4>
                                    <div class="bus ml-0">
                                        <div class="bus-info">
                                            <h5 class="text-center">Suite</h5>
                                        </div>

                                        <div class="bus-door"></div>

                                        <div class="bus-seats">
                                            <div class="row front">
                                                <div class="col-4">
                                                    <ul class="seats">
                                                        <li class="seat disabled">
                                                            <label for="front-1"></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-4">

                                                </div>
                                                <div class="col-4">
                                                    <ul class="seats">
                                                        <li class="seat disabled">
                                                            <label for="front-driver">
                                                                <img src="{{ asset('images/steering-wheel.png') }}"
                                                                     class="img-fluid d-block mx-auto" width="24px">
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <ul class="seats" type="SuiteD">
                                                        @php
                                                            $seat_a = ['1A', '2A', '3A', '4A', '5A', '6A'];
                                                            $seat_b = ['1B', '2B', '3B', '4B', '5B'];
                                                            $seat_c = ['1C', '2C', '3C', '4C', '5C'];
                                                            $seat_d = ['1D', '2D', '3D', '4D', '5D'];
                                                        @endphp
                                                        @foreach ($seat_d as $d_seat)
                                                            <li class="seat">
                                                                <input onclick="selectSeat('{{ $d_seat }}')"
                                                                       type="checkbox" id="Suite{{ $d_seat }}"/>
                                                                <label
                                                                    for="Suite{{ $d_seat }}">{{ $d_seat }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-4">
                                                </div>
                                                <div class="col-4">
                                                    <ul class="seats" type="SuiteB">
                                                        @foreach ($seat_b as $b_seat)
                                                            <li class="seat">
                                                                <input onclick="selectSeat('{{ $b_seat }}')"
                                                                       type="checkbox" id="Suite{{ $b_seat }}"/>
                                                                <label
                                                                    for="Suite{{ $b_seat }}">{{ $b_seat }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    {{-- Top Floor --}}
                                    <h4>Top Floor</h4>
                                    <div class="bus ml-0">
                                        <div class="bus-info">
                                            <h5 class="text-center">Suite</h5>
                                        </div>

                                        <div class="bus-door"></div>
                                        <div class="bus-seats">
                                            <div class="row">
                                                <div class="col-4">
                                                    <ul class="seats" type="SuiteC">
                                                        @foreach ($seat_c as $c_seat)
                                                            <li class="seat">
                                                                <input onclick="selectSeat('{{ $c_seat }}')"
                                                                       type="checkbox" id="Suite{{ $c_seat }}"/>
                                                                <label
                                                                    for="Suite{{ $c_seat }}">{{ $c_seat }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-4">

                                                </div>
                                                <div class="col-4">
                                                    <ul class="seats" type="SuiteA">
                                                        @foreach ($seat_a as $a_seat)
                                                            <li class="seat">
                                                                <input onclick="selectSeat('{{ $a_seat }}')"
                                                                       type="checkbox" id="Suite{{ $a_seat }}"/>
                                                                <label
                                                                    for="Suite{{ $a_seat }}">{{ $a_seat }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-10 mt-1">
                            <div class="table-responsive">
                                <table class="table dataTables table-bordered table-hover"
                                       id="table-ceklist-penumpang-suites">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" class="w-3p">No Kursi</th>
                                        <th rowspan="2" class="w-15p">Nama Penumpang</th>
                                        <th rowspan="2" class="w-5p">Kode Booking</th>
                                        <th rowspan="2" class="w-5p">Status Pembelian Ticket</th>
                                        <th colspan="2" class="w-15p text-center">Titik Antar Jemput</th>
                                        <th rowspan="2" class="w-5p">Ceklist Kehadiran</th>
                                    </tr>
                                    <tr>
                                        <th>Titik Berangkat</th>
                                        <th>Titik Turun</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td colspan="6"><b>Top</b></td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="6"><b>Bottom</b></td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-danger"><i class="bx bxs-file-pdf" style="color: white"></i>
                                    Cetak Manifest
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

    @include('admin.marketing-ticketing.pemandu-perjalanan.checklist-penumpang.suites.modal')
@endsection

@push('page-scripts')
    <script>
        $(function () {
            // if (parseInt($("#tablesjurnalUmums").val()) > 0) {
            $("#table-ceklist-penumpang-suites").DataTable();
            // }
        });
    </script>
@endpush
