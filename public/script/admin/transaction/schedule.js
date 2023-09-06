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


function displayData(id = null, month = null) {
    $.ajax({
        url: `/admin/transaction/reguler/schedule-reguler/create`,
        method: "get",
        success: function (response) {
            $(`#show-data-schedule-reguler`).html(response);
            $(`#row-schedule-reguler-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-schedule-reguler-${id}`).removeClass("success-alert");
            }, 3000);
            $(`#table-schedule-reguler`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function displayDataMonth(month) {
    $.ajax({
        url: `/admin/transaction/reguler/schedule-reguler/${month}`,
        method: "get",
        success: function (response) {
            $(`#show-data-schedule-reguler`).html(response);
            $(`#table-schedule-reguler`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}


function openModal(data, type, id = null) {
    if (type == "add") {
        // $(`#form-data-${data}`).LoadingOverlay("show");
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
        $(`#modal-${data}`).LoadingOverlay("show");
    }
    switch (type) {
        case "add":
            $(`#form-data-${data}`).LoadingOverlay("hide");
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            break;
        case "edit":
            $.ajax({
                // url: `/admin/master-data/${data}/${id}/edit`,
                url: `/admin/transaction/reguler/schedule-reguler/${id}/edit`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    var result = response.data;
                    $("#edit-id").val(result.id)
                    $("#edit-date_departure").val(result.date_departure)
                    $("#edit-type_bus").val(result.type_bus)
                    $("#edit-id_armada").val(result.id_armada)
                    $("#edit-id_driver_1").val(result.driver_1)
                    $("#edit-id_driver_2").val(result.driver_2)
                    $("#edit-conductor").val(result.conductor)
                    $("#edit-destination").val(result.destination)
                    $("#edit-type_departure").removeClass('text-success')
                    $("#edit-type_departure").removeClass('text-danger')
                    if (result.destination == "JOG-DPS") {
                        $("#edit-type_departure").addClass('text-success')
                        $("#edit-type_departure").val("BERANGKAT")
                    } else {
                        $("#edit-type_departure").addClass('text-danger')
                        $("#edit-type_departure").val("KEMBALI")
                    }
                    $(`#modal-${data}`).LoadingOverlay("hide");
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

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [day, month, year].join('-');
}

var filteredArmada = []
function generateSchedule() {
    var typeBus = $("#type_bus").val();
    var startDate = $("#start_date").val();
    var endDate = $("#end_date").val();
    var countDay = datediff(parseDate(startDate), parseDate(endDate))
    if (!startDate || !endDate) {
        Toast.fire({
            icon: "error",
            title: 'Silahkan pilih tanggal Mulai dan Tanggal Selesai'
        });
        return;
    }

    if (parseDate(startDate) > parseDate(endDate)) {
        Toast.fire({
            icon: "error",
            title: 'Tanggal Mulai tidak boleh lebih dari Tanggal Selesai'
        });
        return;
    }

    // if (countDay > 31) {
    //     Toast.fire({
    //         icon: "error",
    //         title: 'Pembuatan Jadwal Maksimal 1 Bulan'
    //     });
    //     return;
    // }

    if (!typeBus) {
        Toast.fire({
            icon: "error",
            title: 'Silahkan pilih jenis Bus'
        });
        return;
    }
    var html = ``;
    $.ajax({
        type: "post",
        url: "/admin/transaction/reguler/schedule-reguler/check-schedule-reguler",
        data: { startDate, endDate, countDay, typeBus },
        success: function (response) {
            console.log(response);
            var countData = response.data.JOG_DPS.length;
            if (countData == 0) {
                Toast.fire({
                    icon: "error",
                    title: `Jadwal bus tidak tersedia pada periode ${formatDate(startDate)} - ${formatDate(endDate)}`
                });

                $("#input-body-schedule-reguler").html('')
                return;
            }

            var departures = response.data.JOG_DPS;
            filteredArmada = armadaData.filter(data => (data.armada_type == typeBus));
            departures.forEach(departure => {
                html += `<tr>`;
                html += `<td><input type="hidden" name="date_departure[]" value="${departure}" />${departure}</td>`;
                arrival = parseDatePhp(departure).setDate(parseDatePhp(departure).getDate() + 1)
                html += `<td><input type="hidden" name="date_arrival[]" value="${formatDate(arrival)}" />${formatDate(arrival)}</td>`;
                html += `<td><input type="hidden" name="type_bus[]" value="${typeBus}" />${typeBus}</td>`;
                html += `<td><select class="form-control form-control-sm" name="id_armada[]"><option>Pilih Armada</option>`;
                filteredArmada.forEach(armada => {
                    html += `<option value="${armada.id}">${armada.armada_no_police}</option>`;
                })
                html += `</select></td>`;
                html += `<td><select class="form-control form-control-sm" name="driver_1[]"><option>Pilih Sopir 1</option>`;
                driverData.forEach(driver_1 => {
                    html += `<option value="${driver_1.id}">${driver_1.employee_name}</option>`;
                })
                html += `</select></td>`;
                html += `<td><select class="form-control form-control-sm" name="driver_2[]"><option>Pilih Sopir 2</option>`;
                driverData.forEach(driver_2 => {
                    html += `<option value="${driver_2.id}">${driver_2.employee_name}</option>`;
                })
                html += `</select></td>`;
                html += `<td><select class="form-control form-control-sm" name="conductor[]"><option>Pilih Kernet</option>`;
                conductorData.forEach(conductor => {
                    html += `<option value="${conductor.id}">${conductor.employee_name}</option>`;
                })
                html += `</select></td>`;
                html += `</tr>`;
            })

            $("#input-body-schedule-reguler").html(html)
        },
        error: function (err) {
            console.log(err)
        }
    });
}


const successResponse = (type, data, message, id = null) => {
    $(`#form-schedule-reguler`)[0].reset();
    $(`#form-schedule-reguler`).unbind("submit");
    // displayData();
    showDataShcedule();
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
            $(`#form-schedule-reguler`).submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/transaction/reguler/schedule-reguler`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        $(`#form-schedule-reguler`).unbind("submit");
                        successResponse(
                            "add",
                            'schedule-reguler',
                            response.message,
                            response.data.id
                        );
                    },
                    error: function (err) {
                        console.log(err);
                        $(`#form-schedule-reguler`).unbind("submit");
                        // let err_log = err.responseJSON.errors;
                        // await handleError(err, err_log, data);
                    }
                });
            });
            break;
        case "update":
            $(`#form-edit-schedule-reguler`).submit(function (e) {
                e.preventDefault();
                var formData = $(`#form-edit-schedule-reguler`).serialize();
                var id = $("#edit-id").val();
                $.ajax({
                    url: `/admin/transaction/reguler/schedule-reguler/${id}`,
                    type: "patch",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        $(`#form-edit-schedule-reguler`).unbind("submit");
                        $(`#modal-schedule-reguler`).modal("hide");
                        successResponse(
                            "edit",
                            'schedule-reguler',
                            response.message,
                            response.data.id
                        );
                    },
                    error: function (err) {
                        console.log(err);
                        $(`#form-edit-schedule-reguler`).unbind("submit");
                    }
                });
            });
            break;
    }
}