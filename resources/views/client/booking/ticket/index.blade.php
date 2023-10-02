<title>Tami Jaya Transport - Armada</title>

@extends('layouts.app-web')

@section('content')
    <style>

        ul {
            padding: 0;
            margin: 0;
        }
        li {
            list-style: none;
        }
        figure {
            margin: 0;
        }

        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
        }
        .app {
            width: 375px;
            height: 667px;
            border: 1px solid #efefef;
            position: relative;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        /* ========== Home ========== */
        .screen-home__location,
        .screen-home__date {
            margin-bottom: 30px;
        }
        .screen-home {
            width: 100%;
            position: absolute;
            z-index: 1;
        }
        .screen-home__form-wrap {
            padding: 0 1rem;
        }
        .screen-home__form {
            padding: 40px 0 0 0;
        }
        .screen-home__location .lable {
            display: flex;
            align-items: center;
        }
        .lable {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .lable .icon {
            margin: 0 10px 0 0;
        }
        .lable .text {
            font-family: roboto;
        }
        .inside-wrap {
            background-color: #f6f5f5;
            /*padding: 10px 0px;*/
            position: relative;
            border-radius: 5px;
        }
        .inside-lable {
            font-size: 0.7rem;
            padding: 0px 0 5px 0;
            display: inline-block;
        }
        .input {
            width: 100%;
            border: 0;
            padding: 8px 0;
            font-size: 1.4rem;
            background: none;
            outline: none;
            color: #000000;
        }
        .from {
            border-bottom: 2px solid #070707;
        }
        .from, .to {
            padding: 8px 15px;
        }
        .rotate-btn {
            position: absolute;
            right: 20px;
            height: 100%;
            display: flex;
            align-items: center;
        }
        .rotate-btn figure {
            margin: 0;
            width: 40px;
            height: 40px;
            background-color: #ffffff;
            border-radius: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #66a1f3;
        }
        .screen-home__date .inside-wrap {
            display: flex;
            padding: 4px 15px;
        }
        .onward {
            width: 50%;
            position: relative;
        }
        .return {
            width: calc(50% - 15px);
            padding-left: 15px;
        }
        .onward:before {
            content: '';
            position: absolute;
            width: 1px;
            height: 35px;
            background-color: #ffffff;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
        }
        .onward,
        .return {
            display: flex;
        }
        .onward .input,
        .return .input {
            width: 37px;
        }
        .mon-day {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-size: 0.7rem;
            padding-left: 13px;
            color: #ffffff;
        }
        .mon-day:before {
            content: "";
            position: absolute;
            left: 0;
            width: 1px;
            height: 20px;
            background-color: #ffffff;
            top: 0;
            bottom: 0;
            margin: auto 0;
        }
        .month {
            padding-top: 4px;
        }
        .day {
            padding-bottom: 4px;
        }
        .inside-lable-wrap {
            display: flex;
        }
        .inside-lable-wrap .inside-lable-col {
            width: 50%;
        }
        .screen-bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px 0;
        }
        .screen-bottom ul {
            display: flex;
            justify-content: space-between;
            padding: 0 15px;
        }
        .screen-home__submit-wrap .screen-home__bus-page {
            background-color: #ffffff;
            width: 46px;
            height: 46px;
            position: relative;
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
            padding: 0;
            border: 3px solid #ffffff;
        }
        .screen-home__submit-wrap .screen-home__bus-page figure {
            height: 26px;
            cursor: pointer;
        }
        .screen-home__submit-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .line {
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: #ffffff;
            z-index: -1;
        }


        .screen-home__recent-search {
            margin-top: 20px;
        }
        .screen-home__rs-col {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            border: 1px solid #c7deff;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }
        .screen-homers-from-to {
            display: flex;
            align-items: center;
        }
        .screen-home__rs-arrow {
            display: inline-block;
            width: 20px;
            height: 1px;
            background-color: #000000;
            margin: 0 10px;
            position: relative;
        }
        .screen-home__rs-arrow:before,
        .screen-home__rs-arrow:after {
            content: "";
            width: 6px;
            height: 1px;
            background-color: #000000;
            position: absolute;
            right: 0;
        }
        .screen-home__rs-arrow:before {
            transform: rotate(45deg);
            top: -2px;
        }
        .screen-home__rs-arrow:after {
            transform: rotate(-45deg);
            top: 2px;
        }


        /* ========== Bus ========== */
        .screen-bus {
            opacity: 0;
        }
        .screen-bus__location-filter-row {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
        }
        .screen-bus__location {
            padding: 1.3rem 15px;
            color: #ffffff;
        }
        .screen-bus__filter {
            padding-right: 1rem;
        }
        .screen-bus__location-row {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }
        .screen-bus__date-row {
            font-size: 0.7rem;
        }
        .screen-bus__center-arrow{
            display: inline-block;
            width: 18px;
            height: 18px;
            background-color: #ffffff;
            border-radius: 100px;
            margin: 0 1.2rem;
        }
        .screen-bus__travels-wrap {
            padding: 1rem 1rem 0 1rem;
        }
        .screen-bus__travels-col {
            box-shadow: 0px 1px 4px rgba(170, 170, 170, 0.25);
            border-radius: 3px;
            padding: 12px;
            border: 1px solid whitesmoke;
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(5px);
        }
        .screen-bus__name-time-seat {
            display: flex;
            justify-content: space-between;
        }
        .screen-bus__name-wrap,
        .screen-bus__time-wrap,
        .screen-bus__seat-wrap {
            width: 33.333%;
        }
        .screen-bus__name-wrap {
            display: flex;
            flex-direction: column;
            font-size: 0.7rem;
        }
        .screen-bus__name {
            margin-bottom: 0.3rem;
        }
        .screen-bus__type,
        .screen-bus__hrs span {
            font-size: 0.6rem;
            color: #cacaca;
        }
        .screen-bus__seat-wrap {
            text-align: right;
            font-size: 0.7rem;
        }
        .screen-bus__count {
            font-size: 0.9rem;
            color: #81e276;
        }
        .screen-bus__time-wrap {
            font-size: 0.7rem;
            display: flex;
            flex-direction: column;
        }
        .screen-bus__time {
            display: flex;
            margin-bottom: 0.3rem;
        }
        .screen-bus__time-arrow-wrap {
            margin: 0 0.7rem;
        }
        .screen-bus__time-arrow {
            display: inline-block;
            width: 15px;
            height: 1px;
            background-color: red;
            position: relative;
        }
        .screen-bus__time-arrow:after,
        .screen-bus__time-arrow:before {
            content: "";
            width: 5px;
            height: 1px;
            background-color: red;
            position: absolute;
            right: 0;
        }
        .screen-bus__time-arrow:after {
            transform: rotate(-45deg);
            top: 2px;
        }
        .screen-bus__time-arrow:before {
            transform: rotate(45deg);
            top: -2px;
        }
        .screen-bus__rating-price-row {
            display: flex;
            justify-content: space-between;
        }
        .screen-bus__rating-price {
            margin-top: 0.5rem;
        }
        .screen-bus__rating-row {
            display: flex;
        }
        .screen-bus__rating-row li {
            margin-right: 5px;
        }
        .screen-bus__rating-row li:last-child {
            margin-right: 0;
        }
        .screen-home__inside-wave {
            width: 0%;
            height: 0%;
            position: absolute;
            border-radius: 100px;
            background-color: #ffffff7d;
            cursor: pointer;
        }
    </style>

    <section class="section armada-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">BUS | Cari & Pesan Tiket Armada Andalan Tamijaya Online  Hari Ini</h3>
                    <div class="card--top-armada">
                        <div class="row">
                            <div class="col-12 col-lg-12">

                                <div id="formdetail">
                                    <div class="screen-home__location">
                                        <div class="lable">
                                            <figure class="icon"><img src="https://i.ibb.co/KwnYdXN/location.png" alt="Location Icon"></figure>
                                            <span class="text">Location Details</span>
                                        </div>
                                        <div class="input-wrap">
                                            <div class="inside-wrap">
                                                <div class="from">
                                                    <span class="inside-lable">From</span>
                                                    <input class="input" type="text" name="from" value="Bangalore">
                                                </div>
                                                <div class="to">
                                                    <span class="inside-lable">To</span>
                                                    <input class="input" type="text" name="to" value="Chennai">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="screen-home__date">
                                        <div class="lable">
                                            <figure class="icon"><img src="https://i.ibb.co/7N5zdnc/calendar.png" alt="Calendar Icon"></figure>
                                            <span class="text">Date Details</span>
                                        </div>
                                        <div class="input-wrap">
                                            <div class="inside-wrap">
                                                <div class="onward">
                                                    <input class="input" type="text" name="onward" value="10">
                                                    <div class="mon-day">
                                                        <span class="month">Dec</span>
                                                        <span class="day">Wed</span>
                                                    </div>
                                                </div>
                                                <div class="return">
                                                    <input class="input" type="text" name="return" value="12">
                                                    <div class="mon-day">
                                                        <span class="month">Dec</span>
                                                        <span class="day">Fri</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inside-lable-wrap">
                                                <div class="inside-lable-col">
                                                    <span class="inside-lable">Onward</span>
                                                </div>
                                                <div class="inside-lable-col">
                                                    <span class="inside-lable">Return</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
{{--                                <img src="{{ asset('images/Bus-Tamijaya.png') }}" class="w-100 img-fluid" alt="Bus Tamijaya">--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section armada-list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme" id="owl-carousel-3">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




