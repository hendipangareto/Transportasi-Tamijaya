{{-- Modal Login Register --}}
<div class="modal fade" id="LoginRegisterModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="box-login">
                <div class="user signinBox">
                    <div class="imgBox"><img src="{{ asset('images/img-login.jpg') }}" alt="" /></div>
                    <div class="formBox">
                        <form action="" onsubmit="return false;">
                            <h4 class="text-left">Masuk ke Akun Kamu</h4>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="customer_email" id="customer_email"
                                        placeholder="Alamat Email" />
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="customer_password" name="customer_password"
                                        placeholder="Password" class="password" />
                                    <span><i id="toggler" class="far fa-eye"></i></span>
                                </div>
                            </div>

                            <button type="submit" class="btn-submit mt-4 mb-3" onclick="loginCustomer()">Login</button>
                            <p class="signup">
                                Belum memiliki akun ?
                                <a href="#" onclick="toggleForm();">Register.</a>
                            </p>
                        </form>
                    </div>
                </div>

                <div class="user registerBox">
                    <div class="formBox">
                        <form action="" onsubmit="return false;">
                            <input id='step2' type='checkbox'>
                            <input id='step3' type='checkbox'>
                            <input id='step4' type='checkbox'>
                            <div id="part1" class="form-group">
                                <h4 class="text-left">Registrasi Akun</h4>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="Full Name">Nama Lengkap</label>
                                        <input type="text" name="customer_register_name" id="customer_register_name"
                                            placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Full Name">No Handphone</label>
                                        <input type="number" name="customer_register_phone" id="customer_register_phone"
                                            placeholder="No Handphone" required />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Full Name">Email</label>
                                        <input type="email" name="customer_register_email" id="customer_register_email"
                                            placeholder="Alamat Email" required />
                                    </div>
                                </div>

                                <label for='step2' id="continue-step2" class="continue">
                                    <div class="btn btn-submit mt-4 mb-3" id="" onclick="registerStep(1)">Register</div>
                                </label>

                                <p class="signup">
                                    Sudah memiliki akun ?
                                    <a href="#" onclick="toggleForm();">Login.</a>
                                </p>
                            </div>

                            <div id="part2" class="form-group">
                                <h6>Silahkan masukkan kode one time password <br> untuk verifikasi akun</h6>
                                <div>
                                    <span>Kode telah dikirim ke</span>
                                    <small id="title-email-reg">......@gmail.com</small>
                                </div>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2 mb-4">
                                    <input class="m-2 text-center form-control" type="text" id="first_otp" maxlength="1"
                                        required />
                                    <input class="m-2 text-center form-control" type="text" id="second_otp" maxlength="1"
                                        required />
                                    <input class="m-2 text-center form-control" type="text" id="third_otp" maxlength="1"
                                        required />
                                    <input class="m-2 text-center form-control" type="text" id="fourth_otp" maxlength="1"
                                        required />
                                </div>
                                <div class="otp-countdown mb-4">
                                    <span>Waktu tersisa</span><div id="timer-countdown">05:00</div>
                                </div>

                                <label for='step2' id="back-step2" class="back mr-2">
                                    <div class="btn btn-submit" id="">Back</div>
                                </label>
                                <label for='step3' id="continue-step3" class="continue">
                                    <div class="btn btn-submit" id="" onclick="registerStep(2)">Confirm</div>
                                </label>
                            </div>

                            <div id="part3" class="form-group">
                                <h4 class="text-left">Create Your Password</h4>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="Password">Password</label>
                                        <input type="password" id="customer_register_password" name=""
                                            placeholder="Password" required />
                                        <span><i id="toggler" class="far fa-eye"></i></span>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Confirm Password">Retype Password</label>
                                        <input type="password" id="customer_register_confirmation_password" name=""
                                            placeholder="Retype Password" required />
                                        <span><i id="toggler" class="far fa-eye"></i></span>
                                    </div>
                                </div>

                                <label for='step4' id="continue-step4" class="continue">
                                    <div class="btn btn-submit" id="btn-register-customer" onclick="registerStep(3)">
                                        Create Account</div>
                                </label>
                            </div>

                            <div id="part4" class="form-group text-center">
                                <div class="circle-wrapper mb-4">
                                    <div class="success circle"></div>
                                    <div class="icon-success">
                                        <ion-icon name="checkmark-outline"></ion-icon>
                                    </div>
                                </div>
                                <h4>Selamat, kamu sudah terdaftar.</h4>

                                <button type="button" data-dismiss="modal" class="btn btn-submit d-block mx-auto"
                                    aria-label="Close">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="imgBox">
                        <img src="{{ asset('images/img-register.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
