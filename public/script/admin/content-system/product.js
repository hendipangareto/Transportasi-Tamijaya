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

var submission_target = [];
const data = getUrl();

$(document).ready(function () {
    if (data === "content-general") {
        return;
    } else {
        displayData("main");
        getCountProduct();
    }
});

const loadingTable = `<div class="text-center">
<div class="spinner-border mr-3 spinner-border text-center" role="status">
    <span class="sr-only">Loading...</span>
</div>
<h5 for="">Please Wait.....</h5>
</div>`;

function displayData(type = null) {
    if (type == "main") {
        $("#btn-post-activity").show();
        $("#btn-restore-activity").hide();
        $("#btn-delete-activity").hide();
    } else if (type == "posted") {
        $("#btn-post-activity").hide();
        $("#btn-delete-activity").show();
        $("#btn-restore-activity").hide();
    } else if (type == "deleted") {
        $("#btn-post-activity").hide();
        $("#btn-delete-activity").hide();
        $("#btn-restore-activity").show();
    } else if (type == "new") {
        $("#btn-post-activity").hide();
        $("#btn-delete-activity").hide();
        $("#btn-restore-activity").hide();
    }

    $(`#show-data-${data}`).html(loadingTable);
    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        method: "get",
        success: async function (response) {
            await $(`#show-data-${data}`).html(response);
            submission_target.map(id_product => {
                $(`#row-${data}-${id_product}`).addClass("success-alert");
                setTimeout(() => {
                    $(`#row-${data}-${id_product}`).removeClass(
                        "success-alert"
                    );
                }, 3000);
            });
            submission_target = [];
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function openModal(data, type, id = null) {
    $(`#modal-content-${data}`).LoadingOverlay("show");
    $(`#modal-detail-${data}`).modal("show");
    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            break;
        case "edit":
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/master-data/${data}/${id}/edit`,
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
            $.ajax({
                url: `/admin/master-data/product/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    await fetchData(data, response.data, "DETAIL");
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

function fetchData(data, response, type = null) {
    switch (data) {
        case "content-product":
            if (response.product_featured == 1) {
                $("#btn-featured").hide();
                $("#btn-non-featured").show();
            } else {
                $("#btn-featured").show();
                $("#btn-non-featured").hide();

            }
            $("#id-detail").val(response.id);
            $("#product_code-detail").val(response.product_code);
            $("#category_product-detail").val(response.product_code);
            $("#product_name-detail").val(response.product_name);
            $("#product_slug-detail").val(response.product_slug);
            $("#id_category_product-detail").val(response.id_category_product);
            $("#product_description-detail").val(response.product_description);
            $("#product_usage-detail").val(response.product_usage);
            $("#product_purpose-detail").val(response.product_purpose);
            var src = `../../storage/${response.product_image}`;
            $("#product_image-detail").attr("src", src);
            break;
        default:
            break;
    }
}

function checkData(id) {
    if (!submission_target.includes(id)) {
        submission_target.push(id);
    } else {
        var index = submission_target.indexOf(id);
        submission_target.splice(index, 1);
    }
    $("#submission_target").val(submission_target.toString());
}

function confirmation(data, action) {
    if (submission_target.length == 0) {
        Swal.fire(
            "Peringatan",
            "Silahkan pilih data yang akan di proses terlebih dahulu.",
            "warning"
        );
        return;
    }
    Swal.fire({
        title: "Yakin akan proses data?",
        text: "Data yang di proses tidak dapat dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, proses!"
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/content-system/${data}/${action}`,
                method: "patch",
                data: { submission_target },
                success: async function (response) {
                    Swal.fire(
                        "Pesan",
                        "Data telah berhasil di proses",
                        "success"
                    );
                    if (action == "confirmation-post") {
                        await displayData("posted");
                    } else if (action == "confirmation-delete") {
                        await displayData("deleted");
                    } else if (action == "confirmation-restore") {
                        await displayData("main");
                    }
                    await getCountProduct();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    });
}

function getCountProduct() {
    $.ajax({
        url: `/admin/content-system/${data}/create`,
        method: "get",
        dataType: "json",
        success: async function (response) {
            var data = response.data;
            $("#count-data-post").text(data.count_post);
            $("#count-data-product").text(data.count_product);
            $("#count-data-archieve").text(data.count_archieve);
            $("#count-data-new-product").text(data.count_new_product);
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function changeFeatured(type) {
    var id_product = $("#id-detail").val();

    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        method: "patch",
        data: { id: id_product },
        success: async function (response) {

            console.log(response)
            if (response.status == 300) {
                Toast.fire({
                    icon: "info",
                    title: response.message
                });
                return;
            }
            Swal.fire(
                "Success",
                response.message,
                "success"
            );
            $("#modal-detail-content-product").modal("hide")
            await displayData("posted");
        },
        error: function (err) {
            console.log(err);
        }
    });

}