<title>Tami Jaya Transport - Tentang Kami</title>

@extends('layouts.app-web')

@section('content')
    <x-about.section-about-header />
    <x-about.section-about-services :services="$services" />
    <x-about.section-about-vision-mission />
    <x-global.section-cta />
@endsection


@push('page-scripts')
    <script src="{{ asset('script/client/main.js') }}"></script>
    <script src="{{ asset('script/client/auth.js') }}"></script>
@endpush
