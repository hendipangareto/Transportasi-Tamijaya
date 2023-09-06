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

$(document).ready(function() {
    if (data === "content-general") {
        return;
    } else {
        displayData("main");
        getCountNews();
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
        $("#btn-post-news").show();
        $("#btn-restore-news").hide();
        $("#btn-delete-news").hide();
    } else if (type == "posted") {
        $("#btn-post-news").hide();
        $("#btn-delete-news").show();
        $("#btn-restore-news").hide();
    } else if (type == "deleted") {
        $("#btn-post-news").hide();
        $("#btn-delete-news").hide();
        $("#btn-restore-news").show();
    }else if (type == "new") {
        $("#btn-post-news").hide();
        $("#btn-delete-news").hide();
        $("#btn-restore-news").hide();
    }

    $(`#show-data-${data}`).html(loadingTable);
    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        method: "get",
        success: async function(response) {
            await $(`#show-data-${data}`).html(response);
            submission_target.map(id_news => {
                $(`#row-${data}-${id_news}`).addClass("success-alert");
                setTimeout(() => {
                    $(`#row-${data}-${id_news}`).removeClass(
                        "success-alert"
                    );
                }, 3000);
            });
            submission_target = [];
        },
        error: function(err) {
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
                success: async function(response) {
                    console.log(response);
                    await fetchData(data, response.data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
            break;
        case "detail":
            $(`#modal-content-${data}`).LoadingOverlay("hide");
            $.ajax({
                url: `/admin/master-data/news/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function(response) {
                    console.log(response)
                    await fetchData(data, response.data, "DETAIL");
                },
                error: function(err) {
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
        case "content-news":
            console.log(response);
            $("#news_code-detail").val(response.news_code);
            $("#category_news-detail").val(response.news_code);
            $("#news_name-detail").val(response.news_name);
            $("#news_slug-detail").val(response.news_slug);
            $("#id_category_news-detail").val(response.id_category_news);
            $("#news_description-detail").val(response.news_description);
            $("#news_usage-detail").val(response.news_usage);
            $("#news_purpose-detail").val(response.news_purpose);
            var src = `../../storage/${response.news_image}`;
            $("#news_image-detail").attr("src", src);
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
                success: async function(response) {
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
                    await getCountNews();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    });
}

function getCountNews() {
    $.ajax({
        url: `/admin/content-system/${data}/create`,
        method: "get",
        dataType: "json",
        success: async function(response) {
            var data = response.data;
            console.log(data)
            $("#count-data-post").text(data.count_post);
            $("#count-data-news").text(data.count_news);
            $("#count-data-archieve").text(data.count_archieve);
            $("#count-data-new-news").text(data.count_new_news);
        },
        error: function(err) {
            console.log(err);
        }
    });
}
