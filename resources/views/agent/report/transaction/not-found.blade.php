@extends('agent.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Booking Transaction</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Reservasi Transaksi
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
                    <h4 class="card-title">Detail Transaksi : R018233</h4>
                    <button class="btn btn-warning"><i class="bx bx-arrow-back mr-1"></i>Kembali</button>
                </div>
                <div class="card-content mt-2">
                    <div class="card-body card-dashboard">
                        <h5>Data Reservasi Transaksi Tidak di temukan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
@endpush
