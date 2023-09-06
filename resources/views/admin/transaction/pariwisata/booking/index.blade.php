@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Booking Pariwisata</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Booking Pariwisata
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
                    <h4 class="card-title">Booking Pariwisata Travel</h4>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">

                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="customer-data-tab" data-toggle="tab" href="#customer-data"
                                    aria-controls="home-align-end" role="tab" aria-selected="true" disabled>
                                    Customer Data
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="travel-detail-tab" href="#travel-detail" data-toggle="tab"
                                    aria-controls="service-align-end" role="tab" aria-selected="false"
                                    style="display: none">
                                    Travel Detail
                                </a>
                            </li>
                            <li id="pill-payment" class="nav-item">
                                <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment"
                                    aria-controls="account-align-end" role="tab" aria-selected="false"
                                    style="display: none">
                                    Payment
                                </a>
                            </li>
                        </ul>
                        <form action="javascript:void(0)" id="form-transaction-pariwisata" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="customer-data" aria-labelledby="customer-data-tab"
                                    role="tabpanel">
                                    @include('admin.transaction.pariwisata.booking.tab.customer')
                                </div>
                                <div class="tab-pane" id="travel-detail" aria-labelledby="travel-detail-tab"
                                    role="tabpanel">
                                    @include('admin.transaction.pariwisata.booking.tab.travel')
                                </div>
                                <div class="tab-pane" id="payment" aria-labelledby="payment-tab" role="tabpanel">
                                    @include('admin.transaction.pariwisata.booking.tab.payment')
                                </div>
                                @include('admin.transaction.pariwisata.booking.tab.offering')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin.transaction.pariwisata.booking.modal')
@endsection

@push('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="{{ asset('script/admin/transaction/pariwisata.js') }}"></script>
@endpush
