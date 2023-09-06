
const loginCustomer = () => {
    var customer_email = $("#customer_email").val();
    var customer_password = $("#customer_password").val();
    if (customer_email == "" || customer_password == "") {
        Toast.fire({
            icon: "error",
            title: "Silahkan lengkapi email dan password anda",
        });
        return;
    }
    $.ajax({
        type: "POST",
        url: "/customer/login",
        data: {
            customer_email,
            customer_password
        },
        dataType: "json",
        success: function (response) {
            console.log(response)
            console.log(response.status);
            if (response.status == '400') {
                Toast.fire({
                    icon: "error",
                    title: response.message,
                });
                return;
            }

            Toast.fire({
                icon: "success",
                title: response.message,
            });
            $("#customer_email").val('');
            $("#customer_password").val('');

            localStorage.setItem("customerData", btoa(JSON.stringify(response.data)));
            window.location.reload();
        },
        error: function (err) {
            console.log(err);
        }
    });
}

const logoutCustomer = () => {
    localStorage.removeItem("customerData");
    window.location.reload();
}

const registerStep = (index) => {
    switch (index) {
        case 1:
            var customer_register_name = $("#customer_register_name").val();
            var customer_register_email = $("#customer_register_email").val();
            var customer_register_phone = $("#customer_register_phone").val();
            $.ajax({
                type: "POST",
                url: "/customer/register",
                data: {
                    customer_register_name,
                    customer_register_email,
                    customer_register_phone
                },
                dataType: "json",
                success: function (response) {
                    console.log(response)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case 2:
            // OTP
            var first_otp = $("#first_otp").val();
            var second_otp = $("#second_otp").val();
            var third_otp = $("#third_otp").val();
            var fourth_otp = $("#fourth_otp").val();
            var otp_value = `${first_otp}${second_otp}${third_otp}${fourth_otp}`;
            var customer_register_email = $("#customer_register_email").val();
            $.ajax({
                type: "POST",
                url: "/customer/confirmation-otp",
                data: {
                    customer_register_email,
                    otp_value
                },
                dataType: "json",
                success: function (response) {
                    alert(response.message)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case 3:
            var customer_register_password = $("#customer_register_password").val();
            var customer_register_confirmation_password = $("#customer_register_confirmation_password").val();

            var customer_register_email = $("#customer_register_email").val();

            if (customer_register_password !== customer_register_confirmation_password) {
                alert(`Confirmation Password doesn't match`);
                return;
            }
            $.ajax({
                type: "POST",
                url: "/customer/create-password",
                data: {
                    customer_register_password,
                    customer_register_email
                },
                dataType: "json",
                success: function (response) {
                    alert(response.message)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
    }
}