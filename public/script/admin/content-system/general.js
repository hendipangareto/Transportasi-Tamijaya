$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function () { });
const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var data = arr[5];
    return data;
};

const data = getUrl();

const loadingData = `<div class="text-center">
<div class="spinner-border mr-3 spinner-border text-center" role="status">
    <span class="sr-only">Loading...</span>
</div>
<h5 for="">Please Wait.....</h5>
</div>`;

function displayData(type = null) {
    $(`#show-data-${data}`).html(loadingData);
    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        method: "get",
        success: async function (response) {
            await $(`#show-data-${data}`).html(response);
            if (type == "about-us") {
                displayDataAboutUs();
                $("#title-general").text('About Us')
            } else if (type == "contact-us") {
                displayDataContactUs();
                $("#title-general").text('Contact Us')
            } else if (type == "carousel") {
                displayDataCarousel();
                $("#title-general").text('Carousel')
            } else if (type == "principal") {
                displayDataPrincipal();
                $("#title-general").text('Principal')
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function getSequence(isUpdate = null, sequence = null) {
    var max_sequence = 6;
    var option = `<option value="">Silahkan Urutan Carousel</option>`;
    if (isUpdate == "update") {
        option += `<option value="${sequence}" selected>${sequence}</option>`;
        for (i = 1; i <= max_sequence; i++) {
            if (!sequence_exist.includes(i)) {
                option += `<option value="${i}">${i}</option>`;
            }
        }
        $("#carousel_sequence_edit").html(option)
    } else {
        for (i = 1; i <= max_sequence; i++) {
            if (!sequence_exist.includes(i)) {
                option += `<option value="${i}">${i}</option>`;

            }
        }
        $("#carousel_sequence").html(option)
    }



}

function openForm(type, action) {
    $(`#form-${data}-${type} :input`).attr("disabled", false);
    $(`#btn-add-${data}-${type}`).hide();
    $(`#btn-cancel-${data}-${type}`).show();
    $(`.btn-icon`).attr("disabled", true);
    switch (action) {
        case "add":
            $(`#form-${data}-${type}`)[0].reset();
            $(`#add-${type}`).show();
            $(`#edit-${type}`).hide();
            getSequence();
            break;
        case "edit":
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/management-user/${data}/${id}/edit`,
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
        case "cancel":
            $(`#form-${data}-${type} :input`).attr("disabled", true);
            $(`#btn-add-${data}-${type}`).show();
            $(`#btn-cancel-${data}-${type}`).hide();
            $(`#add-${type}`).hide();
            $(`#edit-${type}`).hide();
            $(`.btn-icon`).attr("disabled", false);

            $("#carousel_sequence").html(`<option value="" selected>Silahkan Urutan Carousel</option>`)
            // $(`#form-${data}-${type}`)[0].reset();
            break;
        default:
            break;
    }
}

function triggerAction(type, action) {
    switch (type) {
        case "overview":
            if (action == "edit") {
                $(`#text-${type}`).hide();
                $(`#company_${type}`).show();
                $(`#btn-edit-about-us-${type}`).hide();
                $(`#btn-save-about-us-${type}`).show();
                displayDataAboutUs();
            } else {
                $(`#text-${type}`).show();
                $(`#company_${type}`).hide();
                $(`#btn-edit-about-us-${type}`).show();
                $(`#btn-save-about-us-${type}`).hide();
                updateGeneralAboutUs(type);
            }
            break;
        case "vision-mission":
            if (action == "edit") {
                $(`#text-vision`).hide();
                $(`#text-mission`).hide();
                $(`#company_vision`).show();
                $(`#company_mission`).show();
                $(`#btn-edit-about-us-${type}`).hide();
                $(`#btn-save-about-us-${type}`).show();
                displayDataAboutUs();
            } else {
                $(`#text-vision`).show();
                $(`#text-mission`).show();
                $(`#company_vision`).hide();
                $(`#company_mission`).hide();
                $(`#btn-edit-about-us-${type}`).show();
                $(`#btn-save-about-us-${type}`).hide();
                updateGeneralAboutUs(type);
            }
            break;
        case "description":
            if (action == "edit") {
                $(`#text-${type}`).hide();
                $(`#company_${type}`).show();
                $(`#btn-edit-about-us-${type}`).hide();
                $(`#btn-save-about-us-${type}`).show();
                displayDataAboutUs();
            } else {
                $(`#text-${type}`).show();
                $(`#company_${type}`).hide();
                $(`#btn-edit-about-us-${type}`).show();
                $(`#btn-save-about-us-${type}`).hide();
                updateGeneralAboutUs(type);
            }
            break;
        case "tagline":
            if (action == "edit") {
                $(`#text-${type}`).hide();
                $(`#company_${type}`).show();
                $(`#btn-edit-about-us-${type}`).hide();
                $(`#btn-save-about-us-${type}`).show();
                displayDataAboutUs();
            } else {
                $(`#text-${type}`).show();
                $(`#company_${type}`).hide();
                $(`#btn-edit-about-us-${type}`).show();
                $(`#btn-save-about-us-${type}`).hide();
                updateGeneralAboutUs(type);
            }
            break;
        case "location":
            if (action == "edit") {
                $(`#text-company-location`).hide();
                $(`#text-company-address`).hide();
                $(`#company_location`).show();
                $(`#company_address`).show();
                $(`#btn-edit-contact-us-${type}`).hide();
                $(`#btn-save-contact-us-${type}`).show();
                displayDataContactUs();
            } else {
                $(`#text-company-location`).show();
                $(`#text-company-address`).show();
                $(`#company_location`).hide();
                $(`#company_address`).hide();
                $(`#btn-edit-contact-us-${type}`).show();
                $(`#btn-save-contact-us-${type}`).hide();
                updateGeneralContactUs(type);
            }
            break;
        case "social-media":
            if (action == "edit") {
                $(`#text-company-facebook`).hide();
                $(`#text-company-twitter`).hide();
                $(`#text-company-linked_in`).hide();
                $(`#company_facebook`).show();
                $(`#company_twitter`).show();
                $(`#company_linked_in`).show();
                $(`#btn-edit-contact-us-${type}`).hide();
                $(`#btn-save-contact-us-${type}`).show();
                displayDataContactUs();
            } else {
                $(`#text-company-facebook`).show();
                $(`#text-company-twitter`).show();
                $(`#text-company-linked_in`).show();
                $(`#company_facebook`).hide();
                $(`#company_twitter`).hide();
                $(`#company_linked_in`).hide();
                $(`#btn-edit-contact-us-${type}`).show();
                $(`#btn-save-contact-us-${type}`).hide();
                updateGeneralContactUs(type);
            }
            break;
        case "contact":
            if (action == "edit") {
                $(`#text-company-email`).hide();
                $(`#text-company-phone`).hide();
                $(`#company_email`).show();
                $(`#company_phone`).show();
                $(`#btn-edit-contact-us-${type}`).hide();
                $(`#btn-save-contact-us-${type}`).show();
                displayDataContactUs();
            } else {
                $(`#text-company-email`).show();
                $(`#text-company-phone`).show();
                $(`#company_email`).hide();
                $(`#company_phone`).hide();
                $(`#btn-edit-contact-us-${type}`).show();
                $(`#btn-save-contact-us-${type}`).hide();
                updateGeneralContactUs(type);
            }
            break;
        default:
            break;
    }
}

function triggerNav(type = null) {
    $(".init-display").show();
    $(".remove-display").hide();

    // switch(type)
}

function displayDataPrincipal() {
    console.log('FUNCTION')
}

function displayDataAboutUs() {
    $.ajax({
        url: `/admin/content-system/${data}/about-us/edit`,
        method: "get",
        success: async function (response) {
            var data = await response.data;
            $("#text-overview").text(data.company_overview);
            $("#text-vision").text(data.company_vision);
            $("#text-mission").text(data.company_mission);
            $("#text-description").text(data.company_description);
            $("#company_description").val(data.company_description);
            $("#company_vision").val(data.company_vision);
            $("#company_mission").val(data.company_mission);
            $("#company_overview").val(data.company_overview);
        },
        error: function (err) {
            console.log(err);
        }
    });
}
function displayDataContactUs() {
    $.ajax({
        url: `/admin/content-system/${data}/contact-us/edit`,
        method: "get",
        success: async function (response) {
            var data = await response.data;
            $("#text-company-location").text(data.company_location);
            $("#text-company-address").text(data.company_address);
            $("#text-company-facebook").text(data.company_facebook);
            $("#text-company-twitter").text(data.company_twitter);
            $("#text-company-linked_in").text(data.company_linked_in);
            $("#text-company-phone").text(data.company_phone);
            $("#text-company-email").text(data.company_email);

            // INPUT
            $("#company_location").val(data.company_location);
            $("#company_address").val(data.company_address);
            $("#company_facebook").val(data.company_facebook);
            $("#company_twitter").val(data.company_twitter);
            $("#company_linked_in").val(data.company_linked_in);
            $("#company_phone").val(data.company_phone);
            $("#company_email").val(data.company_email);
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function updateGeneralAboutUs(type) {
    var formData = $(`#form-about-us`).serialize();
    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        type: "patch",
        data: formData,
        dataType: "json",
        success: async function (response) {
            Toast.fire({
                icon: "success",
                title: response.message
            });
            displayDataAboutUs();
        },
        error: async function (err) {
            console.log(err);
        }
    });
}

function updateGeneralContactUs(type) {
    var formData = $(`#form-contact-us`).serialize();
    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        type: "patch",
        data: formData,
        dataType: "json",
        success: async function (response) {
            Toast.fire({
                icon: "success",
                title: response.message
            });
            displayDataContactUs();
        },
        error: async function (err) {
            console.log(err);
        }
    });
}


function manageData(action, type, id = null) {
    switch (action) {
        case "save":
            $(`#form-${data}-${type}`).submit(function (e) {
                $(`#add-${type}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/content-system/${data}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function (response) {
                        await successResponse(
                            "add",
                            type,
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, type);
                    }
                });
            });
            break;
        case "update":
            var id = $("#id_carousel").val();
            $(`#form-${type}-update`).submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/content-system/${data}/carousel/${id}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function (response) {
                        $(`#form-${type}-update`).unbind("submit");
                        Toast.fire({
                            icon: "success",
                            title: response.message
                        });
                        $("#modal-detail-carousel").modal('hide')
                        displayDataCarousel()
                        // await successResponse(
                        //     "add",
                        //     type,
                        //     response.message,
                        //     response.data.id
                        // );
                    },
                    error: async function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, type);
                    }
                });
            });
            break;
        case "delete":
            switch (type) {
                case 'carousel':
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
                            var id = $("#id_carousel").val();
                            $.ajax({
                                url: `/admin/content-system/${data}/carousel/${id}`,
                                method: "delete",
                                dataType: "json",
                                success: async function (response) {
                                    console.log(response)
                                    var index = 0;
                                    sequence_exist.filter(seq => {
                                        if (seq == response.sequence) {
                                            sequence_exist.splice(index);
                                        }
                                        index++;
                                    });
                                    Toast.fire({
                                        icon: "success",
                                        title: response.message
                                    });
                                    $(`#modal-detail-${type}`).modal('hide')
                                    await displayDataCarousel()
                                    await getSequence()
                                },
                                error: function (err) {
                                    console.log(err);
                                }
                            });
                        }
                    });
                    break
                default:
                    break
            }
            break;
        case "detail":
            if (id) {
                $(`#modal-detail-${type}`).modal('show')
                $(".btn-init-detail").show();
                $(".btn-after-detail").hide();
                $("#id_carousel").attr('disabled', 'true')
                $("#carousel_name").attr('disabled', 'true')
                $("#carousel_description").attr('disabled', 'true')
                $("#carousel_sequence_edit").attr('disabled', 'true')
                $("#image-group").hide()
                $.ajax({
                    url: `/admin/content-system/${data}/carousel/${id}`,
                    method: "get",
                    success: async function (response) {
                        var data = await response.data;

                        getSequence('update', data.carousel_sequence)
                        $("#id_carousel").val(data.id)
                        $("#carousel_name").val(data.carousel_name)
                        $("#carousel_description").val(data.carousel_description)
                        $("#carousel_sequence_edit").val(data.carousel_sequence)
                        var src = `../../storage/${data.carousel_image}`
                        $("#preview_image").attr("src", src);

                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $("#id_carousel").removeAttr('disabled')
                $("#carousel_name").removeAttr('disabled')
                $("#carousel_description").removeAttr('disabled')
                $("#carousel_sequence_edit").removeAttr('disabled')
                $(".btn-init-detail").hide();
                $(".btn-after-detail").show();
                $("#image-group").show()
            }
            break;
        case "cancel":
            var id = $("#id_carousel").val();
            manageData('detail', 'carousel', id)
            break;

        case "update-sequence":
            var id = $("#id").val();
            Swal.fire({
                title: "Yakin akan mengubah data urutan?",
                text: "Data urutan akan menyesuaikan dengan perubahan data",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, saya yakin!"
            }).then(result => {
                if (result.isConfirmed) {
                    var formData = $(`#form-principal`).serialize();
                    $.ajax({
                        url: `/admin/content-system/principal/update-sequence/${id}`,
                        method: "patch",
                        data: formData,
                        dataType: "json",
                        success: async function (response) {
                            var message = response.message;
                            await Swal.fire(
                                'Success',
                                message,
                                'success'
                            )

                            var id_category = response.data.principal.id_category_product;
                            await getPrincipalByCategory(id_category);
                            $(`#modal-principal-sequence`).modal("hide");
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


const successResponse = (action, type, message, id = null) => {
    $(`#form-${data}-${type}`)[0].reset();
    $(`#form-${data}-${type}`).unbind("submit");
    switch (action) {
        case "add":
            $(`#add-${type}`).removeAttr("disabled");
            Toast.fire({
                icon: "success",
                title: message
            });
            openForm('carousel', 'cancel')
            displayDataCarousel()
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
        default:
            break;
    }
};


var sequence_exist = [];
function displayDataCarousel() {
    $("#data-carousel").html('<tr><td colspan="3" class="text-center">Loading.....</td></tr>')
    $.ajax({
        url: `/admin/content-system/${data}/carousel/edit`,
        method: "get",
        success: async function (response) {
            var data = await response.data;
            var html;
            if (data.length > 0) {
                data.forEach(carousel => {
                    html += `
                    <tr id="row-carousel-${carousel.id}">
                        <td>${carousel.carousel_name}</td>
                        <td>${carousel.carousel_description}</td>
                        <td><button type="button" id="" class="btn btn-sm btn-icon btn-outline-primary"
                            onclick="manageData('detail','carousel', '${carousel.id}')"><i class="bx bx-info-circle"></i></button></td>
                    </tr>`;
                    sequence_exist.push(carousel.carousel_sequence)
                });
            } else {
                html += `
                <tr >
                    <td colspan="3" class="text-center">Tidak terdapat data carousel</td>
                </tr>`;
            }
            $("#data-carousel").html(html)
        },
        error: function (err) {
            console.log(err);
        }
    });
}


function handleError(err, err_log, type) {
    $(`#add-${type}`).removeAttr("disabled");
    $(`#form-${data}-${type}`).unbind("submit");
    switch (type) {
        case "carousel":
            if (err.status == 422) {
                if (typeof err_log.carousel_image !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.carousel_image[0]
                    });
                }
                if (typeof err_log.carousel_sequence !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.carousel_sequence[0]
                    });
                }
                if (typeof err_log.carousel_description !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.carousel_description[0]
                    });
                }
                if (typeof err_log.carousel_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.carousel_name[0]
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


function getPrincipalByCategory(id) {
    var html = ``;
    var loading = `<tr>
    <td colspan="6" class="text-center">Please Wait.....</td>
</tr>`;


    $(`#data-${id}-principal`).html(loading)
    $.ajax({
        url: `/admin/master-data/product/get-principal-by-category/${id}`,
        method: "get",
        success: async function (response) {
            var data = response.data;

            if (data.length > 0) {
                data.map(principal => {
                    html += `<tr>
                    <td>${principal.principal_sequence}</td>
                    <td>${principal.principal_code}</td>
                    <td>${principal.principal_name}</td>
                    <td>${principal.principal_name}</td>
                    <td>Total Produk</td>
                    <td><button type="button" class="btn btn-sm btn-icon btn-outline-primary mr-1"
                    onclick="openModal('principal','sequence', ${principal.id})"><i class="bx bx-sort"></i></button></td>
                </tr>`
                })
            } else {
                html += `<tr>
                <td colspan="6" class="text-center">Tidak ada data produk</td>
            </tr>`
            }

            $(`#data-${id}-principal`).html(html)
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function openModal(data, type, id = null) {
    if (type == "sequence") {
        $(`#modal-${data}-${type}`).modal("show");
        $.ajax({
            url: `/admin/master-data/${data}/${id}/edit`,
            method: "get",
            dataType: "json",
            success: async function (response) {
                await fetchData(data, response.data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
}


function fetchData(data, response) {
    switch (data) {
        case 'principal':
            $("#id").val(response.id)
            $("#id_category_product").val(response.id_category_product)
            $("#id_category_product_sequence").val(response.id_category_product)
            $("#principal_code").val(response.principal_code)
            $("#principal_name").val(response.principal_name)
            var sequence_data = response.principal_sequence;
            // GET SEQUENCE
            $.ajax({
                url: `/admin/content-system/principal/get-sequence/${response.id_category_product}`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    console.log(response)
                    var count = response.count_data;
                    var html = ``;
                    for (i = 1; i <= count; i++) {
                        if (i == sequence_data) {
                            selected = 'selected';
                        } else {
                            selected = '';

                        }
                        html += `<option value="${i}" ${selected}>${i}</option>`
                    }
                    $("#principal_sequence").html(html)
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


// function manageData(type, id = null) {
//     switch (type) {
//         case "update-sequence":
//             var id = $("#id").val();
//             Swal.fire({
//                 title: "Yakin akan mengubah data urutan?",
//                 text: "Data urutan akan menyesuaikan dengan perubahan data",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: "#3085d6",
//                 cancelButtonColor: "#d33",
//                 confirmButtonText: "Ya, saya yakin!"
//             }).then(result => {
//                 if (result.isConfirmed) {
//                     var formData = $(`#form-principal`).serialize();
//                     $.ajax({
//                         url: `/admin/content-system/principal/update-sequence/${id}`,
//                         method: "patch",
//                         data: formData,
//                         dataType: "json",
//                         success: async function (response) {
//                             var message = response.message;
//                             await Swal.fire(
//                                 'Success',
//                                 message,
//                                 'success'
//                               )

//                             var id_category = response.data.principal.id_category_product;
//                             await getPrincipalByCategory(id_category);
//                             $(`#modal-principal-sequence`).modal("hide");
//                         },
//                         error: function (err) {
//                             console.log(err);
//                         }
//                     });
//                 }
//             });
//             break;
//         default:
//             break;
//     }
// }

