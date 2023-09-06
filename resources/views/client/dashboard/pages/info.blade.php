<title>Tami Jaya Transport - Informasi Akun</title>

@extends('layouts.app-web')

@section('content')

<div class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <x-dashboard.sidebar />
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card--user-info large">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="person-outline" class="icon"></ion-icon>Kode Customer
                                </h4>
                                <h3>CST-02391</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card--user-info">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="swap-horizontal-outline" class="icon"></ion-icon>Total Transaksi
                                </h4>
                                <h3>15</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card--user-info">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="wallet-outline" class="icon"></ion-icon>Total Pembayaran
                                </h4>
                                <h3>Rp.5.000.000,00</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card--user-info">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="bus-outline" class="icon"></ion-icon>Transaksi Reguler
                                </h4>
                                <h3>11</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card--user-info">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="bus-outline" class="icon"></ion-icon>Transaksi Pariwisata
                                </h4>
                                <h3>4</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection