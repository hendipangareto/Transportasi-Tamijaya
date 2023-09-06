@extends('agent.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Booking Reguler</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Booking Reguler
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
                <div class="card-header  pb-0  d-flex justify-content-between">
                    <h4 class="card-title">Booking Reguler Travel</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <form action="javascript:void(0)" id="form-transaction-reguler" enctype="multipart/form-data">
                            @csrf
                            {{-- START TAB TRAVEL DETAIL --}}

                            <div class="row">
                                <div class="col-6">
                                    <label>Tujuan: <span style="color:red;">*</span></label>
                                    <div class="form-group">
                                        <select id="transaction_travel_detail_tujuan"
                                            name="transaction_travel_detail_tujuan" class="form-control required"
                                            onChange="changeTujuan(this)">
                                            <option value="JOG-DPS">Jogjakarta - Denpasar (JOG ➤ DPS)</option>
                                            <option value="DPS-JOG">Denpasar - Jogjakarta DPS ➤ JOG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Date Departure: <span style="color:red;">*</span></label>
                                    <div class="form-group">
                                        <input type="date" id="transaction_travel_detail_date_departure"
                                            name="transaction_travel_detail_date_departure" class="form-control required"
                                            value="@php
                                                echo date('Y-m-d');
                                            @endphp" min="@__raw_block_1__@">

                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Pick Point: <span style="color:red;">*</span></label>
                                    <div class="form-group">
                                        <select id="transaction_travel_detail_pick_point"
                                            name="transaction_travel_detail_pick_point" class="form-control required">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label>Arrival Point: <span style="color:red;">*</span></label>
                                    <div class="form-group">
                                        <select id="transaction_travel_detail_arrival_point"
                                            name="transaction_travel_detail_arrival_point" class="form-control required">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-warning btn-block" onclick="searchTravel()"><i
                                            class="bx bx-search-alt"></i> Check
                                        Availibility</button>
                                </div>
                            </div>
                            <hr />
                            <div id="reguler-schedule-not-available" style="display: none">
                                <div class="alert alert-secondary text-center font-weight-bold" role="alert">
                                    Sorry, regular schedule is not available. Try another date or destination.
                                </div>
                            </div>
                            {{-- style="display: none" --}}
                            <div id="seat-selection">
                                <h5 style="margin-left: 75px" class="font-weight-bold">Jam Keberangkatan : 11:50 WIB</h5>
                                <div class="d-flex" style="margin-left: 75px">
                                    <h6 class="font-weight-bold mr-2"><i class="bx bx-bus"></i>AB 7561 AS</h6>
                                    <h6 class="font-weight-bold"><i class="bx bx-dashboard"></i>-</h6>

                                </div>
                                <div class="row">
                                    <link href="{{ asset('css/animate-seat.css') }}" rel="stylesheet">
                                    <div class="col-md-6" id="display-seat">
                                        {{-- <div class="col-12 col-md-6 mt-4 mt-md-5"> --}}
                                        <div class="bus">
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
                                    <div class="col-md-6">
                                        <h6 class="font-weight-bold text-uppercase">Detail Seat & Travel Type</h6>
                                        <small class="font-weight-bold text-warning">Available Seats : <span
                                                id="available_seats"></span>
                                            Seat(s)</small>
                                        <hr>
                                        <div class="form-body">
                                            <div class="row">
                                                <input type="hidden" id="id_schedule" name="id_schedule">
                                                <div class="col-md-4">
                                                    <label>Travel Type <span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_type_name" readonly
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_type_name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Travel Price <span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_price" readonly
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_price">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Selected Seat <span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_selected_seat" readonly
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_selected_seat">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Passenger(s) <span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_passenger" readonly
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_passenger">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Total Price <span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_total_price"
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_total_price" readonly>
                                                    <input type="hidden" id="travel_detail_total_cost"
                                                        name="travel_detail_total_cost" readonly>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold text-uppercase">Customer Data</h6>
                                            <button class="btn btn-sm btn-outline-primary py-0"><i
                                                    class="bx bx-user"></i>Member</button>
                                        </div>
                                        <hr>
                                        <div class="form-body">
                                            <div class="row">
                                                <input type="hidden" id="id_schedule" name="id_schedule">
                                                <div class="col-md-4">
                                                    <label>Nama <span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_type_name"
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_type_name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Nomor Telepon<span style="color:red;">*</span></label>
                                                </div>
                                                <div class="col-md-8 form-group ">
                                                    <input type="text" id="travel_price"
                                                        class="form-control form-control-sm bg-transparent required"
                                                        name="travel_price">
                                                </div>

                                                <div class="col-md-12">
                                                    <button class="btn -sm btn-outline-success btn-block"><i class="bx bx-check-circle mr-1"></i>Pesan Travel</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
@endpush
