$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

// Check login local storage
const customer = localStorage.getItem("customerData") ? JSON.parse(atob(localStorage.getItem(
    "customerData"))) : undefined;
if (customer) {
    $("#title-customer-nick-name").html(customer.customer_nick_name);
    $("#login-register-nav").hide();
    $("#profile-nav").show();
} else {
    $("#login-register-nav").show();
    $("#profile-nav").hide();
}

const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};