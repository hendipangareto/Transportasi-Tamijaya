$(document).ready(function() {
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

function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/management-user/${data}/create`,
        method: "get",
        success: async function(response) {
            await $(`#show-data-${data}`).html(response);
            $(`#form-${data} :input`).attr("disabled", true);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
            await $(`#table-${data}`).DataTable();
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function openForm(data, type, id = null) {
    $(`#form-${data} :input`).attr("disabled", false);
    $(`#btn-add-${data}`).hide();
    $(`#btn-cancel-${data}`).show();
    $(`.btn-icon`).attr("disabled", true);
    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/management-user/${data}/code`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    var code = `${data}`;
                    if (data.includes("-")) {
                        code = data.replaceAll("-", "_");
                    }
                    await $(`#${code}_code`).val(response.data)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "edit":
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/management-user/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function(response) {
                    console.log(response);
                    await fetchData(data, response.data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
            break;
        case "cancel":
            $(`#form-${data} :input`).attr("disabled", true);
            $(`#btn-add-${data}`).show();
            $(`#btn-cancel-${data}`).hide();
            $(`#add-${data}`).hide();
            $(`#edit-${data}`).hide();
            $(`.btn-icon`).attr("disabled", false);
            $(`#form-${data}`)[0].reset();
            break;
        default:
            break;
    }
}

const successResponse = (type, data, message, id = null) => {
    $(`#form-${data}`)[0].reset();
    $(`#form-${data}`).unbind("submit");
    $(`#form-${data} :input`).attr("disabled", true);
    $(`#btn-add-${data}`).show();
    $(`#btn-cancel-${data}`).hide();
    $(`#add-${data}`).hide();
    $(`#edit-${data}`).hide();
    $(`.btn-icon`).attr("disabled", false);
    displayData(id);
    switch (type) {
        case "add":
            $(`#add-${data}`).removeAttr("disabled");
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "edit":
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "delete":
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        default:
            break;
    }
};

function manageData(type, id = null) {
    switch (type) {
        case "save":
            $(`#form-${data}`).submit(function(e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/management-user/${data}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function(response) {
                        await successResponse(
                            "add",
                            data,
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function(err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, data);
                    }
                });
            });
            break;
        case "update":
            var id = $("#id").val();
            $(`#form-${data}`).submit(function(e) {
                e.preventDefault();
                var formData = $(`#form-${data}`).serialize();
                $.ajax({
                    url: `/admin/management-user/${data}/${id}`,
                    type: "patch",
                    data: formData,
                    dataType: "json",
                    success: async function(response) {
                        await successResponse(
                            "edit",
                            data,
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function(err) {
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, data);
                    }
                });
            });
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
                        url: `/admin/management-user/${data}/${id}`,
                        method: "delete",
                        dataType: "json",
                        success: function(response) {
                            successResponse(
                                "delete",
                                data,
                                response.message,
                                response.data
                            );
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
            break;
        default:
            break;
    }
}

function handleError(err, err_log, type) {
    $(`#add-${data}`).removeAttr("disabled");
    $(`#form-${data}`).unbind("submit");
    switch (type) {
        case "category-product":
            if (err.status == 422) {
                if (typeof err_log.category_product_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.category_product_name[0]
                    });
                }
                if (typeof err_log.category_product_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.category_product_code[0]
                    });
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Terjadi Kesalahan Pada Sistem"
                });
            }
            break;
        case "category-disease":
            if (err.status == 422) {
                if (typeof err_log.category_disease_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.category_disease_name[0]
                    });
                }
                if (typeof err_log.category_disease_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.category_disease_code[0]
                    });
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Terjadi Kesalahan Pada Sistem"
                });
            }
            break;
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

function fetchData(data, response) {
    switch (data) {
        case "role":
            $("#id").val(response.id);
            $("#role_code").val(response.role_code);
            $("#role_name").val(response.role_name);
            $("#role_description").val(response.role_description);
            $("#role_level").val(response.role_level);
            break;
        case "user-admin":
            $("#id").val(response.id);
            $("#username").val(response.username);
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#password").attr("disabled", true);
            break;
        case "status":
            $("#id").val(response.id);
            $("#status_code").val(response.status_code);
            $("#status_name").val(response.status_name);
            $("#status_description").val(response.status_description);
            break;
        default:
            break;
    }
}
