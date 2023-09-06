<title>Tami Jaya Transport - Beranda</title>

@extends('layouts.app-web')

@section('content')
    <x-home.section-home-header :pickPoints="$pickPoints" :banks="$banks" />
    <x-home.section-home-values />
    <x-home.section-home-news />
    <x-global.section-cta />
    <x-home.section-home-armada :buses="$buses" />
    <x-home.section-home-profile />
@endsection
@push('page-scripts')
    <script src="{{ asset('script/client/main.js') }}"></script>
    <script src="{{ asset('script/client/auth.js') }}"></script>
    <script>

        var reguler = {
            reguler_date_departure: "",
            reguler_pick_point: "",
            reguler_arrival_point: "",
            reguler_destination: "",

        }
        var pariwisata = {
            pariwisata_date_departure: "",
            pariwisata_date_return: "",
            pariwisata_province_from: "",
            pariwisata_province_to: "",
        }

        var reservationBooking = {
            reguler,
            pariwisata
        }


        let PickPointJogja = [];
        let PickPointDenpasar = [];
        var htmlJogja = ``;
        var htmlBali = ``;
        $(document).ready(function() {
            htmlJogja = ``;
            htmlBali = ``;
            $.ajax({
                dataType: "json",
                type: "GET",
                url: "/admin/transaction/reguler/booking/get/master-pick-point",
                delay: 800,
                success: function(data) {
                    PickPointJogja = data.JOGJA;
                    PickPointDenpasar = data.DENPASAR;
                    PickPointJogja.forEach(ppJogja => {
                        htmlJogja +=
                            `<option value="${ppJogja.id}">${ppJogja.text}</option>`;
                    });
                    PickPointDenpasar.forEach(ppBali => {
                        htmlBali +=
                            `<option value="${ppBali.id}">${ppBali.text}</option>`;
                    });


                    $("#reguler_departure_pick_point").html(htmlJogja);
                    $("#reguler_arrival_pick_point").html(htmlBali);
                },
            });

        });
        // Pick Point

        function changeTujuan(e) {
            if (e.value === "JOG-DPS") {
                $("#reguler_departure_pick_point").html(htmlJogja);
                $("#reguler_arrival_pick_point").html(htmlBali);
            } else if (e.value === "DPS-JOG") {
                $("#reguler_departure_pick_point").html(htmlBali);
                $("#reguler_arrival_pick_point").html(htmlJogja);
            }
        }

        function searchRegulerTravel() {
            $("#payment_cash").prop("checked", true);
            $("#payment_transfer").prop('checked', false);
            $(".title-transfer-amount").text("Rp. 0,-");
            $("#payment-description-cash").show();
            $("#payment-description-transfer").hide();
            var tujuanTravel = $("#travel_destination").val();
            var dateTravel = $("#reguler_date_departure").val();
            if (!dateTravel) {
                Toast.fire({
                    icon: "error",
                    title: "Please choose Date Departure",
                });
                return;
            }
            $.ajax({
                type: "post",
                url: "/reservation/reguler/check-schedule-reguler",
                data: {
                    tujuanTravel,
                    dateTravel
                },
                success: function(response) {
                    const {
                        schedule,
                        seat
                    } = response;

                    if (schedule?.length) {
                        $.ajax({
                            type: "post",
                            url: "/reservation/reguler/pick-seat-reguler",
                            data: {
                                typeTravel: schedule[0].armada_type
                            },
                            success: function(response) {
                                $("#reguler-schedule-not-available").hide();
                                $("#seat-selection").show();
                                $("#display-seat").html(response);
                                $("#travel_selected_seat").val("");
                                $("#travel_passenger").val("");
                                $("#travel_total_price").val("");
                                submission_target = [];
                                var travel_price = 0;
                                $("#travel_type_name").val(schedule[0].armada_type);
                                if (schedule[0].armada_type === "SUITESS") {
                                    $("#id_schedule").val(schedule[0].id);
                                    $("#travel_price").val("Rp. 550.000");
                                    $("#available_seats").html(21);
                                    if (seat?.length) {
                                        $("#available_seats").html(21 - parseInt(seat
                                            .length));
                                        seat.map((el) => {
                                            $(`#Suite${el.booking_seats_seat_number}`)
                                                .attr('disabled', true);
                                        });
                                    }
                                    travel_price = 550000;
                                } else if (schedule[0].armada_type === "EXECUTIVE") {
                                    $("#id_schedule").val(schedule[0].id);
                                    $("#travel_price").val("Rp. 300.000");
                                    $("#available_seats").html(22);
                                    if (seat?.length) {
                                        $("#available_seats").html(22 - parseInt(seat
                                            .length));
                                        seat.map((el) => {
                                            $(`#Executive${el.booking_seats_seat_number}`)
                                                .attr('disabled', true);
                                        });
                                    }
                                    travel_price = 300000;
                                }
                                reservationBooking.reguler = {
                                    reguler_date_departure: dateTravel,
                                    reguler_destination: tujuanTravel,
                                    reguler_pick_point: $("#reguler_departure_pick_point")
                                        .val(),
                                    reguler_arrival_point: $("#reguler_arrival_pick_point")
                                        .val(),
                                    id_schedule: schedule[0].id,
                                    type_travel: schedule[0].armada_type,
                                    travel_price: travel_price
                                }
                                localStorage.setItem("regulerReservation", JSON.stringify(
                                    reservationBooking.reguler));
                            },
                        });
                    } else {
                        $("#seat-selection").hide();
                        $("#reguler-schedule-not-available").show();
                        $("#id_schedule").val('');
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            });
        }

        function searchPariwisataTravel() {
            var dateDeparture = $("#pariwisata_date_departure").val();
            var dateReturn = $("#pariwisata_date_return").val();
            var total_seat = $("#seat_passengers").val();
            var provinceTo = $("#pariwisata_province_to").val();
            if (!dateDeparture || !dateReturn) {
                Toast.fire({
                    icon: "error",
                    title: "Silahkan Lengkapi Tanggal Berangkat dan Tanggal Pulang",
                });
                return;
            }
            if (!total_seat) {
                Toast.fire({
                    icon: "error",
                    title: "Silahkan Lengkapi Kapasitas Penumpang",
                });
                return;
            }
            if (!provinceTo) {
                Toast.fire({
                    icon: "error",
                    title: "Silahkan Lengkapi Tujuan Wisata",
                });
                return;
            }


            $.ajax({
                type: "post",
                url: "/admin/transaction/pariwisata/booking/check-available-bus",
                success: function(response) {
                    const {
                        bus
                    } = response;
                    if (bus?.length) {
                        $("#pariwisata-bus-available").show();
                        var cardBus = `<div class="row">`;
                        bus.map((el, i) => {
                            console.log(el);
                            cardBus += '<div class="col-12 col-md-4">';
                            cardBus +=
                                `<div class="card my-4 border-primary card-bus" id="bus-${el.bus_code}"> <div class="card-content px-1"> <div class="card-body px-1"> <h4 class="card-title">${el.bus_name}</h4> <h6 class="card-subtitle">${el.bus_capacity} Seats</h6> </div> <div class="card-body px-1 pb-0"> <img class="img-fluid" src="/storage/${el.bus_image}" alt=""> <br> <span class="card-text font-weight-bold mt-1"> Facility : </span><br> <p>${el.bus_facility}</p> </div> <div class="card-footer pb-1"> <button class="btn btn-sm btn-primary w-100" type="button" onClick="getAvailableArmada('${el.bus_name}')"> <i class="bx bxs-bus"></i> SELECT</button> </div> </div> </div>`;
                            cardBus += `</div>`;
                        });
                        cardBus += `</div>`;
                        $("#pariwisata-bus-available").html(cardBus);
                    } else {
                        $("#pariwisata-bus-available").hide();
                        $("#pariwisata-bus-available").html("");
                    }

                    $(`#seat-selection`).LoadingOverlay("hide");
                    $(`#reguler-schedule-not-available`).LoadingOverlay("hide");

                },
                error: function(err) {
                    console.log(err);
                },
            });

        }

        const getAvailableArmada = (typeBus) => {
            $(".card-bus").removeClass('bg-selected')
            $.ajax({
                type: "post",
                url: "/admin/transaction/pariwisata/booking/check-available-armada",
                data: {
                    typeBus
                },
                success: function(response) {
                    console.log(response);
                    const {
                        armada
                    } = response;

                    if (armada?.length) {
                        $("#pariwisata-armada-available").show();
                        let armadaCard =
                            '<option value="">Select Available Bus</option>';

                        armada.map((el, i) => {
                            armadaCard +=
                                '<option value="' +
                                el.id +
                                '">' +
                                el.armada_merk +
                                " - " +
                                el.armada_no_police +
                                "</option>";
                        });

                        if (typeBus == "Mikro Bus") {
                            $("#bus-price").val(300000);
                            $("#total-price").val(300000);
                            $("#bus-BUS-003").addClass('bg-selected')
                        } else if (typeBus == "Medium Bus") {
                            $("#bus-price").val(500000);
                            $("#total-price").val(500000);
                            $("#bus-BUS-004").addClass('bg-selected')
                        } else if (typeBus == "Big Bus") {
                            $("#bus-price").val(1000000);
                            $("#total-price").val(1000000);
                            $("#bus-BUS-005").addClass('bg-selected')
                        }

                        $("#pariwisata_armada").html(armadaCard);
                        $(".input-number").mask("#.##0", {
                            reverse: true
                        });
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            });
        };

        const searchTravel = (type) => {
            if (type == "REGULER") {
                searchRegulerTravel()
            } else {
                searchPariwisataTravel();
            }
        };



        var submission_target = [];

        function selectSeat(seat) {
            if (!submission_target.includes(seat)) {
                submission_target.push(seat);
            } else {
                var index = submission_target.indexOf(seat);
                submission_target.splice(index, 1);
            }

            var countPassenger = submission_target.length;
            var priceTicket = 300000;
            if ($("#travel_type_name").val() == "SUITESS") {
                priceTicket = 550000;
            }
            var totalPrice = countPassenger * parseFloat(priceTicket);
            $("#travel_detail_total_cost").val(totalPrice);

            var displayTotal = `Rp. ${numberWithCommas(totalPrice)}`
            $("#travel_selected_seat").val(submission_target.toString());
            $("#travel_passenger").val(countPassenger);
            $("#travel_total_price").val(displayTotal);

            var totalAmountTransfer = $("#travel_total_price").val();
            $(".title-transfer-amount").text(totalAmountTransfer);

            if (totalPrice > 0) {
                $(".submit_transaction_reguler").show();
            } else {
                $(".submit_transaction_reguler").hide();
            }
        }


        const choosePayment = () => {
            var checkCash = $("#payment_cash").prop("checked");
            var checkTransfer = $("#payment_transfer").prop("checked");
            if (checkCash) {
                $("#payment_method").val('CASH');
                $("#id_bank_transfer").removeClass("required");
                $("#row-bank-transfer").hide();
                $("#payment-description-transfer").hide();
                $("#payment-description-cash").show();
                $("#payment-description-transfer").hide();
                reservationBooking.reguler = {
                    type_payment: 'CASH'
                }
            } else if (checkTransfer) {
                $("#payment_method").val('TRANSFER');
                $("#id_bank_transfer").addClass("required");
                $("#id_bank_transfer").val("");
                $("#row-bank-transfer").show();
                $("#payment-description-transfer").show();
                $("#payment-description-cash").hide();
                reservationBooking.reguler = {
                    type_payment: 'CASH'
                }
            }

        };


        const chooseBank = () => {
            var id_bank = $("#id_bank_transfer").val();
            var totalAmountTransfer = $("#travel_total_price").val();
            $(".title-transfer-amount").text(totalAmountTransfer);
            $("#payment-description-transfer").hide();
            if (id_bank) {
                $("#id_payment").val(id_bank);
                $("#payment-description-transfer").show();
                var titleTransferBank = "";
                var accountTransferBank = "";
                var srcLogoBank = "";
                $.ajax({
                    url: `/master-data/bank/get-data-by-id/${id_bank}`,
                    method: "get",
                    dataType: "json",
                    success: function(response) {
                        bank_name = response.data.bank_name;
                        titleTransferBank = `${bank_name} Payment Transfer`;
                        accountTransferBank = response.data.bank_account;

                        if (bank_name == "BCA") {
                            srcLogoBank = "../../../images/logo bca.png";
                        } else if (bank_name == "MANDIRI") {
                            srcLogoBank = "../../../images/logo mandiri.png";
                        } else {
                            srcLogoBank = "../../../images/logo permata.png";
                        }

                        $("#title-transfer-payment").text(titleTransferBank);
                        $("#title-transfer-account").text(accountTransferBank);
                        $("#image-transfer-payment").attr("src", srcLogoBank);
                    },
                    error: function(err) {
                        console.log(err);
                    },
                });
            }
        };


        const bookTravel = (type) => {
            $(`#LoginRegisterModal`).modal('show');
            var checkCash = $("#payment_cash").prop("checked");
            var checkTransfer = $("#payment_transfer").prop("checked");
            if (checkCash) {
                type_payment = 'CASH';
            } else {
                type_payment = 'TRANSFER';
            }

            reservationBooking.reguler = {
                reguler_date_departure: $("#reguler_date_departure").val(),
                reguler_destination: $("#travel_destination").val(),
                reguler_pick_point: $("#reguler_departure_pick_point").val(),
                reguler_arrival_point: $("#reguler_arrival_pick_point").val(),
                id_schedule: $("#id_schedule").val(),
                type_travel: $("#travel_type_name").val(),
                travel_price: $("#travel_price").val(),
                selected_seat: $("#travel_selected_seat").val(),
                passengers: $("#travel_passenger").val(),
                total_price: $("#travel_total_price").val(),
                type_payment: type_payment,
                id_bank: $("#id_bank_transfer").val(),
            }

            localStorage.setItem("regulerReservation", JSON.stringify(
                reservationBooking.reguler));
        }

        const openDetailBus = (id) => {
            $("#ArmadaDetailModal").modal('show');
            $.ajax({
                url: `/api/master-data/bus/${id}`,
                method: "get",
                dataType: "json",
                success: function(response) {
                    var response = response.data;
                    response.gallery.map((el, i) => {
                        var bus_photo_src = `../../storage/${el.bus_photo}`;
                        $("#data-image-bus").append(`<img src='` + bus_photo_src + `'/>`);
                    });

                    var src = `../../storage/${response.bus_image}`;
                    $("#bus_gallery_bus_image").attr("src", src);

                    $("#bus_gallery_bus_code").text(response.bus_code);
                    $("#bus_gallery_bus_type").text(response.bus_type);
                    $("#bus_gallery_bus_capacity").text(response.bus_capacity);
                    $("#bus_gallery_bus_name").text(response.bus_name);
                    $("#bus_gallery_description").text(response.bus_description);

                    var facility_bus = response.bus_facility;
                    var ex_facility = facility_bus.split(", ");
                    var html_facility = ``;
                    var selectedFacility = new Array();

                    ex_facility.forEach((facility, i) => {
                        html_facility +=
                            `<li> <div class="card--facilities-sm">  <ion-icon name="checkmark-done-outline" class="icon mr-2"></ion-icon> ${facility} </div> </li> `;
                    })
                    $("#bus_gallery_facility").html(html_facility);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endpush
