<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Tami Jaya">
    <meta name="keywords" content="zoe, medical">
    <meta name="author" content="Tami Jaya">
    <title>Tami Jaya</title>
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

    {{-- <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/forms/select/select2.min.css')}}"> --}}
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
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
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
    @include('admin.layouts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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


    {{-- GENERAL SCRIPT --}}
    <script>
        // Get Notification
        function formatDateNotif(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
            var monthLabel = new Array();
            monthLabel[0] = "January";
            monthLabel[1] = "February";
            monthLabel[2] = "March";
            monthLabel[3] = "April";
            monthLabel[4] = "May";
            monthLabel[5] = "June";
            monthLabel[6] = "July";
            monthLabel[7] = "August";
            monthLabel[8] = "September";
            monthLabel[9] = "October";
            monthLabel[10] = "November";
            monthLabel[11] = "December";
            var newMonth = monthLabel[d.getMonth()];

            hours = d.setHours();
            minutes = d.setMinutes();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;
            // - ${hours}:${minutes}

            var formatDate = `${day} ${newMonth} ${year}`;
            return formatDate;
        }


        function getNotification() {
            $.ajax({
                url: "/admin/general/notification/create",
                type: 'GET',
                success: function(response) {
                    var data = response.data;
                    var countData = data.length;
                    $("#icon-notif").removeClass('bx-tada')
                    if (countData > 0) {
                        $("#icon-notif").addClass('bx-tada')
                    }
                    $(".count-notification").text(countData)
                    var html = ``;
                    data.forEach(notification => {
                        html +=
                            `<li class="scrollable-container media-list py-0"><a class="d-flex justify-content-between" href="javascript:void(0)"> <div class="media d-flex align-items-center"> <div class="media-left pr-0"> <div class="avatar mr-1 m-0"><img src="{{ asset('images/logo-icon.png') }}" alt="avatar" height="39" width="39"></div> </div> <div class="media-body" > <h6 class="media-heading">${notification.message}</h6><small class="notification-text">${formatDateNotif(notification.created_at)}</small> </div> </div> </a> </li>`;
                    });
                    $("#notification-body").html(html)


                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        $(document).ready(function() {
            getNotification()
        });
    </script>
    @stack('page-scripts')
</body>

</html>
