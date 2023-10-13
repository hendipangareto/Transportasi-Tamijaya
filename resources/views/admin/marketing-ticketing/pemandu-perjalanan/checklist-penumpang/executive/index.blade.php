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
                        <li class="breadcrumb-item active">Executive Class
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
                            <h4 class="card-title">Executive Class</h4>
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-penumpang">+ Tambah Data</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <link href="{{ asset('css/animate-seat.css') }}" rel="stylesheet">
                        <div class="col-md-2" id="display-seat">
                            <div class="bus">
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
                                            <ul class="seats">
                                                <li class="seat disabled">
                                                    <label for="front-2"></label>
                                                </li>
                                            </ul>
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
                                    @php
                                        $row_1 = ['1', '4', '7', '10', '13', '16', '19'];
                                        $row_2 = ['2', '5', '8', '11', '14', '17', '20'];
                                        $row_3 = ['3', '6', '9', '12', '15', '18', '21', '22'];
                                    @endphp
                                    <div class="row">
                                        <div class="col-4">
                                            <ul class="seats" type="ExecutiveC">
                                                @foreach ($row_1 as $row1)
                                                    <li class="seat">
                                                        <input type="checkbox"
                                                               onclick="selectSeat('{{ $row1 }}')"
                                                               id="Executive{{ $row1 }}"/>
                                                        <label
                                                            for="Executive{{ $row1 }}">{{ $row1 }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <ul class="seats" type="ExecutiveB">
                                                @foreach ($row_2 as $row2)
                                                    <li class="seat">
                                                        <input type="checkbox"
                                                               onclick="selectSeat('{{ $row2 }}')"
                                                               id="Executive{{ $row2 }}"/>
                                                        <label
                                                            for="Executive{{ $row2 }}">{{ $row2 }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-4">
                                            <ul class="seats" type="ExecutiveA">
                                                @foreach ($row_3 as $row3)
                                                    <li class="seat">
                                                        <input type="checkbox"
                                                               onclick="selectSeat('{{ $row3 }}')"
                                                               id="Executive{{ $row3 }}"/>
                                                        <label
                                                            for="Executive{{ $row3 }}">{{ $row3 }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row back">
                                        <div class="col-4">
                                            <div class="bus-toilet">
                                                <img src="{{ asset('images/toilet.png') }}"
                                                     class="img-fluid d-block mx-auto" width="32px">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="bus-toilet">
                                                <img src="{{ asset('images/toilet.png') }}"
                                                     class="img-fluid d-block mx-auto" width="32px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bus-exit">
                                    <h6>EXIT</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 mt-1">
                            <div class="table-responsive">
                                <table class="table dataTables table-bordered table-hover">
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

    @include('admin.marketing-ticketing.pemandu-perjalanan.checklist-penumpang.executive.modal')
@endsection

@push('page-scripts')
    <script>

    </script>
@endpush
