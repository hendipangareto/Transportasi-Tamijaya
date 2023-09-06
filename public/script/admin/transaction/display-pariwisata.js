$(document).ready(function () {
    displayData();
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

function displayData(type = 'all-transaction') {
    $(`#table-${type}`).DataTable();
}

function openModal(data, type, id = null) {
    if (type == 'detail') {
        $(`#modal-detail-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    }
    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/transaction/pariwisata/data-transaction-pariwisata/code`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    var code = `${data}`;
                    if (data.includes("-")) {
                        code = data.replaceAll("-", "_");
                    }
                    await $(`#${code}_code`).val(response.data)
                    if (data == 'blog') {
                        $(`#form-data-${data}`).LoadingOverlay("hide");
                    } else {
                        $(`#modal-${data}`).LoadingOverlay("hide");

                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "edit":
            $(`#form-${data}`)[0].reset();
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/transaction/pariwisata/data-transaction-pariwisata/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    if (data == 'blog') {
                        $(`#form-data-${data}`).LoadingOverlay("hide");
                    } else {
                        $(`#modal-${data}`).LoadingOverlay("hide");
                    }
                    await fetchData(data, response.data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "detail":
            $(`#modal-detail-${data}`).LoadingOverlay("hide");
            $.ajax({
                url: `/admin/transaction/pariwisata/data-transaction-pariwisata/${id}/edit`,
                method: "get",
                success: function (response) {
                    console.log(response);
                    $("#detail-data-transaction").html(response)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "reschedule":
            $(`#modal-reschedule-${data}`).modal("show");
            $("#reschedule-date").val('')
            $.ajax({
                url: `/admin/transaction/pariwisata/reschedule-pariwisata/${id}/edit`,
                method: "get",
                success: function (response) {
                    // $("#seat-selection").html('');
                    $("#seat-selection").hide();

                    $("#reschedule-booking_transactions_code").text(response.data.booking_transactions_code)
                    $("#reschedule-destination").val(response.data.destination)
                    $("#reschedule-type_bus").val(response.data.type_bus)
                    $("#reschedule-total_seats").val(response.data.booking_transactions_total_seats)
                    $("#reschedule-total_cost").val(response.data.booking_transactions_total_costs)
                    $("#reschedule-date_departure").val(response.data.date_departure)
                    var pick_point_value = response.data.booking_transactions_pick_point;
                    var arrival_point_value = response.data.booking_transactions_arrival_point;
                    // Get PP & ARRIVAL
                    var destination = $("#reschedule-destination").val();
                    var html_pick_point = ``;
                    var html_arrival_point = ``;
                    if (destination == "JOG-DPS") {
                        PickPointJogja.forEach(ppJogja => {
                            var selected_pp;
                            if (pick_point_value == ppJogja.id) {
                                selected_pp = 'selected'
                            }
                            html_pick_point += `<option ${selected_pp} value="${ppJogja.id}">${ppJogja.text}</option>`
                        })
                        $("#reschedule-pick_point").html(html_pick_point)

                        PickPointDenpasar.forEach(ppDenpasar => {
                            var selected_ap;
                            if (arrival_point_value == ppDenpasar.id) {
                                selected_ap = 'selected'
                            }
                            html_arrival_point += `<option ${selected_ap} value="${ppDenpasar.id}">${ppDenpasar.text}</option>`
                        })
                        $("#reschedule-arrival_point").html(html_arrival_point)
                    } else {

                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
    }
}

const successResponse = (type, data, message, id = null) => {
    $(`#modal-${data}`).modal("hide");
    $(`#form-${data}`)[0].reset();
    $(`#form-${data}`).unbind("submit");
    displayData(id);
    Toast.fire({
        icon: "success",
        title: message
    });
    switch (type) {
        case "add":
            $(`#add-${data}`).removeAttr("disabled");
            break;
    }
};

function manageData(type, id = null) {
    switch (type) {
        case "detail":
            $(`#form-${data}`).submit(function (e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/transaction/pariwisata/data-transaction-pariwisata`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function (response) {
                        await successResponse(
                            "add",
                            data,
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, data);
                    }
                });
            });
            break;
        case "reschedule":
            var countPassenger = $("#reschedule-total_seats").val();
            var submissionInput = $("#travel_selected_seat").val();
            let selectSeat = 0;
            if (submissionInput !== "") {
                var exSubmission = submissionInput.split(",");
                selectSeat = exSubmission.length;
            }
            console.log(exSubmission);
            if (parseInt(countPassenger) !== parseInt(selectSeat)) {
                Toast.fire({
                    icon: "error",
                    title: "Selected Seat & Passengers Seat doesnt match"
                });
                return;
            }

            alert('PROCESS SHECULE')


            break
    }
}

function handleError(err, err_log, type) {
    $(`#add-${data}`).removeAttr("disabled");
    $(`#form-${data}`).unbind("submit");
    switch (type) {
        case "status":
            if (err.status == 422) {
                if (typeof err_log.status_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.status_name[0]
                    });
                }
                if (typeof err_log.status_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.status_code[0]
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

function fetchData(data, response, type = null) {
    switch (data) {
        case "category-blog":
            $("#id").val(response.id);
            $("#category_blog_code").val(response.category_blog_code);
            $("#category_blog_name").val(response.category_blog_name);
            $("#category_blog_description").val(
                response.category_blog_description
            );
            break;


    }
}

// const formatDate = (data_date) => {
//     var DATE_FORMAT = new Date(data_date);

//     const dtf = new Intl.DateTimeFormat('en', {
//         year: 'numeric',
//         month: 'long',
//         day: 'numeric'
//     })
//     const [{
//         value: month
//     }, , {
//         value: date
//     }, , {
//         value: year
//     }] = dtf.formatToParts(DATE_FORMAT);

//     var VALUE_DATE = `${date} ${month} ${year}`;
//     return VALUE_DATE;
// }

function exportData() {
    var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
    var j = 0;
    tab = document.getElementById('table-export-all-transaction');
    row = tab.rows.length
    const start = Date.now();
    var name = `DATA_TRANSACTION_${start}`
    for (j = 0; j < tab.rows.length; j++) {
        tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
    }

    tab_text = tab_text + "</table>";
    tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
    tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
    {
        txtArea1.document.open("txt/html", "replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
    } else {

        // sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
        let a = $("<a />", {
            href: 'data:application/vnd.ms-excel,' + encodeURIComponent(tab_text),
            //  href: 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,' + encodeURIComponent(tab_text),
            download: `${name}.xls`
        })
            .appendTo("body")
            .get(0)
            .click();
    }
}
