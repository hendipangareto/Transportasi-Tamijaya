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
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
            <li class=" nav-item  @if (Request::segment(2) == 'dashboard' || Request::segment(2) == 'dashboard-customer') open @endif">
                <a href="index.html"><i class="bx bx-home-alt"></i><span class="menu-title">Dashboard</span></a>
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
                <li class="nav-item @if (Request::segment(2) == 'master-data' && Request::segment(3) !== 'armada') open @endif">
                    <a href="index.html"><i class="bx bx-folder"></i><span class="menu-title">Master
                            Data</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'destination-wisata') class="active" @endif>
                            <a href="{{ route('destination-wisata.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Destinasi
                                    Wisata</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'route-wisata') class="active" @endif>
                            <a href="{{ route('route-wisata.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Rute Wisata</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'bus') class="active" @endif>
                            <a href="{{ route('bus.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Bus</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'pick-point') class="active" @endif>
                            <a href="{{ route('pick-point.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Titik Penjemputan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'facility') class="active" @endif>
                            <a href="{{ route('facility.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Fasilitas</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'salary') class="active" @endif>
                            <a href="{{ route('salary.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Gaji</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'office') class="active" @endif>
                            <a href="{{ route('office.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Kantor</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'service') class="active" @endif>
                            <a href="{{ route('service.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Layanan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'schedule') class="active" @endif>
                            <a href="{{ route('schedule.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Jadwal</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'day-off') class="active" @endif>
                            <a href="{{ route('day-off.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Hari Libur</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'department') class="active" @endif>
                            <a href="{{ route('department.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Department</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'position') class="active" @endif>
                            <a href="{{ route('position.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Jabatan</span></a>
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
                    </ul>
                </li>
            @endif

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

            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3)
                <li class=" navigation-header"><span>Management Customer</span>
                </li>

                <li class=" nav-item @if (Request::segment(3) == 'customer') active @endif"><a
                        href="{{ route('customer.index') }}"><i class="bx bx-group"></i><span
                            class="menu-title">Data Customer</span></a>
                </li>
                <li class=" nav-item @if (Request::segment(3) == 'inbox') active @endif"><a
                        href="{{ route('inbox.index') }}"><i class="bx bxs-inbox"></i><span
                            class="menu-title">Inbox</span></a>
                </li>
            @endif


            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 5)
                <li class=" navigation-header"><span>Transaksi</span>
                </li>
                <li class=" nav-item"><a href="index.html"><i class="bx bx-calendar-event"></i><span
                            class="menu-title">Penjadwalan Bus</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(4) == 'schedule-pariwisata') class="active" @endif>
                            <a href="{{ route('schedule-pariwisata.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Pariwisata</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'schedule-reguler') class="active" @endif>
                            <a href="{{ route('schedule-reguler.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Reguler</span></a>
                        </li>
                        {{-- <li @if (Request::segment(4) == 'schedule-reguler') class="active" @endif>
                        <a href="{{ route('schedule-reguler.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item ">Table Jadwal</span></a>
                    </li> --}}
                    </ul>
                </li>
                <li class=" nav-item"><a href="index.html"><i class="bx bx-table"></i><span
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
                <li class=" nav-item"><a href="index.html"><i class="bx bx-sync"></i><span
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
                <li class=" nav-item"><a href="index.html"><i class="bx bx-add-to-queue"></i><span
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
                <li class=" nav-item"><a href="index.html"><i class="bx bx-file"></i><span
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
                <li class=" nav-item"><a href="index.html"><i class="bx bx-folder"></i><span
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
                <li class=" nav-item"><a href="index.html"><i class="bx bx-file"></i><span
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
                <li class=" navigation-header"><span>Human Resource</span>
                </li>
                <li class="nav-item @if (Request::segment(2) == 'human-resource') open @endif">
                    <a href="index.html"><i class="bx bxs-group"></i><span class="menu-title">Manajemen
                            Karyawan</span></a>
                    <ul class="menu-content">
                        <li @if (Request::segment(3) == 'master-employee-list-data') class="active" @endif>
                            <a href="{{ route('human-resource-master-employee-list-data') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item ">Master
                                    Karyawan</span></a>
                        </li>
                        <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                            <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item ">Data
                                    Karyawan</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'driver-conductor') class="active" @endif>
                            <a href="{{ route('driver-conductor.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item">Data
                                    Supir & Kernet</span></a>
                        </li>
                        <li @if (Request::segment(3) == 'agent') class="active" @endif>
                            <a href="{{ route('agent.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Data
                                    Agent</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- <li class=" nav-item"><a href="index.html"><i class="bx bx-money"></i><span
                        class="menu-title">Payroll</span></a>
                <ul class="menu-content">
                    <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item ">Pangkat</span></a>
                    </li>
                    <li @if (Request::segment(4) == 'address-location') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item">Penggajian</span></a>
                    </li>
                    <li @if (Request::segment(4) == 'address-location') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item">Komisi</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="bx bx-trophy"></i><span
                        class="menu-title">Achievement</span></a>
                <ul class="menu-content">
                    <li @if (Request::segment(4) == 'about-us') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item ">Karyawan</span></a>
                    </li>
                    <li @if (Request::segment(4) == 'address-location') class="active" @endif>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">Supir</span></a>
                    </li>
                </ul>
            </li> --}}

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
