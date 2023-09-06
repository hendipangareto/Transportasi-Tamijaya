$(document).ready(function () {
    displayData();
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

function displayData(type = 'all-transaction') {
    // $(`#table-${type}`).DataTable();
    $.ajax({
        url: `/admin/finance-accounting/reservation-transaction/create`,
        method: "get",
        success: function (response) {
            $(`#${type}`).html(response);
            $(`#table-${type}`).DataTable();

            // if (data !== "balance-aktiva" && data !== "balance-pasiva") {
            // }
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function openModal(data, type, id = null) {
    if (type == 'detail') {
        $(`#modal-detail-transaction`).LoadingOverlay("show");
        $(`#modal-detail-transaction`).modal("show");
    } else if (type == 'view-attachment-reguler' || type == 'view-attachment-pariwisata') {
        $(`#${type}`).show();
    }
    switch (type) {
        case "detail":
            $(`#modal-detail-transaction`).LoadingOverlay("hide");
            $.ajax({
                url: `/admin/finance-accounting/reservation-transaction/${id}/edit`,
                method: "get",
                success: function (response) {
                    $("#detail-data-transaction").html(response)
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
    Toast.fire({
        icon: "success",
        title: message
    });
    switch (type) {
        case "add":
            $(`#add-${data}`).removeAttr("disabled");
            break;
    }
};

function approveReject(type, action, id, regulerType = null) {
    $.ajax({
        url: `/admin/finance-accounting/reservation-transaction`,
        method: "post",
        data: {
            id,
            type,
            action,
            regulerType
        },
        success: function (response) {
            $(`#modal-detail-transaction`).modal("hide");
            Toast.fire({
                icon: "success",
                title: response.message
            });
            displayData('all-transaction');

        },
        error: function (err) {
            console.log(err);
        }
    });
}

function manageData(type, id = null) {
    switch (type) {
        case "approve-reguler":
            approveReject("REGULER", "APPROVE", $("#id-reguler").val(), $("#reguler-type").val())
            break;
        case "reject-reguler":
            approveReject("REGULER", "REJECTED", $("#id-reguler").val(), $("#reguler-type").val())
            break;
        case "approve-pariwisata":
            approveReject("PARIWISATA", "APPROVE", $("#id-pariwisata").val())
            break;
        case "reject-pariwisata":
            approveReject("PARIWISATA", "REJECTED", $("#id-pariwisata").val())
            break;
    }
}