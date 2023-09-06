{{-- Section Contact Form --}}
<section class="section contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3>Kirimkan Pesan ke Kami</h3>
            </div>
            <div class="col-12">
                <form action="javascript:void(0)" id="form-contact-us">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fullName">Nama Lengkap <span>(Required)</span></label>
                                <input type="text" class="form-control" id="fullName" name="inbox_name"
                                    placeholder="Full Name" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="emailAddress">Email <span>(Required)</span></label>
                                <input type="email" class="form-control" id="email" name="inbox_email"
                                    placeholder="Email" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="phoneNumber">Nomor Telepon <span>(Required)</span></label>
                                <input type="number" class="form-control" id="phoneNumber" name="inbox_phone"
                                    placeholder="Phone Number" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="subject">Subyek <span>(Required)</span></label>
                                <input type="text" class="form-control" id="subject" name="inbox_subject"
                                    placeholder="Subject" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message">Isi Pesan</label>
                                <textarea class="form-control" id="message" name="inbox_message" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn--primary" type="button" onclick="submitContactUs()"><i
                                    class="fa fa-paper-plane mr-3"></i>Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@push('page-scripts')
    <script src="{{ asset('script/client/main.js') }}"></script>
    <script src="{{ asset('script/client/auth.js') }}"></script>
    <script>
        function submitContactUs() {
            var formData = $("#form-contact-us").serialize();
            console.log(formData)
            $.ajax({
                type: "post",
                url: "/api/management-customer/create-inbox",
                data: formData,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully',
                            text: `${response.message}`
                        })
                        $(`#form-contact-us`)[0].reset();
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }
    </script>
@endpush
