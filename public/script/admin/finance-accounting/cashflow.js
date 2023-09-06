$(document).ready(function () {
    displayData();

});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var data = arr[5];
    return data;
};

const data = getUrl();

function displayData(month = null) {
    month = $("#param_month").val();
    if (month == '1') {
        month_title = "Januari";
    } else if (month == '2') {
        month_title = "Februari";
    }else if (month == '3') {
        month_title = "Maret";
    }else if (month == '4') {
        month_title = "April";
    }else if (month == '5') {
        month_title = "Mei";
    }else if (month == '6') {
        month_title = "Juni";
    }else if (month == '7') {
        month_title = "Juli";
    }else if (month == '8') {
        month_title = "Agustus";
    }else if (month == '9') {
        month_title = "September";
    }else if (month == '10') {
        month_title = "Oktober";
    }else if (month == '11') {
        month_title = "November";
    }else{
        month_title = "Desember"
    }
    $("#month-title").text(`${month_title} 2022`);
    $.ajax({
        // url: `/admin/finance-accounting/${data}/create`,
        url: `/admin/finance-accounting/${data}/${month}`,
        method: "get",
        success: function (response) {
            $(`#show-data-${data}`).html(response);
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function openModal(data, type, id = null) {
    submission_target = [];

    $(".input-number").mask("#.###.##0", { reverse: true });
    $("#submission_target").val('');
    if (type == "add" || type == "edit") {
        if (data == 'blog') {
            $(`#form-data-${data}`).LoadingOverlay("show");
            $(`#form-data-${data}`).show();
            $(`#show-data-${data}`).hide();
            $(`#btn-add-${data}`).hide();
            $(`#btn-back-${data}`).show();
        } else {
            $(`#modal-${data}`).modal("show");
        }
    } else if (type == 'back') {
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == 'detail') {
        $(`#modal-detail-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    } else if (type == 'list-account') {
        $(`#modal-list-${data}`).modal("show");
    }

    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
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
            $("#detail-specification").hide();
            $.ajax({
                url: `/admin/finance-accounting/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    await fetchData(data, response.data, 'DETAIL');
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;

        case "list-account":
            $.ajax({
                url: `/admin/finance-accounting/${data}/${id}`,
                method: "get",
                success: function (response) {
                    $("#display-detail-account").html(response)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;

        default:
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
        default:
            break;
    }
};

function manageData(type, id = null, category = null) {
    $(".input-number").unmask();
    switch (type) {
        case "save":
            $(`#form-${data}`).submit(function (e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/finance-accounting/${data}`,
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
        case "update":
            var id = $("#id").val();
            if (data === "principal" || data === "product" || data === "product-boditech" || data === "featured-product") {
                $(`#form-${data}`).submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var url = `/admin/finance-accounting/${data}/update/edit-${data}`;
                    $.ajax({
                        url: url,
                        type: "post",
                        data: formData,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: async function (response) {
                            await successResponse(
                                "edit",
                                data,
                                response.message,
                                response.data.id
                            );
                        },
                        error: async function (err) {
                            console.log(err)
                            let err_log = err.responseJSON.errors;
                            await handleError(err, err_log, data);
                        }
                    });
                });
            } else {
                $(`#form-${data}`).submit(function (e) {
                    e.preventDefault();
                    var formData = $(`#form-${data}`).serialize();
                    $.ajax({
                        url: `/admin/finance-accounting/${data}/${id}`,
                        type: "patch",
                        data: formData,
                        dataType: "json",
                        success: async function (response) {
                            await successResponse(
                                "edit",
                                data,
                                response.message,
                                response.data.id
                            );
                        },
                        error: async function (err) {
                            let err_log = err.responseJSON.errors;
                            await handleError(err, err_log, data);
                        }
                    });
                });
            }

            break;
        case "delete":
            Swal.fire({
                title: "Yakin akan menghapus data?",
                text: "Data yang di hapus tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/finance-accounting/${data}/${id}`,
                        method: "delete",
                        // dataType: "json",
                        success: function (response) {
                            if (response.status == 300) {
                                Toast.fire({
                                    icon: "error",
                                    title: response.message
                                });
                                return;
                            }

                            successResponse(
                                "delete",
                                data,
                                response.message,
                                response.data
                            );
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            break;
        case "activate":
        case "remove":
            if (category == 'AKTIVA') {
                $("#show-data-account-balance-detail-aktiva").LoadingOverlay("show");
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/balance-aktiva/remove-${id}`,
                    success: function (response) {
                        var id_aktiva = $("#selected_aktiva").val();
                        $("#show-data-account-balance-detail-aktiva").LoadingOverlay("hide");
                        openDetailAktiva(id_aktiva)
                    }
                });
            } else {
                $("#show-data-account-balance-detail-pasiva").LoadingOverlay("show");
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/balance-pasiva/remove-${id}`,
                    success: function (response) {
                        var id_pasiva = $("#selected_pasiva").val();
                        $("#show-data-account-balance-detail-pasiva").LoadingOverlay("hide");
                        openDetailPasiva(id_pasiva)
                    }
                });
            }
            break;
        case "submission":
            if (category == 'AKTIVA') {
                var id_aktiva = $("#selected_aktiva").val()
                if (submission_target.length == 0) {
                    Toast.fire({
                        icon: "error",
                        title: "Silahkan pilih data yang akan di proses terlebih dahulu."
                    });
                    $("#modal-balance-detail-aktiva").LoadingOverlay("hide");
                    return;
                }

                $("#modal-balance-detail-aktiva").LoadingOverlay("show");
                $.ajax({
                    url: `/admin/finance-accounting/balance-aktiva/submit-account-aktiva/${id_aktiva}`,
                    method: "post",
                    data: { submission_target },
                    success: function (response) {
                        $("#modal-balance-detail-aktiva").modal('hide');
                        submission_target = [];
                        $("#submission_target").val('');
                        $("#modal-balance-detail-aktiva").LoadingOverlay("hide");
                        Toast.fire({
                            icon: "success",
                            title: 'Berhasil menambahakan data Account pada Neraca'
                        });
                        openDetailAktiva(id_aktiva)
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                var id_pasiva = $("#selected_pasiva").val()
                if (submission_target.length == 0) {
                    Toast.fire({
                        icon: "error",
                        title: "Silahkan pilih data yang akan di proses terlebih dahulu."
                    });
                    $("#modal-balance-detail-pasiva").LoadingOverlay("hide");
                    return;
                }
                $("#modal-balance-detail-pasiva").LoadingOverlay("show");
                $.ajax({
                    url: `/admin/finance-accounting/balance-pasiva/submit-account-pasiva/${id_pasiva}`,
                    method: "post",
                    data: { submission_target },
                    success: function (response) {
                        $("#modal-balance-detail-pasiva").modal('hide');
                        submission_target = [];
                        $("#submission_target").val('');
                        $("#modal-balance-detail-pasiva").LoadingOverlay("hide");
                        Toast.fire({
                            icon: "success",
                            title: 'Berhasil menambahakan data Account pada Neraca'
                        });
                        openDetailPasiva(id_pasiva)
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
            break;

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
        default:
            break;
    }
}

function fetchData(data, response, type = null) {
    switch (data) {
        case "account":
            $("#id").val(response.id);
            $("#account_code").val(response.account_code);
            $("#account_name").val(response.account_name);
            break;
    }
}


const formatDate = (data_date) => {
    var DATE_FORMAT = new Date(data_date);

    const dtf = new Intl.DateTimeFormat('en', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    })
    const [{
        value: month
    }, , {
        value: date
    }, , {
        value: year
    }] = dtf.formatToParts(DATE_FORMAT);

    var VALUE_DATE = `${date} ${month} ${year}`;
    return VALUE_DATE;
}

function convertSlug() {
    var value = $("#blog_headline").val();
    var slug = value.toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
    $("#blog_slug").val(slug)
}


function openModalDetail(data, type, id = null) {
    switch (type) {
        case "add":
            if (data == 'balance-detail-aktiva') {
                $("#modal-balance-detail-aktiva").modal('show')
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/balance-aktiva/account`,
                    success: function (response) {
                        $("#show-data-account").html(response)
                        console.log(response)
                    }
                });
            } else {
                $("#modal-balance-detail-pasiva").modal('show')
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/balance-pasiva/account`,
                    success: function (response) {
                        console.log(response)
                        $("#show-data-account").html(response)
                    }
                });

            }
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            break;
        case "edit":
            break;
    }
}