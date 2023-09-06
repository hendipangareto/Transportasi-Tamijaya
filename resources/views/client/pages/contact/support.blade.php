<title>Tami Jaya Transport - Bantuan</title>

@extends('layouts.app-web')

@section('content')

<x-contact.section-contact-support-header />
<x-contact.section-contact-support :offices="$offices"  />
<x-contact.section-bus-route />
<x-contact.section-contact-form />

@endsection