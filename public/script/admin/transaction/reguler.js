$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

let PickPointJogja = [];
let PickPointDenpasar = [];

function changeTab(tabName) {
    $(`#${tabName}`).trigger("click");
    if (tabName == 'travel-detail-tab') {
        $("#travel-detail-tab").show();
    }

    if (tabName == 'payment-tab') {
        $("#payment-tab").show();
    }
}

function changeTujuan(e) {
    $("#transaction_travel_detail_pick_point").empty().trigger("change");
    $("#transaction_travel_detail_arrival_point").empty().trigger("change");

    if (e.value === "JOG-DPS") {
        $("#transaction_travel_detail_pick_point").select2({
            data: PickPointJogja,
        });
        $("#transaction_travel_detail_arrival_point").select2({
            data: PickPointDenpasar,
        });
    } else if (e.value === "DPS-JOG") {
        $("#transaction_travel_detail_pick_point").select2({
            data: PickPointDenpasar,
        });
        $("#transaction_travel_detail_arrival_point").select2({
            data: PickPointJogja,
        });
    }
}

function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $("#preview").html(
                '<img src="' +
                event.target.result +
                '" width="360" height="auto"/>'
            );
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

$(document).ready(function () {

    $(".input-number").mask("#.###.##0", { reverse: true });

    // PREVIEW AFTER UPLOAD
    $("#payment_attachment").change(function () {
        imagePreview(this);
    });

    // Get Destination
    $.ajax({
        dataType: "json",
        type: "GET",
        url: "/admin/transaction/reguler/booking/get/master-pick-point",
        delay: 800,
        success: function (data) {
            PickPointJogja = data.JOGJA;
            PickPointDenpasar = data.DENPASAR;

            $("#transaction_travel_detail_pick_point").select2({
                data: PickPointJogja,
            });
            $("#transaction_travel_detail_arrival_point").select2({
                data: PickPointDenpasar,
            });
        },
    });

    // Initialize Select Customer
    $("#transaction_customer_master")
        .select2({
            minimumInputLength: 2,
            allowClear: true,
            placeholder: "Input Customer Name Here",
            ajax: {
                dataType: "json",
                type: "GET",
                url: "/admin/transaction/reguler/booking/get/master-customer",
                delay: 800,
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (data, page) {
                    return {
                        results: data,
                    };
                },
            },
        })
        .on("select2:select", function (e) {
            var data = e.params.data;
            const selected_id = data.id.split("|");
            const selected_text = data.text.split(" - ");
            if (
                selected_id[0] &&
                selected_id[1] &&
                selected_id[2] &&
                selected_id[3] &&
                selected_id[4] &&
                selected_text[0]
            ) {
                $("#customer_detail_section").show();

                $("#transaction_customer_id").val(selected_id[0]);
                $("#transaction_customer_code").val(selected_id[1]);
                $("#transaction_customer_name").val(selected_text[0]);
                $("#transaction_customer_email").val(selected_id[4]);
                $("#transaction_customer_nik").val(selected_id[3]);
                $("#transaction_customer_phone").val(selected_id[2]);

                changeTab(`travel-detail-tab`)
            } else {
                $("#customer_detail_section").hide();

                $("#transaction_customer_id").val("");
                $("#transaction_customer_code").val("");
                $("#transaction_customer_name").val("");
                $("#transaction_customer_email").val("");
                $("#transaction_customer_nik").val("");
                $("#transaction_customer_phone").val("");
            }
        });
    // End Initialize Select Customer
});

// Add by Adhit
const searchTravel = () => {
    var tujuanTravel = $("#transaction_travel_detail_tujuan").val();
    var dateTravel = $("#transaction_travel_detail_date_departure").val();
    if (!dateTravel) {
        Toast.fire({
            icon: "error",
            title: "Please choose Date Departure",
        });
        return;
    }

    $.ajax({
        type: "post",
        url: "/admin/transaction/reguler/booking/check-schedule",
        data: { tujuanTravel, dateTravel },
        success: function (response) {
            console.log(response);
            const { schedule, seat } = response;

            if (schedule?.length) {
                $(`#reguler-schedule-not-available`).LoadingOverlay("show");
                $(`#seat-selection`).LoadingOverlay("show");

                $.ajax({
                    type: "post",
                    url: "/admin/transaction/reguler/booking/pick-seat",
                    data: { typeTravel: schedule[0].armada_type },
                    success: function (response) {
                        $("#reguler-schedule-not-available").hide();
                        $("#seat-selection").show();
                        $("#display-seat").html(response);

                        $("#travel_selected_seat").val("");
                        $("#travel_passenger").val("");
                        $("#travel_total_price").val("");

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
                                    $(`#Suite${el.booking_seats_seat_number}`).attr('disabled', true);
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
                                    $(`#Executive${el.booking_seats_seat_number}`).attr('disabled', true);
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
        error: function (err) {
            console.log(err);
        },
    });
};

const choosePayment = () => {
    var checkCash = $("#payment_cash").prop("checked");
    var checkTransfer = $("#payment_transfer").prop("checked");
    if (checkCash) {
        $("#payment_method").val('CASH');
        $("#id_bank_transfer").removeClass("required");
        $("#row-bank-transfer").hide();
        $("#payment-description-cash").show();
        $("#payment-description-transfer").hide();
        return;
    } else if (checkTransfer) {
        $("#payment_method").val('TRANSFER');
        $("#id_bank_transfer").addClass("required");
        $("#id_bank_transfer").val("");
        $("#row-bank-transfer").show();
        $("#payment-description-cash").hide();
        return;
    }
};

const chooseIsAgent = () => {
    var checkNotAgent = $("#radio-not-agent").prop("checked");
    var checkAgent = $("#radio-agent").prop("checked");
    $("#check_agent").val("");
    $("#id_agent").val("");
    if (checkNotAgent) {
        $("#id_agent_alert").hide();
        $("#id_agent").removeClass("required");
        $("#check_agent").val("N");
        $(".list-agent").hide();
        $(".list-pic").show();
        $("#travel_price_agent").val('')
        $("#travel_detail_total_discount").val(0);
        var total_price = $("#travel_total_price").val();
        let val_total_price = total_price.replace("Rp. ", "");
        val_total_price = val_total_price.replaceAll('.', '')
        $("#travel_detail_total_cost").val(val_total_price);
    } else if (checkAgent) {

        $("#id_agent_alert").show();
        $("#id_agent").addClass("required");

        $("#check_agent").val("Y");
        $(".list-agent").show();
        $(".list-pic").hide();
        var discount_agent = 0;
        if ($("#travel_type_name").val() == "SUITESS") {
            discount_agent = 50000;
        } else {
            discount_agent = 35000;
        }
        $("#travel_discount_agent").val(`Rp. ${numberWithCommas(discount_agent)}`)
        // CALCULATE DISCOUNT
        var total_price = $("#travel_total_price").val();
        let val_total_price = total_price.replace("Rp. ", "");
        val_total_price = val_total_price.replaceAll('.', '')
        var countPassenger = $("#travel_passenger").val()
        var default_amount = val_total_price;
        var total_discount_agent = parseFloat(discount_agent) * countPassenger;
        var total_price_agent = parseFloat(default_amount) - parseFloat(total_discount_agent);
        $("#travel_detail_total_cost").val(total_price_agent);
        $("#travel_detail_total_discount").val(total_discount_agent);
        $("#travel_price_agent").val(`Rp. ${numberWithCommas(total_price_agent)}`)
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
            url: `/admin/finance-accounting/master-data/bank/${id_bank}/edit`,
            method: "get",
            dataType: "json",
            success: function (response) {
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
            error: function (err) {
                console.log(err);
            },
        });
    }
};

const submitTransaction = () => {
    let isValid = true;

    $(".required").each(async function () {
        if ($(this).val() == '') {
            if ($(this).attr('id') == "transaction_customer_id") {
                await changeTab(`customer-data-tab`)
            } else {
                $(this).css("border", "1px solid red");
                await changeTab(`travel-detail-tab`)
            }
            isValid = false;
        } else {
            $(this).css("border", "1px solid #DFE3E7");
        }
    })

    if (isValid) {
        Swal.fire({
            title: "Yakin akan melakukan pemesanan ?",
            text: "Data yang di submit tidak dapat dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Pesan!",
        }).then((result) => {
            if (result.isConfirmed) {

                $.LoadingOverlay("show", {
                    text: "Silahkan tunggu, transaksi sedang di proses."
                });

                $(".input-number").unmask();
                var formData = new FormData($("#form-transaction-reguler")[0]);
                $.ajax({
                    url: `/admin/transaction/reguler/booking/submit-reguler`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $.LoadingOverlay("hide");
                        console.log(response);
                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });
                        Swal.fire({
                            title: "Transaksi Berhasil",
                            text: "Apakah anda ingin menambahkan data transaksi lagi?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya, Tambah transaksi lagi !",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/admin/transaction/reguler/booking-reguler";
                            } else {
                                window.location = "/admin/transaction/reguler/data-transaction-reguler";
                            }
                        })
                    },
                    error: async function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        Toast.fire({
                            icon: "error",
                            title: err_log.status_name[0],
                        });
                    },
                });
            }
        });
    } else {
        Toast.fire({
            icon: "error",
            title: "Please Fill All Mandatory Field",
        });
    }

};

const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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

    // CALCULATE AGENT

    var checkAgent = $("#radio-agent").prop("checked")
    if (checkAgent) {
        var default_amount = totalPrice;
        var discount_agent = $("#travel_discount_agent").val();
        let val_discount = discount_agent.replace("Rp. ", "");
        val_discount = val_discount.replaceAll('.', '')
        var total_discount_agent = parseFloat(val_discount) * countPassenger;
        var total_price_agent = parseFloat(default_amount) - parseFloat(total_discount_agent);
        $("#travel_detail_total_cost").val(total_price_agent);
        $("#travel_detail_total_discount").val(total_discount_agent);
        $("#travel_price_agent").val(`Rp. ${numberWithCommas(total_price_agent)}`)

    }

}

function openCreateCustomer() {
    $("#modal-customer").modal('show');

}

function manageData(type, id = null, category = null) {
    switch (type) {
        case "save":
            $(`#form-customer`).submit(function (e) {
                // $(`#add-customer`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/management-customer/customer`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response)
                        successResponse(
                            "add",
                            'customer',
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, 'customer');
                    }
                });
            });
            break;
    }
}

function handleError(err, err_log, type) {
    $(`#add-customer`).removeAttr("disabled");
    $(`#form-customer`).unbind("submit");
    switch (type) {
        case "customer":
            if (err.status == 422) {
                if (typeof err_log.customer_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.customer_name[0]
                    });
                }
                if (typeof err_log.customer_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.customer_code[0]
                    });
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Terjadi Kesalahan Pada Sistem"
                });
            }
            break;
    }
}



const successResponse = (type, data, message, id = null) => {
    $(`#modal-${data}`).modal("hide");
    $(`#form-${data}`)[0].reset();
    $(`#form-${data}`).unbind("submit");
    Toast.fire({
        icon: "success",
        title: message
    });
};

function changeTypeDP(e) {
    if (e.value == 'PERCENT') {
        $("#total_down_payment").val(30);
    } else {
        $("#total_down_payment").val(1);
    }
}

function checkValidityTotalDP(e) {
    if ($('#type_down_payment').val() == 'PERCENT') {
        if (e.value > 0 && e.value < 100) {
            return true;
        } else {
            e.value = 30;
            alert('Input harus di isi 1% - 100%');
        }
    } else {
        const totalCost = parseInt($("#travel_detail_total_cost").val());
        $(".input-number").unmask();
        if(e.value > 0 && e.value <= totalCost){
            $(".input-number").mask("#.###.##0", { reverse: true });
            return true;
        } else {
            e.value = totalCost;
            $(".input-number").mask("#.###.##0", { reverse: true });
            alert('Input harus di isi Rp.1 - ' + formatIDR(totalCost));
        }
    }
}

function formatIDR (amount, decimalCount = 2, decimal = ",", thousands = ".") {
    try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

        const negativeSign = amount < 0 ? "-" : "";

        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
        let j = (i.length > 3) ? i.length % 3 : 0;

        return 'Rp.' + negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
        console.log(e)
    }
}
