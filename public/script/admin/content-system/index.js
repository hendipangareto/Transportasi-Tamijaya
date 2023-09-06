
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

$(document).ready(function() {
    if (data === "content-general") {
        return;
    } else {
        displayData("main");
    }
});

const loadingTable = `<div class="text-center">
<div class="spinner-border mr-3 spinner-border text-center" role="status">
    <span class="sr-only">Loading...</span>
</div>
<h5 for="">Please Wait.....</h5>
</div>`;

function displayData(type = null) {
    $(`#show-data-${data}`).html(loadingTable)
    $.ajax({
        url: `/admin/content-system/${data}/${type}`,
        method: "get",
        success: async function(response) {
            await $(`#show-data-${data}`).html(response);
            
        },
        error: function(err) {
            console.log(err);
        }
    });
}
