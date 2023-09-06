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

function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/management-customer/${data}/create`,
        method: "get",
        success: async function (response) {
            await $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
            await $(`#table-${data}`).DataTable();

            // SEARCH DT
            if (id && type == "edit") {
                await searchDT(data_search);
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function searchDT(data_search) {
    var input_search = $("input[type=search]");
    var typing = data_search;
    var index = 0;
    window.next_letter = function () {
        if (index <= typing.length) {
            input_search.value = typing.substr(0, index++);
            $("input[type=search]").val(input_search.value);
            setTimeout("next_letter()", 100);
        }
    };
    next_letter();
    $("input[type=search]").focus();
}

function openModal(data, type, id = null) {
    if (type == "add" || type == "edit") {
        $(`#modal-${data}`).modal("show");
    } else {
        $(`#modal-content-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    }
    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/management-customer/${data}/code`,
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
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/management-customer/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    console.log(response);
                    await fetchData(data, response.data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "detail":
            $(`#modal-content-${data}`).LoadingOverlay("hide");
            $("#id").val(id)
            $.ajax({
                url: `/admin/management-customer/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    if(response.data.status !== "SENT"){
                        $("#reply-body").hide();
                        $("#reply-inbox").hide();
                    }
                    await fetchData(data, response.data, 'DETAIL');
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
    if (type !== 'reply') {
        $(`#form-${data}`)[0].reset();
    }
    $(`#form-${data}`).unbind("submit");
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
        case "activate":
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "reply":
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
            $(`#form-${data}`).submit(function (e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/management-customer/${data}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function (response) {
                        console.log(response);
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
            $(`#form-${data}`).submit(function (e) {
                e.preventDefault();
                var formData = $(`#form-${data}`).serialize();
                console.log(formData)

                $.ajax({
                    url: `/admin/management-customer/${data}/${id}`,
                    type: "patch",
                    data: formData,
                    dataType: "json",
                    success: async function (response) {
                        $("#modal-detail-inbox").modal('hide')
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
                        url: `/admin/management-customer/${data}/${id}`,
                        method: "delete",
                        dataType: "json",
                        success: function (response) {
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
            var id = $("#id").val();
            Swal.fire({
                title: "Yakin akan mengakktifkan data?",
                text: "Data yang di aktif tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!"
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/management-customer/${data}/${id}`,
                        method: "get",
                        dataType: "json",
                        success: async function (response) {
                            await successResponse(
                                "activate",
                                data,
                                response.message,
                                response.data.id
                            );
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            break;

        case "reply":
            Swal.fire({
                title: "Konfirmasi Reply Inbox",
                text: "Apakah anda yakin akan membalas pesan berikut?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!"
            }).then(result => {
                if (result.isConfirmed) {
                    $("#modal-detail-inbox").modal('hide');
                    var id = 1;
                    $.ajax({
                        url: `/admin/management-customer/${data}/${id}`,
                        type: "patch",
                        data: { reply_message: 'Balas Dulu' },
                        dataType: "json",
                        success: function (response) {
                            console.log(response)
                            successResponse(
                                "reply",
                                data,
                                response.message,
                                response.data.id
                            );
                        },
                        error: function (err) {
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
        case "inbox":
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
        default:
            break;
    }
}

function fetchData(data, response, type = null) {
    switch (data) {
        case "inbox":
            $("#id").val(response.id);
            $("#inbox_name").val(response.inbox_name);
            var date_created = response.created_at;
            date_created = new Date(date_created);
            const dtf = new Intl.DateTimeFormat('en', {
                year: 'numeric',
                month: 'long',
                day: '2-digit'
            })
            const [{
                value: mob
            }, , {
                value: dab
            }, , {
                value: yeb
            }] = dtf.formatToParts(date_created);
            var created_at = `${dab} ${mob} ${yeb}`;
            $("#created_at").val(created_at);
            $("#inbox_phone").val(response.inbox_phone);
            $("#inbox_email").val(response.inbox_email);
            $("#inbox_message").val(response.inbox_message);
            $("#inbox_subject").val(response.inbox_subject);
            break;
        case "customer":
            $("#id").val(response.id);
            $("#customer_code").val(response.customer_code);
            $("#id_province").val(response.id_province);
            getCityByProvince(response.id_province)
            $("#customer_name").val(response.customer_name);
            $("#customer_email").val(response.customer_email);
            $("#customer_phone").val(response.customer_phone);
            $("#customer_address").val(response.customer_address);
            break;
    }
}


function getCityByProvince(id_province) {
    $.ajax({
        url: `/admin/master-data/province/get-city-by-province/${id_province}`,
        method: "get",
        dataType: "json",
        success: function (response) {
            var cities = response.data;
            var html = `<option value="">Pilih Kota</option>`;
            cities.forEach(city => {
                let selected = '';
                if (city.id_state === id_province) {
                    selected = 'selected';
                }
                html += `<option ${selected} value="${city.id}">${city.city_name}</option>`;
            });
            $("#id_city").html(html)
        },
        error: function (err) {
            console.log(err);
        }
    });

}