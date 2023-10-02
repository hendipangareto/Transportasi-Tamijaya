<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Tami Jaya" />
    <meta name="keywords" content="" />

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tami Jaya Transport</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- CSS Vendors -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel-theme.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <div id="page">
            {{-- Navbar --}}
            @include('layouts.navbars.navbar')

            <!-- Content -->
            @yield('content')

            {{-- Footer --}}
            @include('layouts.footers.footer')

            {{-- Modal Box --}}
            @include('components.modals.modal-login-register')
            @include('components.modals.modal-armada-detail')
        </div>
    </div>


    <!-- JS Base -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}

    <!-- JS Vendors -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <!-- JS Assets -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl-carousel.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/dropdown-select.js') }}"></script> --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>

    <!-- Scripts -->
    <script>
        const toggleForm = () => {
            const container = document.querySelector('.box-login');
            container.classList.toggle('active');
        };
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            function OTPInput() {
                const inputs = document.querySelectorAll('#otp > *[id]');
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key === "Backspace") {
                            inputs[i].value = '';
                            if (i !== 0) inputs[i - 1].focus();
                        } else {
                            if (i === inputs.length - 1 && inputs[i].value !== '') {
                                return true;
                            } else if (event.keyCode > 47 && event.keyCode < 58) {
                                inputs[i].value = event.key;
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            } else if (event.keyCode > 64 && event.keyCode < 91) {
                                inputs[i].value = String.fromCharCode(event.keyCode);
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            }
                        }
                    });
                }
            }
            OTPInput();
        });
    </script>

    <script>
        var password = document.getElementById('password');
        var toggler = document.getElementById('toggler');

        showHidePassword = () => {
            if (password.type == 'password') {
                password.setAttribute('type', 'text');
                toggler.classList.add('fa-eye-slash');
            } else {
                toggler.classList.remove('fa-eye-slash');
                password.setAttribute('type', 'password');
            }
        };

        toggler.addEventListener('click', showHidePassword);
    </script>

    <script>
        if ($('#timer-countdown').length) {
            function countdown(elementName, minutes, seconds) {
                var element, endTime, hours, mins, msLeft, time;

                function twoDigits(n) {
                    return (n <= 9 ? "0" + n : n);
                }

                function updateTimer() {
                    msLeft = endTime - (+new Date);
                    if (msLeft < 1000) {
                        element.innerHTML = "Kirim Ulang OTP";
                    } else {
                        time = new Date(msLeft);
                        hours = time.getUTCHours();
                        mins = time.getUTCMinutes();
                        element.innerHTML = (hours ? hours + ':' + twoDigits(mins) : mins) + ':' + twoDigits(time
                            .getUTCSeconds());
                        setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
                    }
                }
                element = document.getElementById(elementName);
                endTime = (+new Date) + 1000 * (60 * minutes + seconds) + 500;
                updateTimer();
            }
            countdown("timer-countdown", 5, 0);
        }
    </script>
    <script src="{{ asset('script/client/index.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('script/client/index.js') }}"></script>

    @stack('page-scripts')
</body>

</html>
