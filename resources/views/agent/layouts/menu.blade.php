<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo"><img class="logo" src="{{ asset('images/logo-icon.png') }}" />
                    </div>
                    <h2 class="brand-text mb-0 ">Tami Jaya</h2>
                </a></li>
            <li class="nav-item nav-toggle "><a class="nav-link modern-nav-toggle pr-0 " data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon "></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <style>
        .main-menu.menu-light .navigation li a {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .main-menu.menu-light .navigation>li.nav-item:not(.has-sub) a {
            padding-top: 12px;
            padding-bottom: 12px;
        }

    </style>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
            <li class=" nav-item @if (Request::segment(2) == 'agent-dashboard') active @endif"><a
                    href="{{ route('agent-dashboard.index') }}"><i class="bx bx-home"></i><span
                        class="menu-title">Dashboard</span></a>
            </li>
            <li class=" nav-item @if (Request::segment(2) == 'agent-reservation') active @endif"><a
                    href="{{ route('agent-reservation.index') }}"><i class="bx bx-bus"></i><span
                        class="menu-title">Pemesanan</span></a>
            </li>

            <li class=" nav-item"><a href="index.html"><i class="bx bx-file"></i><span
                        class="menu-title">Laporan</span></a>
                <ul class="menu-content">
                    <li @if (Request::segment(3) == 'schedule-report') class="active" @endif>
                        <a href="{{ route('schedule-report.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item ">Jadwal
                                Harian</span></a>
                    </li>
                    <li @if (Request::segment(3) == 'transaction-report') class="active" @endif>
                        <a href="{{ route('transaction-report.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item ">Transaksi
                                Harian</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item mt-2 ">
                <input type="text" class="form-control form-control-sm" id="search-code-transaction"
                    placeholder="Kode Booking">
                <button type="button" onclick="searchTransaction()" class="btn btn-sm btn-block btn-primary mt-1"><i
                        class="bx bx-search-alt"></i> Cari Pemesanan</button>
            </li>

        </ul>
    </div>
</div>


