@extends('admin.layouts.app')
@section('content-header')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Data Transaksi</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Reschedule & Cancelation
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h4 class="card-title mb-1">Data Transaksi Reguler</h4>
                </div>

                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <style>
                            #table-data-transaction thead tr th {
                                font-size: 11px !important;
                                padding-top: 15px !important;
                                padding-bottom: 15px !important;
                            }

                            #table-data-transaction tbody tr td {
                                font-size: 11px !important;
                            }

                        </style>
                        <div class="table" id="show-data-transaction">
                            {{--  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.transaction.reguler.data-transaction.modal')
    @include('admin.transaction.reguler.reschedule.modal')
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/transaction/index.js') }}"></script>

    <script>
        const numberWithCommas = x => {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        };

        function searchTravel() {
            var tujuanTravel = $("#reschedule-destination").val();
            var dateTravel = $("#reschedule-date").val();
            var typeTravel = $("#reschedule-type_bus").val();

            if (!dateTravel) {
                Toast.fire({
                    icon: "error",
                    title: "Please choose Date Reschedule",
                });
                return;
            }

            if (dateTravel == $("#reschedule-date_departure").val()) {
                Toast.fire({
                    icon: "error",
                    title: "Plase Check Date Reschedule.",
                });
                return;
            }

            $.ajax({
                type: "post",
                url: "/admin/transaction/reguler/booking/check-schedule",
                data: {
                    tujuanTravel,
                    dateTravel,
                    typeTravel
                },
                success: function(response) {
                    const {
                        schedule,
                        seat
                    } = response;

                    if (schedule?.length) {
                        $(`#reguler-schedule-not-available`).LoadingOverlay("show");
                        $(`#seat-selection`).LoadingOverlay("show");
                        $.ajax({
                            type: "post",
                            url: "/admin/transaction/reguler/booking/pick-seat",
                            data: {
                                typeTravel: schedule[0].armada_type
                            },
                            success: function(response) {
                                $("#reguler-schedule-not-available").hide();
                                $("#seat-selection").show();
                                $("#display-seat").html(response);
                                $("#travel_selected_seat").val("");
                                $(`#seat-selection`).LoadingOverlay("show");

                                var countPassenger = $("#reschedule-total_seats").val();
                                var travel_total_price = $("#reschedule-total_cost").val();
                                $("#travel_passenger").val(countPassenger);
                                $("#travel_total_price").val(
                                    `Rp. ${numberWithCommas(travel_total_price)}`);

                                submission_target = [];

                                $("#travel_type_name").val(schedule[0].armada_type);
                                if (schedule[0].armada_type === "SUITESS") {
                                    $("#id_schedule").val(schedule[0].id);
                                    $("#travel_price").val("Rp. 550.000");
                                    $("#available_seats").html(21);
                                    if (seat?.length) {
                                        $("#available_seats").html(21 - parseInt(seat.length));
                                        seat.map((el) => {
                                            console.log('MASUK SUITESS')
                                            $(`#Suite${el.booking_seats_seat_number}`).attr(
                                                'disabled', true);
                                        });
                                    }
                                } else if (schedule[0].armada_type === "EXECUTIVE") {
                                    $("#id_schedule").val(schedule[0].id);
                                    $("#travel_price").val("Rp. 300.000");
                                    $("#available_seats").html(22);
                                    if (seat?.length) {
                                        $("#available_seats").html(22 - parseInt(seat.length));
                                        seat.map((el) => {
                                            console.log('MASUK EXECUTIVE')
                                            $(`#Executive${el.booking_seats_seat_number}`)
                                                .attr('disabled', true);
                                        });
                                    }

                                }

                            },
                        });
                    } else {
                        $("#seat-selection").hide();
                        $("#reguler-schedule-not-available").show();
                        $("#id_schedule").val('');
                    }



                    $(`#seat-selection`).LoadingOverlay("hide");
                    $(`#reguler-schedule-not-available`).LoadingOverlay("hide");
                },
                error: function(err) {
                    console.log(err);
                },
            });
        }

        var submission_target = [];

        function selectSeat(seat) {
            var isUnchecked = true;

            if (submission_target.includes(seat)) {
                var index = submission_target.indexOf(seat);
                submission_target.splice(index, 1);
                isUnchecked = false;
            }

            var selectedSeatCount = submission_target.length + 1;
            var passengerSeatCount = $("#reschedule-total_seats").val()
            var typeBus = $("#reschedule-type_bus").val();

            if (typeBus == "SUITESS") {
                labelId = 'Suite';
            } else {
                labelId = 'Executive';
            }

            var targetId = `${labelId}${seat}`;

            if (selectedSeatCount > passengerSeatCount) {

                Toast.fire({
                    icon: "error",
                    title: `Maximum Seat select is ${passengerSeatCount}`,
                });

                // // GET ID
                // var checkCash = $(`#${targetId}`).prop("checked");
                // // background: #111;
                // if ($(`#${targetId}`).css('background') == '#111'){
                //     alert('Wis ke Checkt')
                // }
                // console.log('checkCash', checkCash);
                // console.log('targetId', targetId);
                // if (checkCash) {
                $(`#${targetId}`).prop("checked", false)
                // }

                // return;
            } else {
                if (!submission_target.includes(seat) && isUnchecked) {
                    submission_target.push(seat);
                }
            }

            $("#travel_selected_seat").val(submission_target.toString());

        }
    </script>
@endpush
