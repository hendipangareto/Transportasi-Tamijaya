<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Tami Jaya">
    <meta name="keywords" content="">
    <meta name="author" content="Tami Jaya">
    <title>Portal Agent Tami Jaya</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/vendors/css/forms/select/select2.css') }}">

    {{-- DATATABLE --}}

    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    @stack('page-styling')
    <style>
        .select2-search--dropdown .select2-search__field {
            outline: none;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #DFE3E7;
            background-image: url(/admin/app-assets/images/pages/arrow-down.png);
            background-position: calc(100% - 12px) 13px, calc(100% - 20px) 13px, 100% 0;
            background-size: 12px 12px, 10px 10px;
            background-repeat: no-repeat;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 1.5rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none;
        }

        .select2-container--default .select2-selection--single {
            outline: none;
        }

        .select2-container {
            width: 100% !important;
        }

    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns navbar-sticky footer-static"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @include('agent.layouts.header')
    @include('agent.layouts.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                @yield('content-header')
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    @include('agent.layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ asset('admin/app-assets/js/scripts/navs/navs.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    <script>
        function searchTransaction() {
            var transaction_report = $("#search-code-transaction").val()
            if (transaction_report == "") {
                Toast.fire({
                    icon: "error",
                    title: "Silahkan lengkapi inputan kode booking!"
                });
                return;
            }

            $.ajax({
                type: "get",
                url: `/agent/report/transaction-report/${transaction_report}/edit`,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        Toast.fire({
                            icon: "error",
                            title: "Kode Booking transaksi tidak ditemukan."
                        });
                        return;
                    }

                    window.location.href =
                        `http://127.0.0.1:8000/agent/report/detail-transaction/${transaction_report}`
                },
                error: function(err) {
                    console.log(err)
                }
            });

        }
    </script>


    {{-- GENERAL SCRIPT --}}
    @stack('page-scripts')
</body>

</html>
