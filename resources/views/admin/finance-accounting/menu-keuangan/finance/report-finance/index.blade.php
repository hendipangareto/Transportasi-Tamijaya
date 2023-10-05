@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Finance & Accounting</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Laporan Finance
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5>Laporan Finance</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jurnal Umum</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button class="card-text btn btn-outline-primary" title="lihat laporan" data-toggle="modal"
                            data-target="#modal-jurnal-umum">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Buku Besar</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-ringkasan-buku-besar" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Laba Rugi</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-laba-rugi" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Neraca</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-neraca" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Arus Kas Langsung</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-arus-kas-langsung" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Keseluruhan Jurnal</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-keseluruhan-jurnal" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rincian Buku Besar</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-rincian-buku-besar" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Laba Rugi Multi Periode</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-laba-rugi-multi-periode" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Neraca Multi Periode</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-neraca-multi-periode" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Arus Kas Tak Langsung</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-arus-kas-tak-langsung" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Histori Buku Besar</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-histori-buku-besar" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Proyeksi Kas Perperiode</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-proyeksi-kas-per-periode" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Proyeksi Kas</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-grafik-proyeksi-kas" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">

            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Histori Kas Bank</h5>
                    <button type="button" class="btn btn-secondary">Lihat Laporan</button>
                    <button data-toggle="modal" data-target="#modal-histori-bank" class="card-text btn btn-outline-primary" title="lihat laporan">
                        <i class="bx bx-show-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.jurnal-umum.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.ringkasan-buku-besar.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.rincian-buku-besar.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.histori-buku-besar.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.laba-rugi.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.keseluruhan-jurnal.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.laba-rugi-multi-periode.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.neraca.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.neraca-multi-periode.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.arus-kas-langsung.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.arus-kas-tak-langsung.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.proyeksi-kas-per-periode.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.grafik-proyeksi-kas.modal')
    @include('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.histori-bank.modal')

@endsection

@push('page-scripts')
    <script>
        const searchFocus = document.getElementById('search-focus');
        const keys = [
            {keyCode: 'AltLeft', isTriggered: false},
            {keyCode: 'ControlLeft', isTriggered: false},
        ];

        window.addEventListener('keydown', (e) => {
            keys.forEach((obj) => {
                if (obj.keyCode === e.code) {
                    obj.isTriggered = true;
                }
            });

            const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;

            if (shortcutTriggered) {
                searchFocus.focus();
            }
        });

        window.addEventListener('keyup', (e) => {
            keys.forEach((obj) => {
                if (obj.keyCode === e.code) {
                    obj.isTriggered = false;
                }
            });
        });
    </script>
@endpush
