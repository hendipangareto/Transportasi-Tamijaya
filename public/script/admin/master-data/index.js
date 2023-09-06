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
        url: `/admin/master-data/${data}/create`,
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
        $(`#modal-${data}`).modal("show");
    } else if (type == 'back') {
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == 'detail') {
        $(`#modal-detail-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    } else if (type == 'gallery') {
        // $(`#modal-gallery-${data}`).LoadingOverlay("show");
        $(`#modal-gallery-${data}`).modal("show");
    }

    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/master-data/${data}/code`,
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
                url: `/admin/master-data/${data}/${id}/edit`,
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
                url: `/admin/master-data/${data}/${id}/edit`,
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
        case "gallery":
            // $(`#modal-gallery-${data}`).LoadingOverlay("hide");
            $.ajax({
                url: `/admin/master-data/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    console.log(response);
                    await fetchData(data, response.data, 'GALLERY');
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
                    url: `/admin/master-data/${data}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function (response) {
                        // console.log(response);
                        // return;
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
                    var url = `/admin/master-data/${data}/update/edit-${data}`;
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
                        url: `/admin/master-data/${data}/${id}`,
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
                        url: `/admin/master-data/${data}/${id}`,
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
                        url: `/admin/master-data/${data}/${id}`,
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

        case "salary":
            if (err.salary == 422) {
                if (typeof err_log.salary_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.salary_name[0]
                    });
                }
                if (typeof err_log.salary_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.salary_code[0]
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
        case "status":
            $("#id").val(response.id);
            $("#status_code").val(response.status_code);
            $("#status_name").val(response.status_name);
            $("#status_description").val(
                response.status_description
            );
            break;
        case "department":
            $("#id").val(response.id);
            $("#department_code").val(response.department_code);
            $("#department_name").val(response.department_name);
            $("#department_description").val(
                response.department_description
            );
            break;
        case "position":
            $("#id").val(response.id);
            $("#position_code").val(response.position_code);
            $("#position_name").val(response.position_name);
            $("#position_description").val(
                response.position_description
            );
            break;
        case "facility":
            $("#id").val(response.id);
            $("#facility_code").val(response.facility_code);
            $("#facility_name").val(response.facility_name);
            $("#facility_description").val(
                response.facility_description
            );
            break;
        case "unit":
            $("#id").val(response.id);
            $("#unit_code").val(response.unit_code);
            $("#unit_name").val(response.unit_name);
            $("#unit_alias").val(response.unit_alias);
            $("#unit_description").val(
                response.unit_description
            );
            break;
        case "service":
            $("#id").val(response.id);
            $("#service_code").val(response.service_code);
            $("#service_name").val(response.service_name);
            $("#service_description").val(
                response.service_description
            );
            break;
        case "premi":
            $("#id").val(response.id);
            $("#premi_code").val(response.premi_code);
            $("#premi_name").val(response.premi_name);
            $("#premi_amount").val(response.premi_amount);
            $("#premi_description").val(
                response.premi_description
            );
            break;
        case "salary":
            $("#id").val(response.id);
            $("#salary_code").val(response.salary_code);
            $("#salary_name").val(response.salary_name);
            $("#salary_amount").val(response.salary_amount);
            $("#salary_description").val(
                response.salary_description
            );
            break
        case "armada":
            $("#id").val(response.id);
            $("#armada_category").val(response.armada_category);
            $("#armada_type").val(response.armada_type);
            $("#armada_seat").val(response.armada_seat);
            $("#armada_merk").val(response.armada_merk);
            $("#armada_no_police").val(response.armada_no_police);
            break;
        case "bus":
            $("#id").val(response.id);
            $("#bus_code").val(response.bus_code);
            $("#bus_type").val(response.bus_type);
            $("#bus_capacity").val(response.bus_capacity);
            $("#bus_name").val(response.bus_name);
            $("#bus_price").val(response.bus_price);
            $("#bus_description").val(
                response.bus_description
            );

            response.gallery.map((el, i) => {
                var bus_photo_src = `../../storage/${el.bus_photo}`;
                $("#data-image-bus").append(`<img class="w-100" src='` + bus_photo_src + `'/>`);
            });

            var src = `../../storage/${response.bus_image}`;
            $("#bus_gallery_bus_image").attr("src", src);

            $("#bus_gallery_bus_code").val(response.bus_code);
            $("#bus_gallery_bus_type").val(response.bus_type);
            $("#bus_gallery_bus_capacity").val(response.bus_capacity);
            $("#bus_gallery_bus_name").val(response.bus_name);
            $("#bus_gallery_description").val(response.bus_description);

            var facility_bus = response.bus_facility;
            var ex_facility = facility_bus.split(", ");
            var html_facility = ``;
            var selectedFacility = new Array();

            ex_facility.forEach((facility, i) => {
                selectedFacility[i] = $(`#bus_facilities option:contains('${facility}')`).val();
                html_facility += `<div class="badge badge-primary mr-1 mb-1">${facility}</div>`;
            })
            $("#bus_gallery_facility").html(html_facility);
            $("#bus_facilities").select2().val(selectedFacility).trigger("change");

            // Gallery
            var gallery = response.gallery;
            var htmlGallery = `<ol class="carousel-indicators">`;
            var indexGall = 0;
            var indexGallPhoto = 0;
            gallery.forEach(gall => {
                htmlGallery += `<li data-target="#carousel-example-generic" data-slide-to="${indexGall}" class="${(indexGall == 0) ? 'active' : ''}"></li>`;
                indexGall++;
            })
            htmlGallery += `</ol><div class="carousel-inner" role="listbox">`;
            gallery.forEach(gallPhoto => {
                var srcGallery = `../../storage/${gallPhoto.bus_photo}`;
                htmlGallery += ` <div class="carousel-item ${(indexGallPhoto == 0) ? 'active' : ''}"> <img class="img-fluid" src="${srcGallery}" alt="${gallPhoto.bus_photo}"> </div>`;
                indexGallPhoto++;
            })
            htmlGallery += `</div>`;
            $("#carousel-example-generic").html(htmlGallery)
            break;

        case "office":
            $("#id").val(response.id);
            $("#office_code").val(response.office_code);
            $("#office_origin").val(response.office_origin);
            $("#office_name").val(response.office_name);
            $("#office_phone").val(response.office_phone);
            $("#office_address").val(
                response.office_address
            );
            break;
        case "pick-point":
            $("#id").val(response.id);
            $("#pick_point_code").val(response.pick_point_code);
            $("#pick_point_origin").val(response.pick_point_origin);
            $("#pick_point_name").val(response.pick_point_name);
            $("#pick_point_eta").val(response.pick_point_eta);
            $("#pick_point_zone").val(response.pick_point_zone);
            $("#pick_point_description").val(
                response.pick_point_description
            );
            break;
        case "day-off":
            $("#id").val(response.id);
            $("#day_off_code").val(response.day_off_code);
            $("#day_off_name").val(response.day_off_name);
            $("#day_off_date").val(response.day_off_date);
            $("#day_off_description").val(
                response.day_off_description
            );
            break;
        case "schedule":
            $("#id").val(response.id);
            $("#schedule_code").val(response.schedule_code);
            $("#schedule_bus").val(response.schedule_bus);
            $("#schedule_destination").val(response.schedule_destination);
            $("#schedule_day").val(response.schedule_day);
            $("#schedule_description").val(
                response.schedule_description
            );
            break;
        case "destination-wisata":
            $("#id").val(response.id);
            $("#destination_wisata_province").val(response.destination_wisata_province);
            $("#destination_wisata_code").val(response.destination_wisata_code);
            $("#destination_wisata_name").val(response.destination_wisata_name);
            $("#destination_wisata_description").val(
                response.destination_wisata_description
            );
            break;
        case "route-wisata":
            $("#id").val(response.id);
            $("#route_wisata_from").val(response.route_wisata_from);
            $("#route_wisata_target").val(response.route_wisata_target);
            $("#route_wisata_price").val(response.route_wisata_price);
            $("#route_wisata_estimate").val(response.route_wisata_estimate);
            $("#route_wisata_description").val(
                response.route_wisata_description
            );
            break;


    }
}

function detailSpecification() {
    $("#detail-specification").show();
    var id = $("#id-detail").val();
    $.ajax({
        url: `/admin/master-data/${data}/${id}/edit`,
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
