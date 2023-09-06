$(document).ready(function () {
    displayData();
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var data = arr[6];
    return data;
};

const data = getUrl();

function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/finance-accounting/master-data/${data}/create`,
        method: "get",
        success: async function (response) {
            await $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);

            if (data !== "balance-aktiva" && data !== "balance-pasiva") {
                await $(`#table-${data}`).DataTable();
            }
        },
        error: function (err) {
            console.log(err);
        },
    });
}

function openModal(data, type, id = null) {
    submission_target = [];
    selected_account_group_id = 0;
    $("#submission_target").val("");
    if (type == "add" || type == "edit") {
        if (data == "blog") {
            $(`#form-data-${data}`).LoadingOverlay("show");
            $(`#form-data-${data}`).show();
            $(`#show-data-${data}`).hide();
            $(`#btn-add-${data}`).hide();
            $(`#btn-back-${data}`).show();
        } else {
            $(`#modal-${data}`).modal("show");
        }
    } else if (type == "back") {
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == "detail") {
        $(`#modal-detail-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    } else if (type == "list-account") {
        $(`#modal-list-${data}`).modal("show");
    }

    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();

            if (data !== "account") {
                $.ajax({
                    url: `/admin/finance-accounting/master-data/${data}/code`,
                    method: "get",
                    dataType: "json",
                    success: async function (response) {
                        var code = `${data}`;
                        if (data.includes("-")) {
                            code = data.replaceAll("-", "_");
                        }
                        await $(`#${code}_code`).val(response.data);
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });
            }
            break;
        case "edit":
            $(`#form-${data}`)[0].reset();
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/finance-accounting/master-data/${data}/${id}/edit`,
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
            $(`#modal-detail-${data}`).LoadingOverlay("hide");
            $("#detail-specification").hide();
            $.ajax({
                url: `/admin/finance-accounting/master-data/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    await fetchData(data, response.data, "DETAIL");
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;

        case "list-account":
            $.ajax({
                url: `/admin/finance-accounting/master-data/${data}/${id}`,
                method: "get",
                success: function (response) {
                    const { html, selected_account } = response;
                    $("#display-detail-account").html(html);
                    submission_account = selected_account;
                    selected_account_group_id = id;
                    console.log(
                        "list-account : ",
                        submission_account,
                        selected_account_group_id
                    );
                },
                error: function (err) {
                    console.log(err);
                },
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

    if (data == "blog") {
        CKEDITOR.instances["blog_content"].setData("");
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    }
    Toast.fire({
        icon: "success",
        title: message,
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
    switch (type) {
        case "save":
            $(`#form-${data}`).submit(function (e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/finance-accounting/master-data/${data}`,
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
                    },
                });
            });
            break;
        case "update":
            var id = $("#id").val();
            if (
                data === "principal" ||
                data === "product" ||
                data === "product-boditech" ||
                data === "featured-product"
            ) {
                $(`#form-${data}`).submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var url = `/admin/finance-accounting/master-data/${data}/update/edit-${data}`;
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
                            console.log(err);
                            let err_log = err.responseJSON.errors;
                            await handleError(err, err_log, data);
                        },
                    });
                });
            } else {
                $(`#form-${data}`).submit(function (e) {
                    e.preventDefault();
                    var formData = $(`#form-${data}`).serialize();
                    $.ajax({
                        url: `/admin/finance-accounting/master-data/${data}/${id}`,
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
                        },
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
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/finance-accounting/master-data/${data}/${id}`,
                        method: "delete",
                        // dataType: "json",
                        success: function (response) {
                            if (response.status == 300) {
                                Toast.fire({
                                    icon: "error",
                                    title: response.message,
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
                        },
                    });
                }
            });
            break;
        case "activate":
        case "remove":
            if (category == "AKTIVA") {
                $("#show-data-account-balance-detail-aktiva").LoadingOverlay(
                    "show"
                );
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/master-data/balance-aktiva/remove-${id}`,
                    success: function (response) {
                        var id_aktiva = $("#selected_aktiva").val();
                        $(
                            "#show-data-account-balance-detail-aktiva"
                        ).LoadingOverlay("hide");
                        openDetailAktiva(id_aktiva);
                    },
                });
            } else {
                $("#show-data-account-balance-detail-pasiva").LoadingOverlay(
                    "show"
                );
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/master-data/balance-pasiva/remove-${id}`,
                    success: function (response) {
                        var id_pasiva = $("#selected_pasiva").val();
                        $(
                            "#show-data-account-balance-detail-pasiva"
                        ).LoadingOverlay("hide");
                        openDetailPasiva(id_pasiva);
                    },
                });
            }
            break;
        case "submission":
            if(submission_account.length > 0){

                $.ajax({
                    url: `/admin/finance-accounting/master-data/group-account/update-group-account`,
                    method: "post",
                    data: {
                        group_account_id: selected_account_group_id,
                        submission_account: submission_account.toString(),
                    },
                    success: function (response) {
                        console.log(response);
                        if(response.status == 200){
                            Toast.fire({
                                icon: "success",
                                title: response.message,
                            });
                            $("#modal-list-group-account").modal("hide");
                        } else {
                            Toast.fire({
                                icon: "error",
                                title: response.message,
                            });
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });
            } else {
                Toast.fire({
                    icon: "info",
                    title: "Pilihlah minimal 1 account untuk disubmit.",
                });
            }
            return;

            if (category == "AKTIVA") {
                var id_aktiva = $("#selected_aktiva").val();
                if (submission_target.length == 0) {
                    Toast.fire({
                        icon: "error",
                        title: "Silahkan pilih data yang akan di proses terlebih dahulu.",
                    });
                    $("#modal-balance-detail-aktiva").LoadingOverlay("hide");
                    return;
                }

                $("#modal-balance-detail-aktiva").LoadingOverlay("show");
                $.ajax({
                    url: `/admin/finance-accounting/master-data/balance-aktiva/submit-account-aktiva/${id_aktiva}`,
                    method: "post",
                    data: { submission_target },
                    success: function (response) {
                        $("#modal-balance-detail-aktiva").modal("hide");
                        submission_target = [];
                        $("#submission_target").val("");
                        $("#modal-balance-detail-aktiva").LoadingOverlay(
                            "hide"
                        );
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil menambahakan data Account pada Neraca",
                        });
                        openDetailAktiva(id_aktiva);
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });
            } else {
                var id_pasiva = $("#selected_pasiva").val();
                if (submission_target.length == 0) {
                    Toast.fire({
                        icon: "error",
                        title: "Silahkan pilih data yang akan di proses terlebih dahulu.",
                    });
                    $("#modal-balance-detail-pasiva").LoadingOverlay("hide");
                    return;
                }
                $("#modal-balance-detail-pasiva").LoadingOverlay("show");
                $.ajax({
                    url: `/admin/finance-accounting/master-data/balance-pasiva/submit-account-pasiva/${id_pasiva}`,
                    method: "post",
                    data: { submission_target },
                    success: function (response) {
                        $("#modal-balance-detail-pasiva").modal("hide");
                        submission_target = [];
                        $("#submission_target").val("");
                        $("#modal-balance-detail-pasiva").LoadingOverlay(
                            "hide"
                        );
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil menambahakan data Account pada Neraca",
                        });
                        openDetailPasiva(id_pasiva);
                    },
                    error: function (err) {
                        console.log(err);
                    },
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
        case "bank":
            $("#id").val(response.id);
            $("#bank_code").val(response.bank_code);
            $("#bank_holder").val(response.bank_holder);
            $("#bank_account").val(response.bank_account);
            $("#bank_name").val(response.bank_name);
            break;
        case "balance-aktiva":
            $("#id").val(response.id);
            $("#balance_aktiva_code").val(response.balance_aktiva_code);
            $("#balance_aktiva_name").val(response.balance_aktiva_name);
            break;
        case "balance-pasiva":
            $("#id").val(response.id);
            $("#balance_pasiva_code").val(response.balance_pasiva_code);
            $("#balance_pasiva_name").val(response.balance_pasiva_name);
            break;
        case "group-account":
            $("#id").val(response.id);
            $("#group_account_code").val(response.group_account_code);
            $("#group_account_name").val(response.group_account_name);
            $("#group_account_type").val(response.group_account_type);
            break;
    }
}

const formatDate = (data_date) => {
    var DATE_FORMAT = new Date(data_date);

    const dtf = new Intl.DateTimeFormat("en", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
    const [{ value: month }, , { value: date }, , { value: year }] =
        dtf.formatToParts(DATE_FORMAT);

    var VALUE_DATE = `${date} ${month} ${year}`;
    return VALUE_DATE;
};

function convertSlug() {
    var value = $("#blog_headline").val();
    var slug = value
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^\w-]+/g, "");
    $("#blog_slug").val(slug);
}

function openModalDetail(data, type, id = null) {
    switch (type) {
        case "add":
            if (data == "balance-detail-aktiva") {
                $("#modal-balance-detail-aktiva").modal("show");
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/master-data/balance-aktiva/account`,
                    success: function (response) {
                        $("#show-data-account").html(response);
                        console.log(response);
                    },
                });
            } else {
                $("#modal-balance-detail-pasiva").modal("show");
                $.ajax({
                    type: "get",
                    url: `/admin/finance-accounting/master-data/balance-pasiva/account`,
                    success: function (response) {
                        console.log(response);
                        $("#show-data-account").html(response);
                    },
                });
            }
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            break;
        case "edit":
            break;
    }
}

// AKTIVA
const loadingTable = `<div class="text-center">
<div class="spinner-border mr-3 spinner-border text-center" role="status">
    <span class="sr-only">Loading...</span>
</div>
<h5 for="">Please Wait.....</h5>
</div>`;

const openDetailAktiva = (id) => {
    $("#selected_aktiva").val(id);
    $("#show-data-account-balance-detail-aktiva").html(loadingTable);
    $.ajax({
        url: `/admin/finance-accounting/master-data/${data}/get-detail-balance-aktiva/${id}`,
        method: "get",
        dataType: "json",
        success: function (response) {
            if (response) {
                $("#title-aktiva").html($(`#td-title-aktiva-${id}`).html());
                $("#title-aktiva").css("text-transform", "uppercase");
                $("#modal-title-account").html(
                    $(`#td-title-aktiva-${id}`).html()
                );
                $("#modal-title-account").css("text-transform", "uppercase");
                $("#btn-balance-detail-aktiva").show();
                getDetailData("AKTIVA", response.data);
            }
        },
        error: function (err) {
            console.log(err);
        },
    });
};

const openDetailPasiva = (id) => {
    $("#selected_pasiva").val(id);
    $("#show-data-account-balance-detail-pasiva").html(loadingTable);
    $.ajax({
        url: `/admin/finance-accounting/master-data/${data}/get-detail-balance-pasiva/${id}`,
        method: "get",
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response) {
                $("#title-pasiva").html($(`#td-title-pasiva-${id}`).html());
                $("#title-pasiva").css("text-transform", "uppercase");
                $("#modal-title-account").html(
                    $(`#td-title-pasiva-${id}`).html()
                );
                $("#modal-title-account").css("text-transform", "uppercase");
                $("#btn-balance-detail-pasiva").show();
                getDetailData("PASIVA", response.data);
            }
        },
        error: function (err) {
            console.log(err);
        },
    });
};

var submission_target = [];
var selected_account_group_id = 0;

const getDetailData = (type, data) => {
    submission_target = [];
    $("#submission_target").val("");
    var html = ``;
    var targetBalance = "";
    if (type == "AKTIVA") {
        targetBalance = "aktiva";
    } else {
        targetBalance = "pasiva";
    }
    html += `<table class="table table-bordered table-hover" id="table-balance-aktiva"> <thead> <tr> <th class="w-20p">Kode</th> <th>Nama Account</th> <th class="w-10p text-center">Action</th> </tr> </thead> <tbody>`;
    if (data.length > 0) {
        data.forEach((item) => {
            html += `<tr>`;
            html += `<td>${item.account_code}</td>`;
            html += `<td>${item.account_name}</td>`;
            html += `<td class="text-center mx-0"> <div class="d-flex text-center"> <div class="badge-circle badge-circle-sm badge-circle-danger pointer text-center" onclick="manageData('remove', ${item.id}, '${type}')"> <i class="bx bx-x font-size-base"></i> </div> </div></td>`;
            html += `</tr>`;
        });
    } else {
        html += `<tr>`;
        html += `<td colspan="3" class="text-center">Tidak Terdapat Data Account</td>`;
        html += `</tr>`;
    }

    html += `</tbody></table>`;
    if (type == "AKTIVA") {
        $("#show-data-account-balance-detail-aktiva").html(html);
    } else {
        $("#show-data-account-balance-detail-pasiva").html(html);
    }
};

function checkData(id) {
    if (!submission_target.includes(id)) {
        submission_target.push(id);
    } else {
        var index = submission_target.indexOf(id);
        submission_target.splice(index, 1);
    }
    $("#submission_target").val(submission_target.toString());
}

submission_account = [];
function checkRemoveData(
    id,
    type = null,
    account_code = null,
    account_name = null
) {
    console.log("submission_account : ", submission_account);
    if (type == "add") {
        $(`#tr-account-${id}`).hide();
        submission_account.push(id);
        var htmlAccount = `<tr id="tr-group-account-${id}"> <td>${account_code}</td> <td>${account_name}</td> <td class="text-center mx-0"> <div class="d-flex text-center"> <div class="badge-circle badge-circle-sm badge-circle-danger pointer text-center" onclick="checkRemoveData(${id}, 'remove')"> <i class="bx bx-x font-size-base"></i> </div> </div> </td> </tr>`;
        $("#group-account-list").append(htmlAccount);
    } else {
        var index = submission_account.indexOf(id);
        submission_account.splice(index, 1);
        $(`#tr-account-${id}`).show();
        $(`#tr-group-account-${id}`).remove();
    }
}
