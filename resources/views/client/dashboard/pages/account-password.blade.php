<title>Tami Jaya Transport - Ubah Password</title>

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
                        <div class="card--user-info">
                            <div class="card--user-info__content">
                                <h4>
                                    <ion-icon name="lock-closed-outline" class="icon"></ion-icon>Ubah Password
                                </h4>
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="col-12 col-md-8 mb-3">
                                            <label for="old-password">Password Lama</label>
                                            <input type="password" id="password" name="old_password" required />
                                            <span><i id="toggler" class="far fa-eye text-white"></i></span>
                                        </div>
                                        <div class="col-12 col-md-8 mb-3">
                                            <label for="new-password">Password Baru</label>
                                            <input type="password" id="password" name="new_password" required />
                                            <span><i id="toggler" class="far fa-eye text-white"></i></span>
                                        </div>
                                        <div class="col-12 col-md-8 mb-3">
                                            <label for="confirm-password">Konfirmasi Password Baru</label>
                                            <input type="password" id="confpassword" name="confirm_password" required />
                                            <span><i id="toggler" class="far fa-eye text-white"></i></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection