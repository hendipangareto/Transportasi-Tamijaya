<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo"><img class="logo" src="{{ asset('images/logo-icon.png') }}"/>
                    </div>
                    <h2 class="brand-text mb-0 ">Tami Jaya</h2>
                </a></li>
            <li class="nav-item nav-toggle "><a class="nav-link modern-nav-toggle pr-0 " data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon "></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
            <li class=" nav-item  @if (Request::segment(2) == 'dashboard' || Request::segment(2) == 'dashboard-customer') open @endif">
                <a href=""><i class="bx bx-home-alt"></i><span class="menu-title">Dashboard</span></a>
                <ul class="menu-content">
                    <li><a @if (Request::segment(2) == 'dashboard') class="text-primary" @endif href=""><i
                                class="bx bx-right-arrow-alt"></i><span class="menu-item">Administrator</span></a>
                    </li>
                    <li><a @if (Request::segment(2) == 'dashboard-customer') class="text-primary" @endif href=""><i
                                class="bx bx-right-arrow-alt"></i><span class="menu-item">Customer</span></a>
                    </li>
                </ul>
            </li>

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
                <li class=" navigation-header"><span>Pengelolaan Armada</span>
                </li>
                <li class=" nav-item @if (Request::segment(3) == 'armada') active @endif"><a
                        href="{{ route('armada.index') }}"><i class="bx bx-bus"></i><span
                            class="menu-title">Data Armada</span></a>
                </li>
            @endif
            {{-- <li class=" nav-item @if (Request::segment(3) == 'inbox') active @endif"><a href=""><i class="bx bx-history"></i><span
                        class="menu-title">Historis
                        Armada</span></a>
            </li> --}}

            {{-- <li class=" navigation-header"><span>Repairs & Maintenance</span>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="bx bxs-component"></i><span
                        class="menu-title">Spare
                        Part</span></a>
                <ul class="menu-content">
                    <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item ">Data
                                Spare
                                Part</span></a>
                    </li>
                    <li @if (Request::segment(4) == 'our-story') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item ">Pengadaan Spare
                                Part</span></a>
                    </li>
                    <li @if (Request::segment(4) == 'address-location') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">Laporan Spare
                                Part</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="bx bx-cog"></i><span
                        class="menu-title">Pemeliharaan</span></a>
                <ul class="menu-content">
                    <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item ">Data
                                Pemeliharaan</span></a>
                    </li>
                    <li @if (Request::segment(4) == 'address-location') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">Laporan
                                Pemeliharaan</span></a>
                    </li>
                </ul>
            </li> --}}




            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 5)
                {{--                <li class=" navigation-header"><span>Transaksi</span>--}}
                {{--                </li>--}}
                {{--                <li class=" nav-item"><a href=" "><i class="bx bx-calendar-event"></i><span--}}
                {{--                            class="menu-title">Penjadwalan Bus</span></a>--}}
                {{--                    <ul class="menu-content">--}}
                {{--                        <li @if (Request::segment(4) == '') class="active" @endif>--}}
                {{--                            <a href=""><i--}}
                {{--                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Pariwisata</span></a>--}}
                {{--                        </li>--}}
                {{--                        <li @if (Request::segment(4) == 'schedule-regule') class="active" @endif>--}}
                {{--                            <a href=""><i--}}
                {{--                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Reguler</span></a>--}}
                {{--                        </li>--}}
                {{--                        --}}{{-- <li @if (Request::segment(4) == 'schedule-reguler') class="active" @endif>--}}
                {{--                        <a href="{{ route('schedule-reguler.index') }}"><i class="bx bx-right-arrow-alt"></i><span--}}
                {{--                                class="menu-item ">Table Jadwal</span></a>--}}
                {{--                    </li> --}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                <li class=" nav-item"><a href=""><i class="bx bx-table"></i><span
                            class="menu-title">Data Transaksi</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(2) == 'transaction' && Request::segment(3) == 'pariwisata' && Request::segment(4) == 'data-transaction-pariwisata') class="active" @endif>
                            <a href="{{ route('data-transaction-pariwisata.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Pariwisata</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'transaction' && Request::segment(3) == 'reguler' && Request::segment(4) == 'data-transaction-reguler') class="active" @endif>
                            <a href="{{ route('data-transaction-reguler.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Reguler</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href=" "><i class="bx bx-sync"></i><span
                            class="menu-title">Reschedule/Cancelation</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Pariwisata</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'transaction' && Request::segment(3) == 'reguler' && Request::segment(4) == 'reschedule-reguler') class="active" @endif>
                            <a href="{{ route('reschedule-reguler.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Reguler</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href=" "><i class="bx bx-add-to-queue"></i><span
                            class="menu-title">Input Transaksi</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(2) == 'transaction' && Request::segment(3) == 'pariwisata' && Request::segment(4) == 'booking-pariwisata') class="active" @endif>
                            <a href="{{ route('booking-pariwisata.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Pariwisata</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'transaction' && Request::segment(3) == 'reguler' && Request::segment(4) == 'booking-reguler') class="active" @endif>
                            <a href="{{ route('booking-reguler.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Reguler</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href=" "><i class="bx bx-file"></i><span
                            class="menu-title">Laporan Transaksi</span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Pariwisata</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'transaction' && Request::segment(3) == 'report-transaction-reguler' && Request::segment(4) == 'booking') class="active" @endif>
                            <a href="{{ route('report-transaction-reguler.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Reguler</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            {{--Menu Marketing Ticketing Peter--}}
            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 4)
                <li class=" navigation-header"><span>Marketing Ticketing</span>
                </li>
                <li class=" nav-item"><a href=" "><i class='bx bx-run' ></i><span
                            class="menu-title">Pemandu Perjalanan</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item @if (Request::segment(4) == 'perjalanan-bus-reguler') active @endif"><a
                                href="{{ route('marketing-ticketing-pemandu-perjalanan-perjalanan-bus-reguler-index') }}"><i
                                    class='bx bx-car'></i><span
                                    class="menu-title">Perjalanan Bus Reguler</span></a>
                        </li>
                        <li class=" nav-item"><a href=" "><i class='bx bx-user-check'></i><span
                                    class="menu-title">Checklist Penumpang</span></a>
                            <ul class="menu-content">
                                <li class=" nav-item @if (Request::segment(5) == 'executive') active @endif"><a
                                        href="{{ route('marketing-ticketing-checklist-penumpang-executive-index') }}"><i
                                            class='bx bx-right-arrow-alt'></i><span
                                            class="menu-title">Executive Class</span></a>
                                </li>
                                <li class=" nav-item @if (Request::segment(5) == 'suites') active @endif"><a
                                        href="{{ route('marketing-ticketing-checklist-penumpang-suites-index') }}"><i
                                            class='bx bx-right-arrow-alt'></i><span
                                            class="menu-title">Suites Class</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href=" "><i class='bx bx-file'></i><span
                                    class="menu-title">Laporan</span></a>
                            <ul class="menu-content">
                                <li class=" nav-item @if (Request::segment(5) == 'laporan-dana') active @endif"><a
                                        href="{{route('marketing-ticketing-laporan-laporan-dana-index')}}"><i class='bx bx-right-arrow-alt'></i><span
                                            class="menu-title">Laporan Dana</span></a>
                                </li>
                                <li class=" nav-item @if (Request::segment(5) == 'rekap-laporan-dana') active @endif"><a
                                        href="{{route('marketing-ticketing-laporan-rekap-laporan-dana-index')}}"><i class='bx bx-right-arrow-alt'></i><span
                                            class="menu-title">Rekap Laporan Dana</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href=" "><i class='bx bx-infinite'></i><span
                            class="menu-title">Petugas Penagihan</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item @if (Request::segment(4) == 'transaction-agent') active @endif"><a
                                href="{{route('marketing-ticketing-petugas-penagihan-transaction-index')}}"><i
                                    class='bx bx-right-arrow-alt'></i><span
                                    class="menu-title">Daftar Transaksi Agent</span></a>
                        </li>
                        <li class=" nav-item @if (Request::segment(4) == 'tagihan-agent') active @endif"><a
                                href="{{route('marketing-ticketing-petugas-penagihan-tagihan-agent-index')}}"><i
                                    class='bx bx-right-arrow-alt'></i><span
                                    class="menu-title">Tagihan Agent</span></a>
                        </li>
                        <li class=" nav-item @if (Request::segment(4) == 'laporan') active @endif"><a
                                href="{{route('marketing-ticketing-petugas-penagihan-laporan-index')}}"><i
                                    class='bx bx-right-arrow-alt'></i><span
                                    class="menu-title">Laporan Agent</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            {{--End Menu Marketing Ticketing--}}

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 4)
                <li class=" navigation-header"><span>Finance & Accounting</span>
                </li>
                <li class=" nav-item @if (Request::segment(3) == 'reservation-transaction') active @endif"><a
                        href="{{ route('reservation-transaction.index') }}"><i class="bx bx-archive-out"></i><span
                            class="menu-title">Reservasi Transaksi</span></a>
                </li>
                <li class=" nav-item @if (Request::segment(3) == 'payment-request') active @endif"><a
                        href="{{ route('payment-request.index') }}"><i class="bx bx-exit"></i><span
                            class="menu-title">Request Pembayaran</span></a>
                </li>
                <li class=" nav-item"><a href=" "><i class='bx bx-customize'></i><span
                            class="menu-title">Master Data</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(4) == 'account') class="active" @endif>
                            <a href="{{ route('account.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Account</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'group-account') class="active" @endif>
                            <a href="{{ route('group-account.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Group Account</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Kas</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'bank') class="active" @endif>
                            <a href="{{ route('bank.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Bank</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Periode</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'balance-aktiva') class="active" @endif>
                            <a href="{{ route('balance-aktiva.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Neraca
                                    Aktiva</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'balance-pasiva') class="active" @endif>
                            <a href="{{ route('balance-pasiva.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Neraca
                                    Pasiva</span></a>
                        </li>
                    </ul>
                </li>
                {{--Adminsitrasi Menu keuangan Peter--}}
                <li class="nav-item"><a href=" "><i class='bx bxs-grid'></i></i><span
                            class="menu-title">Administrasi</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'voucher') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-administrasi-voucher-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Voucher</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'pengajuan-dana') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Pengajuan Dana</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'request-gaji') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-administrasi-request-gaji-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Request Gaji</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'reservasi-transaksi') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-administrasi-reservasi-transaksi-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Reservasi Transaksi</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'detail-pembelajaan') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-administrasi-detail-pembelajaan-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Detail Pembelajaan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'rekap-penagihan-transaksi') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-administrasi-rekap-penagihan-transaksi-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Rekap Penagihan Transaksi</span></a>
                        </li>
                    </ul>
                </li>
                {{--End Adminsitrasi Menu keuangan Peter--}}

                {{--Menu keuangan finance accounting Peter--}}
                <li class="nav-item"><a href=" "><i class='bx bx-wallet'></i></i><span
                            class="menu-title">Finance</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'jurnal-umum') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-finance-jurnal-umum-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Jurnal Umum</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'penerimaan') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-finance-penerimaan-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Penerimaan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'pembayaran') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-finance-pembayaran-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Pembayaran</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'transfer-bank') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-finance-transfer-bank-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Transfer Bank</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'report-finance') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-finance-report-finance-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Report Finance</span></a>
                        </li>
                    </ul>
                </li>
                {{--Kasir--}}
                <li class="nav-item"><a href=""><i class='bx bxl-slack'></i><span
                            class="menu-title">Kasir</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'daftar-transaksi') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-kasir-daftar-transaksi-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Daftar Transaksi</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'laporan-dana-dari-pemandu') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-kasir-laporan-dana-dari-pemandu-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan Dana Pemandu</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'pengiriman-dana') class="active" @endif>
                            <a href="{{ route('finance-accounting-menu-keuangan-kasir-pengiriman-dana-index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Pengirman Dana</span></a>
                        </li>
                    </ul>
                </li>
                {{--Pengajuan Dana User--}}
                <li class="nav-item"><a href=""><i class='bx bx-credit-card-alt'></i><span
                            class="menu-title">Keuangan User</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item @if (Request::segment(2) == 'pengajuan-dana-user') active @endif"><a
                                href="{{ route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index') }}"><i
                                    class='bx bx-right-arrow-alt'></i><span
                                    class="menu-title">Pengajuan Dana User</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'laporan-nota-belanja') class="active" @endif>
                            <a href="{{route('finance-accounting-menu-keuangan-user-laporan-nota-belanja-index')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan Nota Belanja</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"><a href=""><i class='bx bxs-hot'></i><span
                            class="menu-title">Keuangan Pimpinan</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item @if (Request::segment(2) == 'request-pengajuan-dana') active @endif"><a
                                href="{{ route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index') }}"><i
                                    class='bx bx-right-arrow-alt'></i><span
                                    class="menu-title">Request Pengajuan Dana</span></a>
                        </li>
                    </ul>
                </li>

                {{--End Menu keuangan finance accounting--}}

                <li class=" nav-item @if (Request::segment(3) == 'cash-flow') active @endif"><a
                        href="{{ route('cash-flow.index') }}"><i class="bx bx-money"></i><span
                            class="menu-title">Cash Flow</span></a>
                </li>
                <li class=" nav-item @if (Request::segment(3) == 'journal') active @endif"><a
                        href="{{ route('journal.index') }}"><i class="bx bx-transfer-alt"></i><span
                            class="menu-title">Jurnal</span></a>
                </li>

                <li class=" nav-item @if (Request::segment(3) == 'spj-finance') active @endif"><a href="#"><i
                            class="bx bx-file-find"></i><span class="menu-title">SPJ <span style="font-size: 8px">(Surat Pertanggung Jawaban)</span> </span></a>
                </li>
                {{-- <li class=" nav-item @if (Request::segment(3) == 'filter-accounting') active @endif"><a
                        href="{{ route('filter-accounting.index') }}"><i class="bx bx-filter-alt"></i><span
                            class="menu-title">Filter Data</span></a>
                </li> --}}
                <li class=" nav-item"><a href=" "><i class="bx bx-file"></i><span
                            class="menu-title">Laporan</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(4) == 'account') class="active" @endif>
                            <a href="{{ route('account.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan Harian</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'account') class="active" @endif>
                            <a href="{{ route('account.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan Rugi/Laba</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'account') class="active" @endif>
                            <a href="{{ route('account.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan Utang/Piutang</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'account') class="active" @endif>
                            <a href="{{ route('account.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan General Ledger</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                <li class=" navigation-header" ><span>Human Resource</span>
                </li>
                <li class="nav-item @if (Request::segment(2) == 'human-resource') open @endif">
                    <a href=""><i class="bx bxs-group"></i><span class="menu-title">Manajemen
                            Karyawan</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'master-employee-list-data') class="active" @endif>
                            <a href="{{ route('human-resource-master-employee-list-data') }}"><i
                                    class="bx bx-file"></i><span class="menu-item ">Data
                                    Karyawan</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'data-absensi') class="active" @endif>
                            <a href="{{ route('human-resource.pegawai.kinerja-karyawan.list-data-absensi') }}"><i
                                    class="bx bx-file"></i><span class="menu-item">Data Absensi</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'data-gaji-pegawai')  @endif>
                            <a href=""><i class="bx bx-file"></i><span
                                    class="menu-item">Data Gaji Pegawai</span></a>
                            <ul class="menu-content">
                                <li @if (Request::segment(4) == 'daftar-gaji') class="active" @endif>
                                    <a href="{{route('data-gaji-pegawai.human-resource-pegawai-list-data')}}"><i
                                            class="bx bx-right-arrow-alt"></i><span class="menu-item ">Daftar Gaji
                                    Karyawan</span></a>
                                </li>

                                <li @if (Request::segment(4) == 'request-gaji') class="active" @endif>
                                    <a href="{{ route('human-resource.pegawai.request-gaji.list-gaji') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span class="menu-item ">Daftar Request Gaji
                                     </span></a>
                                </li>
                            </ul>
                        </li>
                        <li @if (Request::segment(4) == 'kinerja-karyawan') class="active" @endif>
                            <a href="{{ route('human-resource.pegawai.kinerja-karyawan.list-kinerja') }}"><i
                                    class="bx bx-file"></i><span class="menu-item">Kinerja Karyawan</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'driver-conductor') class="active" @endif>
                            <a href="{{ route('driver-conductor.index') }}">
                                <i class="bx bx-file"></i><span class="menu-item">Sopir & Konduktor</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 7)
                <li class=" navigation-header"><span>USER LOGISTIK</span>
                </li>
                <li class="nav-item @if (Request::segment(2) == 'master-logistik') open @endif">
                    <a href=""><i class="bx bx-cart-alt"></i><span class="menu-title">Pengajuan Pembelian</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(5) == 'list-pengajuan-pembelian') class="active" @endif>
                            <a href="{{ route('master-logistik-list-pengajuan-pembelian') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Pengajuan Pembelian</span></a>
                        </li>
                        <li @if (Request::segment(5) == 'list-rekap-pembelian') class="active" @endif>
                            <a href="{{ route('master-logistik-list-rekap-pembelian') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Rekap Pengajuan Pembelian</span></a>
                        </li>
                        <li @if (Request::segment(5) == 'laporan-pengajuan-pembelian') class="active" @endif>
                            <a href="{{ route('master-logistik-laporan-pengajuan-pembelian') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Laporan Pembelian</span></a>
                        </li>
                    </ul>
                </li>
                <li @if (Request::segment(3) == 'notif-permintaan-logistik') class="active" @endif>
                    <a href="{{route ('master-logistik-notif-permintaan-index')}}"><i class='bx bx-cube-alt'></i><span
                            class="menu-item">Notif Permintaan</span></a>
                </li>
                <li @if (Request::segment(3) == 'logistik-masuk') class="active" @endif>
                    <a href="{{route ('master-logistik-logistik-masuk-index')}}"><i
                            class='bx bx-log-in-circle'></i><span class="menu-item">Logistik Masuk</span></a>
                </li>
                <li @if (Request::segment(3) == 'logistik-keluar') class="active" @endif>
                    <a href="{{route ('master-logistik-logistik-keluar-index')}}"><i
                            class='bx bx-log-out-circle'></i><span class="menu-item">Logistik Keluar</span></a>
                </li>
                <li @if (Request::segment(3) == 'notif-perbaikan-bengkel-luar') class="active" @endif>
                    <a href="{{route ('master-logistik-notif-perbaikan-bengkel-luar-index')}}"><i
                            class='bx bxs-message-alt-dots'></i><span
                            class="menu-item">Perbaikan Bengkel Luar</span></a>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
                <li class=" navigation-header"><span>MANAJEMEN CUSTOMER</span>
                </li>
                <li class=" nav-item @if (Request::segment(3) == 'inbox') active @endif"><a
                        href="{{ route('inbox.index') }}"><i class="bx bxs-inbox"></i><span
                            class="menu-title">Inbox</span></a>
                </li>
            @endif



            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 7)
                <li class=" navigation-header"><span>PERAWATAN & PEMELIHARAAN</span>
                </li>
                <li class="nav-item @if (Request::segment(2) == 'perawatan-pemeliharaan') open @endif">
                    <a href=""><i class="bx bxs-group"></i><span class="menu-title">Sopir</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'check-fisik-layanan') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.sopir.check-fisik-layanan') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Check Fisik Layanan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'daftar-gaji') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.sopir.report-perjalanan') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Report Laporan Perjalanan</span></a>
                        </li>

                    </ul>
                </li>
            @endif
            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 8)
                {{--                <li class=" navigation-header" style="color: darkred"><span>PERAWATAN & PEMELIHARAAN</span>--}}
                {{--                </li>--}}
                <li class="nav-item @if (Request::segment(2) == 'perawatan-pemeliharaan') open @endif">
                    <a href=""><i class="bx bxs-brush"></i><span class="menu-title">Petugas Cuci</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'petugas-cuci') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.petugas-cuci.list-notifikasi-cuci') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Cuci Armada</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 9)
                <li class="nav-item @if (Request::segment(3) == 'supervisor-cuci-mobil') open @endif">
                    <a href=""><i class="bx bxs-group"></i><span class="menu-title">SPV CUCI</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(4) == 'list-approval-laporan') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.supervisor-cuci-mobil.list-approval-laporan') }}"><i
                                    class="bx bx-file"></i><span class="menu-item ">Approval Laporan</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'report-cuci-mobil') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.supervisor-cuci-mobil.report-cuci-mobil') }}"><i
                                    class="bx bxs-file-pdf"></i><span class="menu-item ">Report Cuci Armada</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 11)
                <li class="nav-item @if (Request::segment(3) == 'supervisor-check-armada') open @endif">
                    <a href=""><i class="bx bx-bus"></i><span class="menu-title">SVP CHECK ARMADA</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(4) == 'list-approval-sparepart') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.supervisor-check-armada.list-approval-sparepart') }}"><i
                                    class="bx bx-file"></i><span class="menu-item ">Approval Sparepart</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-approval-logistik-perjalanan') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.supervisor-check-armada.list-approval-logistik-perjalanan') }}"><i
                                    class="bx bx-file"></i><span class="menu-item ">Approval Logistik Perjalanan</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-penentuan-bengkel') class="active" @endif>
                            <a href="{{ route('perawatan-pemeliharaan.supervisor-check-armada.list-penentuan-bengkel') }}"><i
                                    class="bx bx-file"></i><span
                                    class="menu-item ">Penentuan Bengkel Luar/Bengkel</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-approval-logistik-perjalanan') class="active" @endif>
                            <a href=" "><i
                                    class="bx bx-file"></i><span class="menu-item ">Report Kerusakan</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-approval-logistik-perjalanan') class="active" @endif>
                            <a href=" "><i
                                    class="bx bx-file"></i><span class="menu-item ">Report All</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'bengkel-dalam') class="active" @endif>
                            <a href=""><i class="bx bx-file"></i><span
                                    class="menu-item">Bengkel Dalam</span></a>
                            <ul class="menu-content">
                                <li @if (Request::segment(4) == 'list-bengkel-dalam') class="active" @endif>
                                    <a href="{{ route('perawatan-pemeliharaan.bengkel-dalam.list-bengkel-dalam') }} "><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Data Bengkel Dalam</span></a>
                                </li>
                                <li @if (Request::segment(4) == 'checklist-perbaikan-bengkel') class="active" @endif>
                                    <a href="{{ route('perawatan-pemeliharaan.bengkel-dalam.checklist-perbaikan-bengkel') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Checklist Perbaikan Bengkel</span></a>
                                </li>
                                <li @if (Request::segment(4) == 'list-pengajuan-logistik-dalam') class="active" @endif>
                                    <a href="{{ route('perawatan-pemeliharaan.bengkel-dalam.list-pengajuan-logistik') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Pengajuan ke Logistik</span></a>
                                </li>
                            </ul>
                        </li>
                        <li @if (Request::segment(3) == 'bengkel-luar') class="active" @endif>
                            <a href=""><i class="bx bx-file"></i><span
                                    class="menu-item">Bengkel Luar</span></a>
                            <ul class="menu-content">
                                <li @if (Request::segment(4) == 'list-bengkel-luar') class="active" @endif>
                                    <a href="{{ route('perawatan-pemeliharaan.bengkel-dalam.list-bengkel-luar') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Data Bengkel Luar</span></a>
                                </li>
                                <li @if (Request::segment(4) == 'checklist-perbaikan-bengkel-luar') class="active" @endif>
                                    <a href="{{ route('perawatan-pemeliharaan.bengkel-luar.checklist-perbaikan-bengkel-luar') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Checklist Perbaikan Bengkel</span></a>
                                </li>
                                <li @if (Request::segment(4) == 'list-pengajuan-logistik-luar') class="active" @endif>
                                    <a href=" {{ route('perawatan-pemeliharaan.bengkel-luar.laporan-perbaikan-bengkel-luar') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Laporan Perbaikan Bengkel</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
                <li class=" navigation-header"><span>DATA MASTER</span>
                </li>
                <li class="nav-item @if (Request::segment(2) == 'master-data' && Request::segment(3) !== 'armada') open @endif">
                    <a href=""><i class='bx bx-customize'></i><span class="menu-title">
                            MASTER TICKETING</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'bus') class="active" @endif>
                            <a href="{{ route('bus.index') }}"><i class="bx bx-bus"></i><span
                                    class="menu-item">Armada</span></a>
                        </li>

                        <li @if (Request::segment(3) == 'facility') class="active" @endif>
                            <a href="{{ route('facility.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Fasilitas Armada</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'travel-facility') class="active" @endif>
                            <a href="{{ route('travel-facility') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Fasilitas Perjalanan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'province') class="active" @endif>
                            <a href="{{ route('province.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Provinsi</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'city') class="active" @endif>
                            <a href="{{ route('city.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item ">Kota</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'status') class="active" @endif>
                            <a href="{{ route('status.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Status</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'pick-point') class="active" @endif>
                            <a href="{{ route('pick-point.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Titik Penjemputan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'destination-wisata') class="active" @endif>
                            <a href="{{ route('destination-wisata.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Destinasi
                                    Wisata</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'route-wisata') class="active" @endif>
                            <a href="{{ route('route-wisata.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Rute Wisata</span></a>
                        </li>

                        <li @if (Request::segment(3) == 'service') class="active" @endif>
                            <a href="{{ route('service.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Layanan</span></a>
                        </li>
                    </ul>
                </li>
            @endif



            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 6)

                <li class="nav-item @if (Request::segment(2) == 'master-logistik') open @endif">
                    <a href="#"><i class='bx bx-right-indent'></i><span
                            class="menu-title">PERAWATAN & LOGISTIK</span></a>
                    <ul class="menu-content">

                        <li @if (Request::segment(4) == 'list-kategori-barang') class="active" @endif>
                            <a href="{{ route('master-logistik-list-kategori-barang') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Kategori</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-bagian') class="active" @endif>
                            <a href="{{ route('admin.master-logistik.bagian.list-bagian') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Bagian</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-sub-bagian') class="active" @endif>
                            <a href="{{ route('admin.master-logistik.bagian.sub-bagian') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Sub Bagian</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-komponen') class="active" @endif>
                            <a href="{{ route('admin.master-logistik.komponen.list-komponen') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Komponen</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-alat-kerja-bengkel') class="active" @endif>
                            <a href="{{ route('admin.master-logistik.alat-kerja-bengkel.list-alat-kerja-bengkel') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Alat Kerja Bengkel</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-bengkel-luar') class="active" @endif>
                            <a href="{{ route('admin.master-logistik.bengkel-luar.list-bengkel-luar') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Bengkel Luar</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'list-toko') class="active" @endif>
                            <a href="{{route ('admin.master-logistik.toko.list-toko')}}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Toko</span></a>
                        </li>
                    </ul>
                </li>
            @endif


            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)

                <li class="nav-item @if (Request::segment(2) == 'master-keuangan' && Request::segment(3) !== 'armada') open @endif">
                    <a href="#"><i class='bx bx-grid-alt'></i><span class="menu-title">
                           MASTER KEUANGAN</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'akun') class="active" @endif>
                            <a href="{{ route('master-keuangan.akun.list-akun') }}"><i class="bx bx-file"></i><span
                                    class="menu-item">Akun</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'sub-akun') class="active" @endif>
                            <a href="{{ route('master-keuangan.sub-akun.list-sub-akun') }}"><i
                                    class="bx bx-file"></i><span
                                    class="menu-item">Sub-Akun</span></a>
                        </li>

                        <li @if (Request::segment(3) == 'ase') class="active" @endif>
                            <a href=""><i class="bx bx-folder-plus"></i><span
                                    class="menu-item">Aset</span></a>
                            <ul class="menu-content">

                                <li @if (Request::segment(4) == 'tipe-aset') class="active" @endif>
                                    <a href="{{ route('master-keuangan.aset.tipe-aset') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Tipe Aset</span></a>
                                </li>

                                <li @if (Request::segment(4) == 'kategori-aset') class="active" @endif>
                                    <a href="{{ route('master-keuangan.aset.list-kategori-aset') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Kategori Aset</span></a>
                                </li>
                                <li @if (Request::segment(4) == 'data-aset') class="active" @endif>
                                    <a href="{{ route('master-keuangan.aset.list-data-aset') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Data Aset</span></a>
                                </li>
                            </ul>
                        </li>
                        <li @if (Request::segment(4) == 'kategori-pajak') class="active" @endif>
                            <a href="{{ route('master-keuangan.aset.list-kategori-pajak') }}"><i class="bx bx-file"></i><span
                                    class="menu-item">Kategori Pajak</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'metode-penyusutan') class="active" @endif>
                            <a href="{{ route('master-keuangan.metode-penyusutan.list-metode-penyusutan') }}"><i
                                    class="bx bx-file"></i><span
                                    class="menu-item">Metode Penyusutan</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)

                <li class="nav-item @if (Request::segment(2) == 'master-' && Request::segment(3) !== 'armada') open @endif">
                    <a href="#"><i class='bx bx-collapse'></i><span class="menu-title">
                           MASTER HRD</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'office') class="active" @endif>
                            <a href="{{ route('office.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Kantor</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'day-off') class="active" @endif>
                            <a href="{{ route('day-off.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Hari Libur</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'department') class="active" @endif>
                            <a href="{{ route('department.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Departemen</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'position') class="active" @endif>
                            <a href="{{ route('position.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Jabatan</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)

                <li class="nav-item @if (Request::segment(2) == 'master-' && Request::segment(3) !== 'armada') open @endif">
                    <a href="#"><i class='bx bxl-react'></i><span class="menu-title">
                           MASTER UMUM</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item @if (Request::segment(3) == 'customer') active @endif"><a
                                href="{{ route('customer.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-title">Data Customer</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'agent') class="active" @endif>
                            <a href="{{ route('human-resource.agent.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Data
                                    Agent</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'status') class="active" @endif>
                            <a href="{{ route('human-resource.status.list-status') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Status</span></a>
                        </li>
                        <li @if (Request::segment(2) == 'satuan') class="active" @endif>
                            <a href="{{ route('human-resource.status.list-satuan') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Satuan</span></a>
                        </li>

                    </ul>
                </li>
            @endif


            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)

                <li class="nav-item @if (Request::segment(2) == 'master-' && Request::segment(3) !== 'armada') open @endif">
                    <a href="#"><i class='bx bx-collapse'></i><span class="menu-title">
                           TATA KELOLA</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'ase') class="active" @endif>
                            <a href=""><i class="bx bx-calendar"></i><span
                                    class="menu-item">Jadwal Bus</span></a>
                            <ul class="menu-content">

                                <li @if (Request::segment(4) == 'schedule-reguler') class="active" @endif>
                                    <a href="{{ route('schedule-reguler.index') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Bus Regules</span></a>
                                </li>

                                <li @if (Request::segment(3) == 'schedule-pariwisata') class="active" @endif>
                                    <a href="{{ route('admin.transaction.pariwisata.schedule-pariwisata.data') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Bus Parawisata</span></a>
                                </li>
                            </ul>
                        </li>
                        <li @if (Request::segment(2) == 'data-kelola') class="active" @endif>
                            <a href=""><i class="bx bx-file-find"></i><span
                                    class="menu-item">Surat Menyurat</span></a>
                            <ul class="menu-content">

                                <li @if (Request::segment(3) == 'surat-menyurat') class="active" @endif>
                                    <a href="{{ route('data-kelola.surat-menyurat.list-template-surat') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Template Surat</span></a>
                                </li>

                                <li @if (Request::segment(3) == 'dokumen-final') class="active" @endif>
                                    <a href="{{ route('data-kelola.surat-menyurat.list-dokumen-final') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item">Dokumen Final</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif

        @if (Auth::user()->id_role == 1)
                <li class=" navigation-header"><span>Management Users</span>
                </li>
                <li class="nav-item @if (Request::segment(3) == 'role') active @endif"><a
                        href="{{ route('role.index') }}"><i class="bx bx-key"></i><span
                            class="menu-title">Role</span></a>
                </li>
                <li class=" nav-item @if (Request::segment(2) == 'management-user' && Request::segment(3) != 'role') open @endif">
                    <a href="#"><i class="bx bx-user-circle"></i><span class="menu-title">User</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'user-admin') class="active" @endif>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">Super
                                    Admin</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'user-admin') class="active" @endif>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Admin</span></a>
                        </li>
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</div>
