$(document).ready(function () {
    displayData();
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

function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/finance-accounting/${data}/create`,
        method: "get",
        success: async function (response) {
            await $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);

            if (data !== "balance-aktiva" && data !== "balance-pasiva") {
                await $(`#table-${data}`).DataTable();
            }
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
        $(`#btn-import-${data}`).show();
        $(`#btn-back-${data}`).hide();
    } else if (type == "detail") {
        $(`#modal-detail-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    } else if (type == "import") {
        $(`#form-data-${data}`).LoadingOverlay("show");
        $(`#form-${data}`).show();
        $(`#show-data-${data}`).hide();
        $(`#btn-import-${data}`).hide();
        $(`#btn-add-${data}`).hide();
        $(`#btn-back-${data}`).show();
    }
    switch (type) {
        case "import":
            $(`#form-data-${data}`).LoadingOverlay("hide");
            $(`#form-import-${data}`).show();
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).hide();
            $(`#edit-${data}`).hide();

            break;
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

const successResponse = (type, data, message, id = null) => {
    $(`#modal-${data}`).modal("hide");
    $(`#form-${data}`)[0].reset();
    $(`#form-${data}`).unbind("submit");
    displayData(id);
    Toast.fire({
        icon: "success",
        title: message,
    });
};

function generateDatatoJSON(){
    var formData = new FormData();
    formData.append('file',$("#journal-file")[0].files[0]);

    $.ajax({
        url: `/admin/finance-accounting/journal/convert-data/excel`,
        type: "post",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
        },
        error: async function (err) {
            $(`#form-journal`).unbind("submit");
            console.log(err);
            let err_log = err.responseJSON.errors;
            await handleError(err, err_log, data);
        },
    });
}

function submitData() {
    $(`#form-journal`).submit(function (e) {
        // $(`#add-journal`).attr("disabled", true);
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: `/admin/finance-accounting/journal`,
            type: "post",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $(`#form-journal`).unbind("submit");
                $("#input-body-journal").html("");
                indexJournal = 0;
                $(`#form-data-journal`).hide();
                $(`#show-data-journal`).show();
                $(`#btn-add-journal`).show();
                $(`#btn-back-journal`).hide();
                successResponse(
                    "add",
                    data,
                    response.message,
                    response.data.id
                );
            },
            error: async function (err) {
                $(`#form-journal`).unbind("submit");
                console.log(err);
                let err_log = err.responseJSON.errors;
                await handleError(err, err_log, data);
            },
        });
    });
}

function manageData(type, id = null, category = null) {
    switch (type) {
        case "save":
            if ($("#journal_debit").val() !== $("#journal_kredit").val()) {
                Swal.fire({
                    title: "Data Jurnal belum balance, Silahkan cek kembali",
                    text: "Apakah anda yakin akan membuat Jurnal?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then(result => {
                    if (result.isConfirmed) {
                        submitData();
                    }
                });
                return;
            }
            submitData();

            break;

        case "update":
            var id = $("#id").val();
            if (
                data === "principal" ||
                data === "product" ||
                data === "product-boditech" ||
                data === "featured-product"
            ) {
                $(`#form-${data}`).submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var url = `/admin/finance-accounting/${data}/update/edit-${data}`;
                    $.ajax({
                        url: url,
                        type: "post",
                        data: formData,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: async function (response) {
                            await successResponse(
                                "edit",
                                data,
                                response.message,
                                response.data.id
                            );
                        },
                        error: async function (err) {
                            console.log(err);
                            let err_log = err.responseJSON.errors;
                            await handleError(err, err_log, data);
                        },
                    });
                });
            } else {
                $(`#form-${data}`).submit(function (e) {
                    e.preventDefault();
                    var formData = $(`#form-${data}`).serialize();
                    $.ajax({
                        url: `/admin/finance-accounting/${data}/${id}`,
                        type: "patch",
                        data: formData,
                        dataType: "json",
                        success: async function (response) {
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
                        },
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
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/finance-accounting/${data}/${id}`,
                        method: "delete",
                        // dataType: "json",
                        success: function (response) {
                            if (response.status == 300) {
                                Toast.fire({
                                    icon: "error",
                                    title: response.message,
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
                        },
                    });
                }
            });
            break;
        case "remove":
            $(`#row-input-journal-${id}`).remove();
            calculateDebitKredit();
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

function fetchData(data, response, type = null) {
    switch (data) {
        case "journal":
            $("#id").val(response.id);
            $("#journal_code").val(response.journal_code);
            $("#journal_name").val(response.journal_name);
            break;
    }
}

const formatDate = (data_date) => {
    var DATE_FORMAT = new Date(data_date);

    const dtf = new Intl.DateTimeFormat("en", {
        year: "numeric",
        month: "2-digit",
        day: "numeric",
    });
    const [{ value: month }, , { value: date }, , { value: year }] =
        dtf.formatToParts(DATE_FORMAT);

    var VALUE_DATE = `${date}/${month}/${year}`;
    return VALUE_DATE;
};

function convertSlug() {
    var value = $("#blog_headline").val();
    var slug = value
        .toLowerCase()
        .replace(/ /g, "-")
        .replace(/[^\w-]+/g, "");
    $("#blog_slug").val(slug);
}
function addJournal() {
    $.ajax({
        url: `/admin/finance-accounting/${data}/get-data/account`,
        method: "get",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            var html = "";
            html += `<tr id="row-input-journal-${indexJournal}">`;
            html += `<td id="td-no-account-${indexJournal}">`;
            html += `<select id="account-code-${indexJournal}" class="form-control form-control-sm select2-jurnal-account" name="id_account[]" onchange="chooseAccount('CODE', ${indexJournal})">`;
            html += `<option>Pilih Kode</option>`;
            html += `<optgroup label="DEBIT">`;
            data.forEach((account_debit) => {
                if (account_debit.account_type == "AKTIVA") {
                    html += `<option value="${account_debit.id}">${account_debit.account_code}</option>`;
                }
            });
            html += `</optgroup>`;
            html += `<optgroup label="KREDIT">`;
            data.forEach((account_kredit) => {
                if (account_kredit.account_type == "PASIVA") {
                    html += `<option value="${account_kredit.id}">${account_kredit.account_code}</option>`;
                }
            });
            html += `</optgroup>`;

            html += `</select>`;
            html += `</td>`;
            html += `<td id="td-no-name-${indexJournal}">`;
            html += `<select class="form-control form-control-sm select2-jurnal-account" onchange="chooseAccount('NAME', ${indexJournal})" id="account-name-${indexJournal}" >`;
            html += `<option>Pilih Account</option>`;
            html += `<optgroup label="DEBIT">`;
            data.forEach((account_debit) => {
                if (account_debit.account_type == "AKTIVA") {
                    html += `<option value="${account_debit.id}">${account_debit.account_name}</option>`;
                }
            });
            html += `</optgroup>`;
            html += `<optgroup label="KREDIT">`;
            data.forEach((account_kredit) => {
                if (account_kredit.account_type == "PASIVA") {
                    html += `<option value="${account_kredit.id}">${account_kredit.account_name}</option>`;
                }
            });
            html += `</optgroup>`;
            html += `</select>`;
            html += `</td>`;
            html += `<td id="td-debit-account-${indexJournal}"></td>`;
            html += `<td id="td-kredit-account-${indexJournal}"></td>`;
            html += `<td id="td-notes-account-${indexJournal}">
            <input style="font-size:11px" class="form-control form-control-sm" name="journal_notes[]"/>
            <input type="hidden" name="type_journal[]" id="type-journal-${indexJournal}"/>
            </td>`;
            html += `<td id="td-action-account-${indexJournal}"><div class="d-flex text-center"> <div class="badge-circle badge-circle-sm badge-circle-danger pointer text-center" onclick="manageData('remove', ${indexJournal})"> <i class="bx bx-x font-size-base"></i> </div> </div></td>`;
            html += `</tr>`;
            indexJournal++;
            $("#input-body-journal").append(html);
            $(".select2-jurnal-account").select2();
        },
        error: function (err) {
            console.log(err);
        },
    });
}

function chooseAccount(type, index) {
    var id_account;
    if (type == "CODE") {
        id_account = $(`#account-code-${index}`).val();
    } else {
        id_account = $(`#account-name-${index}`).val();
    }
    console.log("function chooseAccount Running");
    $(`#form-${data}`).unbind("submit");
    $.ajax({
        url: `/admin/finance-accounting/master-data/account/${id_account}/edit`,
        method: "get",
        dataType: "json",
        success: function (response) {
            var typeAccount = response.data.account_type;
            var typeCode = response.data.account_code;
            var typeName = response.data.account_name;
            if (type == "CODE") {
                $(`#account-name-${index}`).val(id_account);
                $(`#select2-account-name-${index}-container`).html(typeName);
                // $(`#account-name-${index}`).val(id_account).trigger('change');
            } else {
                $(`#account-code-${index}`).val(id_account);
                $(`#select2-account-code-${index}-container`).html(typeCode);
                // $(`#account-name-${index}`).val(id_account).trigger('change');
            }
            var htmlJournal = `<input name="journal_amount[]" id="journal-amount-${index}" onchange="calculateDebitKredit()" class="form-control form-control-sm text-right" />`;
            if (typeAccount == "AKTIVA") {
                $(`#td-kredit-account-${index}`).html("");
                $(`#td-debit-account-${index}`).html(htmlJournal);
                $(`#journal-amount-${index}`).removeClass(
                    "journal_kredit_amount"
                );
                $(`#journal-amount-${index}`).addClass("journal_debit_amount");
                $(`#type-journal-${index}`).val("DEBIT");
            } else {
                $(`#td-debit-account-${index}`).html("");
                $(`#td-kredit-account-${index}`).html(htmlJournal);
                $(`#journal-amount-${index}`).removeClass(
                    "journal_debit_amount"
                );
                $(`#journal-amount-${index}`).addClass("journal_kredit_amount");
                $(`#type-journal-${index}`).val("KREDIT");
            }
            $(".journal_debit_amount").mask("#.##0", { reverse: true });
            $(".journal_kredit_amount").mask("#.##0", { reverse: true });
        },
        error: function (err) {
            console.log(err);
        },
    });
}

function calculateDebitKredit() {
    var totalDebit = 0;
    var totalKredit = 0;
    var totalBalance = 0;

    $(`.journal_debit_amount`).each(function () {
        $(this).unmask();
        var inputDebit = $(this).val();
        $(this).mask("#.##0", { reverse: true });
        console.log(inputDebit);
        if ($.isNumeric(inputDebit)) {
            totalDebit += parseFloat(inputDebit);
        }
    });

    $(`.journal_kredit_amount`).each(function () {
        $(this).unmask();
        var inputKredit = $(this).val();
        $(this).mask("#.##0", { reverse: true });
        if ($.isNumeric(inputKredit)) {
            totalKredit += parseFloat(inputKredit);
        }
    });

    $("#journal_debit").val(totalDebit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    $("#journal_kredit").val(totalKredit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

    totalBalance = parseFloat(totalDebit) - parseFloat(totalKredit);
    if (totalDebit == totalKredit) {
        $("#journal_balance").removeClass("text-danger");
        $("#journal_balance").addClass("text-success");
    } else {
        if (totalDebit > totalKredit) {
            totalBalance = `+${totalBalance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
        } else {
            totalBalance = totalBalance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        $("#journal_balance").removeClass("text-success");
        $("#journal_balance").addClass("text-danger");
    }

    $("#journal_balance").val(totalBalance);

}
