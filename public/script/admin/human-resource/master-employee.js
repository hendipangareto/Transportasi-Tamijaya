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
        url: `/admin/human-resource/${data}/create`,
        method: "get",
        success: async function (response) {
            await $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
            await $(`#table-${data}`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function openModal(data, type, id = null) {
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
    }
    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/human-resource/${data}/code`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    // if (data.includes("-")) {
                    //     code = data.replaceAll("-", "_");
                    // }
                    // await $(`#${code}_code`).val(response.data)
                    if (data == 'master-employee') {
                        $("#employee_code").val(response.data)
                    } else {
                        $(`#${data}_code`).val(response.data)

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
                url: `/admin/human-resource/${data}/${id}/edit`,
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
                url: `/admin/human-resource/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    fetchData(data, response.data, 'DETAIL');
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

    if (data == 'blog') {
        CKEDITOR.instances['blog_content'].setData('');
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    }
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

function manageData(type, id = null) {
    switch (type) {
        case "save":
            $(`#form-${data}`).submit(function (e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/human-resource/${data}`,
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
                    var url = `/admin/human-resource/${data}/update/edit-${data}`;
                    $.ajax({
                        url: url,
                        type: "post",
                        data: formData,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: async function (response) {
                            console.log(response)
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
                        url: `/admin/human-resource/${data}/${id}`,
                        type: "patch",
                        data: formData,
                        dataType: "json",
                        success: async function (response) {
                            console.log(response);
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
                        url: `/admin/human-resource/${data}/${id}`,
                        method: "delete",
                        // dataType: "json",
                        success: function (response) {
                            console.log(response);
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
            var id = $("#id").val();
            Swal.fire({
                title: "Yakin akan mengaktifkan data?",
                text: "Data yang di aktif tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!"
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/human-resource/${data}/${id}`,
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
        default:
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

function getPositionByDeparment(id_department) {
    $.ajax({
        url: `/admin/master-data/department/get-position-by-department/${id_department}`,
        method: "get",
        dataType: "json",
        success: function (response) {
            var positions = response.data;
            var html = `<option value="">Silahkan Pilih Jabatan</option>`;
            positions.forEach(position => {
                let selected = '';
                if (position.id_department === id_department) {
                    selected = 'selected';
                }
                html += `<option ${selected} value="${position.id}">${position.position_name}</option>`;
            });
            $("#id_position").html(html)
        },
        error: function (err) {
            console.log(err);
        }
    });

}

function fetchData(data, response, type = null) {
    switch (data) {
        case "master-employee":
            $("#id").val(response.id);
            $("#employee_code").val(response.employee_code);
            $("#id_department").val(response.id_department);
            getPositionByDeparment(response.id_department)

            $("#employee_name").val(response.employee_name);
            break;
        case "agent":
            $("#id").val(response.id);
            $("#agent_code").val(response.agent_code);
            $("#agent_domicile").val(response.agent_domicile);
            $("#agent_name").val(response.agent_name);
            $("#agent_description").val(response.agent_description);
            if (type == 'DETAIL') {
                $("#detail-agent_name").val(response.agent_name);
                $("#detail-agent_domicile").val(response.agent_domicile);
            }
            break;

    }
}

function detailSpecification() {
    $("#detail-specification").show();
    var id = $("#id-detail").val();
    $.ajax({
        url: `/admin/human-resource/${data}/${id}/edit`,
        method: "get",
        dataType: "json",
        success: async function (response) {
            console.log(response);

        },
        error: function (err) {
            console.log(err);
        }
    });
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
