$(document).ready(function () {
    displayData();
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

const numberWithCommas = x => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var data = arr[5];
    return data;
};

var indexJournal = 0;

const data = getUrl();

function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/finance-accounting/${data}/create`,
        method: "get",
        success: function (response) {
            $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
            // await $(`#table-${data}`).DataTable();
        },
        error: function (err) {
            console.log(err);
        },
    });
}

function openModal(data, type, id = null) {
    if (type == "add" || type == "edit") {
        $(`#form-data-${data}`).LoadingOverlay("show");
        $(`#form-data-${data}`).show();
        $(`#show-data-${data}`).hide();
        $(`#btn-add-${data}`).hide();
        $(`#btn-back-${data}`).show();
    } else if (type == "back") {
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == "detail") {
        $(`#modal-${data}`).LoadingOverlay("show");
        $(`#modal-${data}`).modal("show");
    }
    switch (type) {
        case "add":
            $(`#form-data-${data}`).LoadingOverlay("hide");
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/finance-accounting/${data}/code`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    $("#journal_number").val(response.data);
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;
        case "edit":
            $(`#form-${data}`)[0].reset();
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/finance-accounting/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    if (data == "blog") {
                        $(`#form-data-${data}`).LoadingOverlay("hide");
                    } else {
                        $(`#modal-${data}`).LoadingOverlay("hide");
                    }
                    await fetchData(data, response.data);
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;
        case "detail":
            $(`#modal-${data}`).LoadingOverlay("hide");
            $.ajax({
                url: `/admin/finance-accounting/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    var data = response.data;
                    $("#id_booking_payment").val(data.id);
                    $("#payment_type").val(data.payment_type);
                    $("#nominal_payment").val(data.amount);
                    console.log(response)
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;
    }
}
function manageData(type, id = null, category = null) {
    switch (type) {
        case "approve":
            Swal.fire({
                title: "Yakin akan melakukan APPROVE pembayaran?",
                text: "Data yang di approve akan diperbaharui dan masuk ke journal akunting",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!"
            }).then(result => {
                if (result.isConfirmed) {
                    if (id == null) {
                        id = $("#id_booking_payment").val();
                    }
                    $.ajax({
                        url: `/admin/finance-accounting/payment-request/payment-approve-reject`,
                        method: "post",
                        data: {
                            id,
                            action: 'APPROVE'
                        },
                        success: function (response) {
                            Toast.fire({
                                icon: "success",
                                title: response.message,
                            });
                            displayData()

                            $("#modal-payment-request").modal('hide')
                        },
                        error: function (err) {
                            console.log(err);
                        },
                    });
                }
            });
            break;
        case "reject":
            Swal.fire({
                title: "Yakin akan melakukan REJECTED pembayaran?",
                text: "Data yang di reject akan tidak dapat di kembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!"
            }).then(result => {
                if (result.isConfirmed) {
                    if (id == null) {
                        id = $("#id_booking_payment").val();
                    }
                    $.ajax({
                        url: `/admin/finance-accounting/payment-request/payment-approve-reject`,
                        method: "post",
                        data: {
                            id,
                            action: 'REJECT'
                        },
                        success: function (response) {
                            Toast.fire({
                                icon: "success",
                                title: response.message,
                            });
                            $("#modal-payment-request").modal('hide')
                            displayData()
                        },
                        error: function (err) {
                            console.log(err);
                        },
                    });
                }
            });
            break;


    }
}

function handleError(err, err_log, type) {
    $(`#add-${data}`).removeAttr("disabled");
    $(`#form-${data}`).unbind("submit");
    if (err.status == 422) {
        if (typeof err_log.status_name !== "undefined") {
            Toast.fire({
                icon: "error",
                title: err_log.status_name[0],
            });
        }
        if (typeof err_log.status_code !== "undefined") {
            Toast.fire({
                icon: "error",
                title: err_log.status_code[0],
            });
        }
    } else {
        Toast.fire({
            icon: "error",
            title: "Terjadi Kesalahan Pada Sistem",
        });
    }
}
