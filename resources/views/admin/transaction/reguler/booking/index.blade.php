@extends('admin.layouts.app')
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
                        <form action="javascript:void(0)" id="form-transaction-reguler" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="customer-data" aria-labelledby="customer-data-tab"
                                    role="tabpanel">
                                    @include('admin.transaction.reguler.booking.tab.customer')
                                </div>
                                <div class="tab-pane" id="travel-detail" aria-labelledby="travel-detail-tab"
                                    role="tabpanel">
                                    @include('admin.transaction.reguler.booking.tab.travel')
                                </div>
                                <div class="tab-pane" id="payment" aria-labelledby="payment-tab" role="tabpanel">
                                    @include('admin.transaction.reguler.booking.tab.payment')
                                </div>
                                {{-- <div class="tab-pane" id="summary-booking" aria-labelledby="summary-booking-tab"
                                    role="tabpanel">
                                    @include('admin.transaction.reguler.booking.tab.summary')
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.transaction.reguler.booking.modal')
@push('page-scripts')
    <script src="{{ asset('script/admin/transaction/reguler.js') }}"></script>
@endpush
