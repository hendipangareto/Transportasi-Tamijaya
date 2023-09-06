<!-- Navbar Tab-Desktop Screen -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo-tamijaya.png') }}" class="img-fluid" alt="Logo Tamijaya">
        </a>
        <div class="navbar-right d-flex d-lg-none">
            {{-- <li class="nav-item dropdown" id="login-register-nav-mobile" style="display: none">
                <a class="btn-account dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a type="button" data-toggle="modal" data-target="#LoginRegisterModal">Masuk</a></li>
                    <li><a href="{{ route('coming-soon') }}">Daftar</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="profile-nav-mobile" style="display: none">
                <a class="btn-account dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <ion-icon name="bug-outline" class="icon"></ion-icon>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="" id="title-customer-nick-name" ></a></li>
                    <li><a href="" onclick="logoutCustomer()">Logout</a></li>
                </ul>
            </li> --}}

            <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#navbarHead"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarHead">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item  @if (Route::is('home')) active @endif">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item  @if (Route::is('travel')) active @endif">
                    <a class="nav-link" href="{{ route('travel') }}">Travel</a>
                </li>
                <li class="nav-item @if (Route::is('armada')) active @endif">
                    <a class="nav-link" href="{{ route('armada') }}">Armada</a>
                </li>
                <li class="nav-item @if (Route::is('about')) active @endif">
                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        Kontak
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('support') }}">Bantuan</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn-reservation" href="{{ route('coming-soon') }}">Pesan Tiket</a>
                </li>

                <li class="nav-item dropdown" id="login-register-nav" style="display: none">
                    <a class="btn-account dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" data-target="#LoginRegisterModal">Masuk</a></li>
                        <li><a href="{{ route('coming-soon') }}">Guest</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown" id="profile-nav" style="display: none">
                    <a class="btn-account dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <ion-icon name="person-outline" class="icon"></ion-icon>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('information') }}" id="title-customer-nick-name"></a></li>
                        <li><a href="" onclick="logoutCustomer()">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
