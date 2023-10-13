<script>
    function pembelianSparepart() {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang di notif akan diperbaharui",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        console.log(response)
                        location.reload();
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil notif pembelian sparepart"
                        });
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    }

    function notifKePerawatan() {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang di notif akan masuk ke bag perawatan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        console.log(response)
                        location.reload();
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil notif pembelian sparepart"
                        });
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    }

    function notiflogistikPerjalanan() {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang di notif akan masuk pada logistik",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        console.log(response)
                        location.reload();
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil notif pembelian sparepart"
                        });
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    }

    function notifPembelianAtk() {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang di notif akan di approved yg bersangkutan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        console.log(response)
                        location.reload();
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil notif pembelian sparepart"
                        });
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    }

    function notifUsers() {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data yang di notif akan diterima oleh user",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        console.log(response)
                        location.reload();
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil notif pembelian sparepart"
                        });
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
    }
</script>
