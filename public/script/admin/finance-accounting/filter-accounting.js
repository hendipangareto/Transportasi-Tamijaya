$(document).ready(function () {
    getDataMasterFinance();
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

const numberWithCommas = x => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var data = arr[5];
    return data;
};

var indexJournal = 0;

const data = getUrl();

var accounts = [];
var balanceAktiva = [];
var balancePasiva = [];
function getDataMasterFinance() {
    $.ajax({
        url: `/admin/finance-accounting/filter-accounting/get-data/all-data-finance-accounting`,
        method: "get",
        success: function (response) {
            var html_account = `<option>Silahkan Pilih Account</option>`
            response.data.account.forEach(account => {
                html_account += `<option value="${account.account_name}">${account.account_name}</option>`
                accounts.push(account)
            })

            var html_group = `<option>Silahkan Pilih Group</option>`
            response.data.aktiva.forEach(aktiva => {
                html_group += `<option value="${aktiva.balance_aktiva_name}">${aktiva.balance_aktiva_name}</option>`
                balanceAktiva.push(aktiva)
            })
            response.data.pasiva.forEach(pasiva => {
                html_group += `<option value="${pasiva.balance_pasiva_name}">${pasiva.balance_pasiva_name}</option>`
                balancePasiva.push(pasiva)
            })
            $("#group_transaction").html(html_group)
            $("#account_transaction").html(html_account)


        },
        error: function (err) {
            console.log(err);
        },
    });
}

function openModal(data, type, id = null) {
    console.log(data, type, id)
    if (type == "add" || type == "edit") {
        $(`#form-data-${data}`).LoadingOverlay("show");
        $(`#form-data-${data}`).show();
        $(`#show-data-${data}`).hide();
        $(`#btn-add-${data}`).hide();
        $(`#btn-back-${data}`).show();
    } else if (type == "back") {
        $(`#form-data-${data}`).hide();
        $(`#show-data-${data}`).show();
        $(`#btn-add-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == "detail") {
        $(`#modal-detail-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    }
    switch (type) {
        case "add":
            $(`#form-data-${data}`).LoadingOverlay("hide");
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            $.ajax({
                url: `/admin/finance-accounting/${data}/code`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    $("#journal_number").val(response.data);
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;
        case "edit":
            $(`#form-${data}`)[0].reset();
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/finance-accounting/${data}/${id}/edit`,
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
            $.ajax({
                url: `/admin/finance-accounting/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    var html_detail = ``;

                    $("#detail-journal_number").val(response.data.journal.journal_number)
                    $("#detail-journal_date").val(formatDate(response.data.journal.journal_date))
                    $("#detail-journal_description").val(response.data.journal.journal_description)
                    $("#detail-journal_debit").val(numberWithCommas(response.data.journal.journal_debit))
                    $("#detail-journal_kredit").val(numberWithCommas(response.data.journal.journal_kredit))
                    $("#detail-journal_balance").val(numberWithCommas(response.data.journal.journal_balance))


                    var detail_accounts = response.data.journal_details;
                    detail_accounts.forEach(detail_account => {
                        html_detail += `<tr id="row-input-journal-${detail_account.id}">`;
                        html_detail += `<td id="td-no-account-${detail_account.id}">${detail_account.account_code}`;
                        html_detail += `</td>`;
                        html_detail += `<td id="td-no-name-${detail_account.id}">${detail_account.account_name}`;
                        html_detail += `</td>`;
                        html_detail += `<td class="text-right" id="td-debit-account-${detail_account.id}">`
                        if (detail_account.type_journal == "DEBIT") {
                            html_detail += `${numberWithCommas(detail_account.journal_amount)}`;
                        }
                        html_detail += `</td>`;
                        html_detail += `<td class="text-right" id="td-kredit-account-${detail_account.id}">`;
                        if (detail_account.type_journal == "KREDIT") {
                            html_detail += `${numberWithCommas(detail_account.journal_amount)}`;
                        }
                        html_detail += `</td>`;
                        html_detail += `<td id="td-notes-account-${detail_account.id}">${detail_account.journal_notes}</td>`;
                        html_detail += `</tr>`;
                    })
                    $("#detail-account-journal").html(html_detail)

                    // await fetchData(data, response.data, 'DETAIL');
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;
    }
}
function manageData(type, id = null, category = null) {
    switch (type) {
        case "search":
            var formData = $("#form-search-transaction").serialize();
            $.ajax({
                url: `/admin/finance-accounting/filter-accounting/get-data/filtered`,
                method: "post",
                data: formData,
                success: function (response) {
                    console.log(response)
                },
                error: function (err) {
                    console.log(err);
                },
            });
            break;


    }
}

function handleError(err, err_log, type) {
    $(`#add-${data}`).removeAttr("disabled");
    $(`#form-${data}`).unbind("submit");
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
}
