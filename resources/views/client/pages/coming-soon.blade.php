<title>Tami Jaya Transport - Travel</title>

@extends('layouts.app-coming-soon')

@section('content')

<div class="section coming-soon" style="position: relative;top: -30;overflow-y: hidden">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="animation">
                    <lottie-player src="{{ asset('images/bus-coming-soon.json') }}" background="transparent"  speed="1"  style="width: 55%;" class="d-block m-auto" loop autoplay></lottie-player>
                    <div class="animation-content">
                        <h1>Coming Soon</h1>
                        <h4 class="mt-3 mb-5">Mohon tunggu.. Kami sedang mempersiapkan yang terbaik.</h4>
                        <a href="/" class="btn--primary">Kembali ke Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
