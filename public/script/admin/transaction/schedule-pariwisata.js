$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
const numberWithCommas = x => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

let armadaData = [];
let driverData = [];
let conductorData = [];
$(document).ready(function () {
    displayData();
    $.ajax({
        type: "get",
        url: "/admin/transaction/reguler/schedule-reguler/get-data/armada",
        dataType: "json",
        success: function (response) {
            armadaData = response.data;
        }
    });
    $.ajax({
        type: "get",
        url: "/admin/transaction/reguler/schedule-reguler/get-data/driver",
        dataType: "json",
        success: function (response) {
            driverData = response.data;
        }
    });
    $.ajax({
        type: "get",
        url: "/admin/transaction/reguler/schedule-reguler/get-data/conductor",
        dataType: "json",
        success: function (response) {
            conductorData = response.data;
        }
    });
});


function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/transaction/pariwisata/schedule-pariwisata/create`,
        method: "get",
        success: function (response) {
            $(`#show-data-schedule-pariwisata`).html(response);
            $(`#table-schedule-pariwisata`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}


function openModal(data, type, id = null) {
    if (type == "add") {
        $(`#form-data-${data}`).show();
        $(`#show-data-${data}`).hide();
        $(`#btn-add-${data}`).hide();
        $(`#btn-back-${data}`).show();
    } else if (type == 'back') {
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == "edit") {
        $(`#modal-${data}`).modal("show");
        // $(`#modal-${data}`).LoadingOverlay("show");
    }
    // return;
    switch (type) {
        case "add":
            $(`#form-data-${data}`).LoadingOverlay("hide");
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            break;
        case "edit":
            $.ajax({
                url: `/admin/transaction/pariwisata/schedule-pariwisata/${id}/edit`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $(`#modal-${data}`).LoadingOverlay("hide");
                    var result = response.data;
                    $("#edit-id").val(result.id)
                    $("#edit-date_departure").val(result.date_departure)
                    $("#edit-date_return").val(result.date_return)
                    $("#edit-bus_type").val(result.armada_type)
                    $("#edit-total_seats").val(result.booking_transactions_total_seats)
                    $("#edit-notes").val(result.notes)
                    $("#edit-type_bus").val(result.type_bus)
                    $("#edit-id_armada").val(result.id_armada)
                    $("#edit-driver").val(result.driver)
                    $("#edit-conductor").val(result.conductor)
                    $("#edit-destination").val(result.destination)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
    }
}

function parseDate(str) {
    var mdy = str.split('-');
    return new Date(mdy[0], mdy[1] - 1, mdy[2]);
}
function parseDatePhp(str) {
    var mdy = str.split('-');
    return new Date(mdy[2], mdy[1] - 1, mdy[0]);
}

function datediff(first, second) {
    return Math.round((second - first) / (1000 * 60 * 60 * 24));
}

function formatDate(date) {
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

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [day, newMonth, year].join(' ');
}



const successResponse = (type, data, message, id = null) => {
    displayData();
    Toast.fire({
        icon: "success",
        title: message
    });
    switch (type) {
        case "add":
            $(`#add-schedule-reguler`).removeAttr("disabled");
            $(`#form-data-schedule-reguler`).hide();
            $(`#show-data-schedule-reguler`).show();
            $(`#btn-add-schedule-reguler`).show();
            $(`#btn-back-schedule-reguler`).hide();
            $("#input-body-schedule-reguler").html('')
            break;
        case "edit":

            break;
    }
};

function manageData(type, id = null) {
    switch (type) {
        case "save":
            $(`#form-schedule-pariwisata`).submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/transaction/pariwisata/schedule-pariwisata`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        $(`#form-schedule-pariwisata`).unbind("submit");
                        successResponse(
                            "add",
                            'schedule-pariwisata',
                            response.message,
                            response.data.id
                        );
                    },
                    error: function (err) {
                        console.log(err);
                        $(`#form-schedule-pariwisata`).unbind("submit");
                    }
                });
            });
            break;


        case "update":
            $(`#form-edit-schedule-pariwisata`).submit(function (e) {
                e.preventDefault();
                var formData = $(`#form-edit-schedule-pariwisata`).serialize();
                var id = $("#edit-id").val();
                $.ajax({
                    url: `/admin/transaction/pariwisata/schedule-pariwisata/${id}`,
                    type: "patch",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        $(`#form-edit-schedule-pariwisata`).unbind("submit");
                        $(`#modal-schedule-pariwisata`).modal("hide");
                        successResponse(
                            "edit",
                            'schedule-pariwisata',
                            response.message,
                            response.data.id
                        );
                    },
                    error: function (err) {
                        console.log(err);
                        $(`#form-edit-schedule-pariwisata`).unbind("submit");
                    }
                });
            });
            break;
    }
}