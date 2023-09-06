$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function changeTab(tabName) {
    $(`#${tabName}`).trigger("click");

    if (tabName == "travel-detail-tab") {
        $("#travel-detail-tab").show();
    }

    if (tabName == "payment-tab") {
        $("#payment-tab").show();
    }
}

const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

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
    $("#payment_attachment").change(function () {
        imagePreview(this);
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
    $("#pariwisata-armada-available").hide();
    $("#bus-price").val('');
    $("#additional-price").val('');
    $("#discount").val('');
    selected_armada = []
    calculateTotalPrice();

    var dateDeparture = $("#wisata_tanggal_berangkat").val();
    var dateReturn = $("#wisata_tanggal_kembali").val();
    var jumlah_penumpang = $("#wisata_jumlah_penumpang").val();

    if (!dateDeparture || !dateReturn) {
        Toast.fire({
            icon: "error",
            title: "Silahkan Lengkapi Tanggal Berangkat dan Tanggal Pulang",
        });
        return;
    }

    if (!jumlah_penumpang) {
        Toast.fire({
            icon: "error",
            title: "Silahkan Lengkapi Kapasitas Penumpang",
        });
        return;
    }

    checkAvailableArmada();
    return;
    $.ajax({
        type: "post",
        url: "/admin/transaction/pariwisata/booking/check-available-bus",
        success: function (response) {
            const { bus } = response;
            if (bus?.length) {
                $("#pariwisata-bus-available").show();
                var cardBus = `<div class="row">`;
                bus.map((el, i) => {
                    cardBus += '<div class="col-4">';
                    cardBus += `<div class="card pt-1 px-0 mb-0 border-primary card-bus" style="min-height:330px" id="bus-${el.bus_code}"> <div class="card-content px-1"> <div class="card-body px-1"> <h4 class="card-title">${el.bus_name}</h4> <h6 class="card-subtitle">${el.bus_capacity} Seats</h6> </div> <div class="card-body px-1 pb-0"> <img class="img-fluid" src="/storage/${el.bus_image}" alt=""> <br> <span class="card-text font-weight-bold mt-1"> Facility : </span><br> <p>${el.bus_facility}</p> </div> <div class="card-footer pb-1"> <button class="btn btn-sm btn-primary w-100" onClick="checkAvailableArmada('${el.bus_name}')"> <i class="bx bxs-bus"></i> SELECT</button> </div> </div> </div>`;
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
        error: function (err) {
            console.log(err);
        },
    });
};
var destination = [];
const addItinerary = () => {
    // if ($("#province-from").val() == "" || $("#province-to").val() == "") {
    //     Toast.fire({
    //         icon: "error",
    //         title: 'Silahkan Pilih Keberangkatan dan Tujuan Wisata!',
    //     });
    //     return;
    // }

    // destination = [$('#province-from option:selected').text(), $('#province-to option:selected').text()]
    // console.log(destination);
    var totalItinerary = parseInt($("#total-itinerary").val()) + 1;
    let templateItinerary = "";

    templateItinerary += `<tr id="detail-itinerary-${totalItinerary}">`;
    // templateItinerary += `<td><select class="form-control form-control-sm required" name="itinerary_tujuan[]" ><option value="">--Pilih Tujuan--</option>`;
    // destination.forEach(d => {
    //     templateItinerary += `<option value="${d}">${d}</option>`
    // })
    // templateItinerary += `</select></td>`;
    templateItinerary += `<td><input class="form-control form-control-sm required" name="itinerary_tujuan[]"/select></td>`;
    templateItinerary += `<td><input type="text" class="form-control form-control-sm required" name="itinerary_destinasi[]" /></td>`;
    templateItinerary += `<td><input type="text" class="form-control form-control-sm" name="itinerary_notes[]" /></td>`;
    // templateItinerary +=
    //     `<td><input type="text" class="form-control form-control-sm itinerary-harga text-right input-number required" onChange="calculateItenary()" name="itinerary_harga[]" /></td>`;
    templateItinerary += `<td class="text-center"><i style="font-size:28px" class="bx bx-x-circle pointer text-danger" onClick="removeItinerary(${totalItinerary})"></i></td>`;
    templateItinerary += "</tr>";

    $("#tbody-detail-itinerary").append(templateItinerary);
    $("#total-itinerary").val(totalItinerary);
    $(".input-number").mask("#.###.##0", { reverse: true });
};

const calculateTotalPrice = () => {
    $(".input-number").unmask();
    const hargaBus =
        $("#bus-price").val() == "" ? 0 : parseFloat($("#bus-price").val());

    const totalDays =
        $("#total-days").val() == "" ? 0 : parseInt($("#total-days").val());

    const additionalPrice =
        $("#additional-price").val() == ""
            ? 0
            : parseFloat($("#additional-price").val());

    const discount =
        $("#discount").val() == "" ? 0 : parseFloat($("#discount").val());

    console.log(hargaBus, totalDays, additionalPrice, discount);
    let totalPrice = (hargaBus * totalDays) + additionalPrice - discount;

    $(`#total-price`).val(totalPrice);
    $(`.title-transfer-amount`).html(`Rp. ${numberWithCommas(totalPrice)}`);
    if (totalPrice > 0) {
        $(".submit_transaction_pariwisata").show();
    } else {
        $(".submit_transaction_pariwisata").hide();
    }
    $(".input-number").mask("#.###.##0", { reverse: true });
};

const calculateItenary = () => {
    $(".input-number").unmask();
    let hargaBus = parseFloat($("#bus-price").val());
    let totalHargaItinerary = 0;
    $(`.itinerary-harga`).each(function () {
        var hargaItinerary = $(this).val();
        if ($.isNumeric(hargaItinerary)) {
            totalHargaItinerary += parseFloat(hargaItinerary);
        }
    });
    $(`#subtotal-itinerary`).val(totalHargaItinerary);
    calculateTotalPrice();
    console.log(totalHargaItinerary);
    if (totalHargaItinerary > 0) {
        $(".submit_transaction_pariwisata").show();
    } else {
        $(".submit_transaction_pariwisata").hide();
    }
    $(".input-number").mask("#.##0", { reverse: true });
};

const removeItinerary = (ID) => {
    $(`#detail-itinerary-${ID}`).remove();
};

const checkAvailableArmada = (typeBus = null) => {
    submission_target = [];
    $("#modal-schedule-bus-pariwisata").modal("show");
    $("#request-capacity").text(`(${$("#wisata_jumlah_penumpang").val()} penumpang)`);
    var start_date = $("#wisata_tanggal_berangkat").val();
    var end_date = $("#wisata_tanggal_kembali").val();
    $.ajax({
        type: "post",
        url: "/admin/transaction/pariwisata/booking/schedule-bus",
        data: { start_date, end_date, typeBus },
        success: function (response) {
            $("#data-schedule-bus").html(response);
        },
        error: function (err) {
            console.log(err);
        },
    });
};

function checkBus(id) {
    var trs = document.getElementById(`row-armada-${id}`);
    var tds = null;
    for (var i = 0; i < trs.length; i++) {
        tds = trs[i].getElementsByTagName("td");
        for (var n = 0; n < tds.length; n++) {
            console.log(n);
        }
    }
}

var submission_target = [];
let selected_armada = []; // Array untuk menampung Armada yang di select dari Schedule Board
const getAvailableArmada = (
    typeBus,
    no_police = null,
    id = null,
    price = null,
    capacity = null
) => {
    var start_date = $("#wisata_tanggal_berangkat").val();
    var splitSD = start_date.split("-");
    let daySD = splitSD[2];
    var end_date = $("#wisata_tanggal_kembali").val();
    var splitED = end_date.split("-");
    let dayED = splitED[2];
    // Check Bus
    var trs = document.getElementById(`row-armada-${id}`);
    var tds = null;
    tds = trs.getElementsByTagName("td");
    var checkDaySD = parseInt(daySD) + 1;
    var checkDayED = parseInt(dayED) + 1;
    for (var n = 0; n < tds.length; n++) {
        if (n >= checkDaySD && n <= checkDayED) {
            var td_el = tds[n];
            if (
                td_el.classList.contains("bg-yellow") ||
                td_el.classList.contains("bg-red") ||
                td_el.classList.contains("bg-black") ||
                td_el.classList.contains("bg-blue")
            ) {
                Toast.fire({
                    icon: "error",
                    title: "Armada tidak tersedia",
                });
                $(`#checkbox${id}`).prop("checked", false);
                return;
            }
        }
    }
    // Check Selected Armada
    let selectedIndexArmada = selected_armada.findIndex((e) => {
        return e.no_police == no_police && e.id == id;
    });

    if (selectedIndexArmada < 0) {
        selected_armada.push({ id, typeBus, no_police, capacity, price });
    } else {
        selected_armada.splice(selectedIndexArmada, 1);
    }

    // Calculate Min Seat and Max Seat
    let total_bus_capacity = 0; // Untuk compare dengan total penumpang
    let total_price_booked_bus = 0;
    let html_overview_booked_bus = "";

    selected_armada.map((e, i) => {
        total_bus_capacity += parseInt(e.capacity.split(" - ")[1]);
        total_price_booked_bus += parseInt(e.price);
        html_overview_booked_bus += `<tr>
                                        <td>${e.typeBus}</td>
                                        <td>${e.no_police}</td>
                                        <td class="text-right">${numberWithCommas(e.price)}</td>
                                    </tr>`;
    });

    html_overview_booked_bus += `<tr><td colspan="2" class="text-right"><b>TOTAL RENT PRICE</b></td><td class="text-right">${numberWithCommas(
        total_price_booked_bus
    )}</td></tr>`;

    const total_passenger = parseInt($("#wisata_jumlah_penumpang").val());

    // Check Passenger vs Bus Capacity
    if (total_passenger <= total_bus_capacity) {
        $("#book-warn-message").html("");
        $("#button-book-bus-schedule").show();
        $(".input-number").mask("#.###.##0", { reverse: true });
        $("#tbody-armada-booked").html(html_overview_booked_bus);
        $("#pariwisata-armada-available").show();
        $("#pariwisata-armada-available").LoadingOverlay("hide");
        $("#bus-price").val(numberWithCommas(total_price_booked_bus));
        calculateTotalPrice();
    } else if (total_passenger > total_bus_capacity) {
        $("#book-warn-message").html(
            "Mohon tambah bus lain, jumlah penumpang melebihi kapasitas bus"
        );
        $("#button-book-bus-schedule").hide();
        $("#tbody-armada-booked").html("");
        $("#pariwisata-armada-available").hide();
        $("#pariwisata-armada-available").LoadingOverlay("hide");
    }
};

const choosePayment = () => {
    var checkCash = $("#payment_cash").prop("checked");
    var checkTransfer = $("#payment_transfer").prop("checked");
    if (checkCash) {
        $("#payment_method").val("CASH");
        $("#id_bank_transfer").removeClass("required");
        $("#row-bank-transfer").hide();
        $("#payment-description-cash").show();
        $("#payment-description-transfer").hide();
        return;
    } else if (checkTransfer) {
        $("#payment_method").val("TRANSFER");
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
        $("#check_agent").val("N");
        $(".list-agent").hide();
        $("#travel_price_agent").val("");
        $("#travel_detail_total_discount").val(0);
        var total_price = $("#travel_total_price").val();
        let val_total_price = total_price.replace("Rp. ", "");
        val_total_price = val_total_price.replaceAll(".", "");
        $("#travel_detail_total_cost").val(val_total_price);
        return;
    } else if (checkAgent) {
        $("#check_agent").val("Y");
        $(".list-agent").show();
        var discount_agent = 0;
        if ($("#travel_type_name").val() == "SUITESS") {
            discount_agent = 50000;
        } else {
            discount_agent = 35000;
        }
        $("#travel_discount_agent").val(
            `Rp. ${numberWithCommas(discount_agent)}`
        );
        // CALCULATE DISCOUNT
        var total_price = $("#travel_total_price").val();
        let val_total_price = total_price.replace("Rp. ", "");
        val_total_price = val_total_price.replaceAll(".", "");
        var countPassenger = $("#travel_passenger").val();
        var default_amount = val_total_price;
        var total_discount_agent = parseFloat(discount_agent) * countPassenger;
        var total_price_agent =
            parseFloat(default_amount) - parseFloat(total_discount_agent);
        $("#travel_detail_total_cost").val(total_price_agent);
        $("#travel_detail_total_discount").val(total_discount_agent);
        $("#travel_price_agent").val(
            `Rp. ${numberWithCommas(total_price_agent)}`
        );
        return;
    }
};

const chooseBank = () => {
    var id_bank = $("#id_bank_transfer").val();
    var totalAmountTransfer = $("#total-price").val();
    $(".title-transfer-amount").text(
        `${numberWithCommas(totalAmountTransfer)}`
    );
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

    $(".required").each(function () {
        if ($(this).val() == "") {
            if ($(this).attr("id") == "transaction_customer_code") {
                changeTab(`customer-data-tab`);
            } else {
                console.log($(this))
                $(this).css("border", "1px solid red");
                changeTab(`travel-detail-tab`);
            }
            isValid = false;
        } else {
            $(this).css("border", "1px solid #DFE3E7");
        }
    });

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
                $("#form-transaction-pariwisata").LoadingOverlay("show");

                $(".input-number").unmask();
                var formData = new FormData(
                    $("#form-transaction-pariwisata")[0]
                );
                $.ajax({
                    url: `/admin/transaction/pariwisata/booking/submit-pariwisata`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#form-transaction-pariwisata").LoadingOverlay(
                            "hide"
                        );
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
                                window.location =
                                    "/admin/transaction/pariwisata/booking-pariwisata";
                            } else {
                                window.location =
                                    "/admin/transaction/pariwisata/data-transaction-pariwisata";
                            }
                        });
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

const changeProvince = (fromto) => {
    var id_province =
        fromto == "from" ? $("#province-from").val() : $("#province-to").val();
    $.ajax({
        url: `/admin/master-data/province/get-city-by-province/${id_province}`,
        method: "get",
        dataType: "json",
        success: function (response) {
            var cities = response.data;
            var html = `<option value="">Pilih Kota</option>`;
            cities.forEach((city) => {
                html += `<option value="${city.id}">${city.city_name}</option>`;
            });

            if (fromto == "from") {
                $("#city-from").html(html);
            } else if (fromto == "to") {
                $("#city-to").html(html);
            }
        },
        error: function (err) {
            console.log(err);
        },
    });
};

const choosIsExtend = () => {
    var checkNotExtend = $("#not_extend").prop("checked");
    var checkExtend = $("#extend").prop("checked");
    $("#input-extended-day").val("");
    if (checkExtend) {
        $("#input-extended-day").show();
    } else {
        $("#input-extended-day").hide();
    }
};

var total_day = 1;
const calculateDate = () => {
    var date_departure = $("#wisata_tanggal_berangkat").val();
    var date_return = $("#wisata_tanggal_kembali").val();
    if (date_departure && date_return) {
        var date1 = new Date(date_departure);
        var date2 = new Date(date_return);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        total_day = diffDays + 1;
    }

    $("#estimate-date").text(total_day);
    $("#total-days").val(total_day);
    calculateTotalPrice();
};

function openDestination(type) {
    alert("On Progress Ya.");
}

var indexRoute = 1;
function addRoute() {
    var html_route = `<div class="row" id="route-wisata-${indexRoute}">
        <div class="col-9">
            <label>Destinasi: <span class="text-danger">*</span></label>
            <div class="form-group">
                <select id="destination-wisata-${indexRoute}" name="destination_wisata[]" class="form-control required">
                    <option value="">--Silahkan Pilih Destinasi--</option><option value="2">Bantul </option> <option value="8">Denpasar </option> <option value="1">Gunung Kidul </option> <option value="3">Kota Yogyakarta </option> <option value="4">Kulon Progo </option> <option value="9">Kuta </option> <option value="6">Salatiga Kopeng </option> <option value="5">Semarang </option> <option value="7">Solo Karanganyar </option>
                </select>
            </div>
        </div>
        <div class="col-2">
            <label>Estimasi Hari :</label>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" id="estimasi_hari_rute_wisata-${indexRoute}" name="estimasi_hari_rute_wisata[]" value="">
                    <div class="input-group-append">
                        <span class="input-group-text">Hari</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <div class="form-group mt-2">
                <button class="btn btn-light-danger btn-sm btn-block text-uppercase px-0" onclick="deleteRoute(${indexRoute})"><i
                    class="bx bx-minus"></i></button>
            </div>
        </div>
    </div>`;
    $("#route-wisata-list").append(html_route);
    indexRoute++;
}
function deleteRoute(indexRoute) {
    $(`#route-wisata-${indexRoute}`).remove();
}

function calculateEstimationTotalPrice() {
    var formData = $("#form-transaction-pariwisata").serialize();
    $.ajax({
        type: "post",
        url: "/admin/transaction/pariwisata/booking/calculate-estimation",
        data: formData,
        dataType: "json",
        success: function (response) {
            Toast.fire({
                icon: "info",
                title: response.message,
            });
            var estimatePrice = response.data;
            $("#estimate-price").val(estimatePrice);
        },
        error: function (err) {
            console.log(err);
        },
    });
}

function printPariwisataOffering() {
    var formData = new FormData(
        $("#form-transaction-pariwisata")[0]
    );

    var dataSerialize = $("#form-transaction-pariwisata").serialize();
    $.ajax({
        url: `/admin/transaction/pariwisata/booking/print-offering-wisata`,
        type: "post",
        data: formData,
        // dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#offering-print-pdf").html(response)
            var pdf = new jsPDF('p', 'pt', 'letter');
            source = $('#offering-print-pdf')[0];
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };
            pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                'width': margins.width
            },
                function (dispose) {
                    pdf.save('OFFERING-PARIWISATA.pdf');
                }, margins
            );
        },
        error: function (err) {
            // window.open(`/admin/transaction/pariwisata/booking/print/print-offering/wisata/${dataSerialize}`, "_blank");
            console.log(err);
            let err_log = err.responseJSON.errors;
            console.log(err_log);
        },
    });
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



// REMAKE
function checkAvailability() {
    var dateDeparture = $("#wisata_tanggal_berangkat").val();
    var dateReturn = $("#wisata_tanggal_kembali").val();
    var jumlah_penumpang = $("#wisata_jumlah_penumpang").val();

    if (!dateDeparture || !dateReturn) {
        Toast.fire({
            icon: "error",
            title: "Silahkan Lengkapi Tanggal Berangkat dan Tanggal Pulang",
        });
        return;
    }
    if (!jumlah_penumpang) {
        Toast.fire({
            icon: "error",
            title: "Silahkan Lengkapi Kapasitas Penumpang",
        });
        return;
    }

    checkAvailableBus(dateDeparture, dateReturn);
}

function checkAvailableBus(start_date, end_date) {
    $.ajax({
        type: "post",
        url: "/admin/transaction/pariwisata/booking/schedule-bus",
        data: { start_date, end_date, typeBus },
        success: function (response) {
            console.log(response)
        },
        error: function (err) {
            console.log(err);
        },
    });
}