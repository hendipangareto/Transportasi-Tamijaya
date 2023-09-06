@extends('agent.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Laporan</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Jadwal Harian
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
                <div class="card-header  pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Laporan Jadwal Harian</h4>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary" type="button"><i
                                                class="bx bx-calendar"></i></button>
                                    </div>
                                    <input type="date" class="form-control" >
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">Show </button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        {{-- START TAB TRAVEL DETAIL --}}

                        <div class="row">
                            <link href="{{ asset('css/animate-seat.css') }}" rel="stylesheet">
                            <div class="col-md-6" id="display-seat-executive">

                                <h5 class="font-weight-bold">Jam Keberangkatan : 11:50 WIB</h5>
                                <div class="d-flex">
                                    <h6 class="font-weight-bold mr-2"><i class="bx bx-bus"></i>AB 7561 AS</h6>
                                    <h6 class="font-weight-bold"><i class="bx bx-dashboard"></i>-</h6>
                                </div>

                                <div class="bus ml-0">
                                    <div class="bus-info">
                                        <h5 class="text-center">Executive 22 Seats</h5>
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
                                            $row_1 = ['1C', '2C', '3C', '4C', '5C', '6C', '7C'];
                                            $row_2 = ['1B', '2B', '3B', '4B', '5B', '6B', '7B'];
                                            $row_3 = ['1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A'];
                                        @endphp
                                        <div class="row">
                                            <div class="col-4">
                                                <ul class="seats" type="ExecutiveC">
                                                    @foreach ($row_1 as $row1)
                                                        <li class="seat">
                                                            <input type="checkbox"
                                                                onclick="selectSeat('{{ $row1 }}')"
                                                                id="Executive{{ $row1 }}" />
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
                                                                id="Executive{{ $row2 }}" />
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
                                                                id="Executive{{ $row3 }}" />
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
                                        </div>
                                    </div>

                                    <div class="bus-exit">
                                        <h6>EXIT</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" id="display-seat-suitess">

                                <h5 class="font-weight-bold">Jam Keberangkatan : 11:50 WIB</h5>
                                <div class="d-flex">
                                    <h6 class="font-weight-bold mr-2"><i class="bx bx-bus"></i>AB 7561 AS</h6>
                                    <h6 class="font-weight-bold"><i class="bx bx-dashboard"></i>-</h6>
                                </div>

                                <ul class="nav nav-tabs-bus" style="justify-content: start" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Ground</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Top</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        {{-- Ground Floor --}}
                                        <h4>Ground Floor</h4>
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
                                                                        type="checkbox" id="Suite{{ $d_seat }}" />
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
                                                                        type="checkbox" id="Suite{{ $b_seat }}" />
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
                                                                        type="checkbox" id="Suite{{ $c_seat }}" />
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
                                                                        type="checkbox" id="Suite{{ $a_seat }}" />
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

                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
@endpush
