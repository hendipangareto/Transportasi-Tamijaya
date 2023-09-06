<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <img src="{{ asset('images/logo-tamijaya.png') }}" class="logo" alt="Logo Tamijaya">
                <h4 class="mt-3 mb-4">Where Journey of thousands miles begins</h4>
                <ul class="social-media">
                    <li><a href="https://www.instagram.com/tamijaya_transport/" target="_blank">
                            <ion-icon name="logo-instagram" class="icon"></ion-icon>
                        </a></li>
                    <li><a href="https://www.facebook.com/TamiJaya.Marketing" target="_blank">
                            <ion-icon name="logo-facebook" class="icon"></ion-icon>
                        </a></li>
                    <li><a href="mailto:info@tamijaya.com" target="_blank">
                            <ion-icon name="mail-open-outline" class="icon"></ion-icon>
                        </a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3>
                    Perusahaan
                </h3>
                <ul class="menu">
                    <li><a href="{{ route('travel') }}">Travel</a></li>
                    <li><a href="{{ route('armada') }}">Armada</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3>
                    Info
                </h3>
                <ul class="menu">
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('support') }}">Informasi</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3>
                    Kontak
                </h3>

                <ul class="menu">
                    <li> <a href="https://wa.me/62811250136" target="_blank">
                            <ion-icon name="logo-whatsapp" class="icon mr-1"></ion-icon>+62 811-250-136
                        </a></li>
                    <li> <a href="https://wa.me/6287862121955" target="_blank">
                            <ion-icon name="logo-whatsapp" class="icon mr-1"></ion-icon>+62 878-6212-1955
                        </a></li>
                </ul>


            </div>
            <div class="col-12 mt-5">
                <h6 class="text-center">
                    Ⓒ 2022 PT Anugerah Karya Utami Gemilang. All rights reserved
                </h6>
            </div>
        </div>
    </div>
</footer>

<div class="fab-wrapper">
    <input id="fabCheckbox" type="checkbox" class="fab-checkbox" />
    <label class="fab-icon" for="fabCheckbox">
        <i class="fab fa-whatsapp"></i>
    </label>
    <div class="fab-wheel">
        <a href="https://wa.me/6282226880162 " target="_blank" class="fab-action fab-action-1">
            <i class="fab fa-whatsapp mr-2"></i>Denpasar
        </a>
        <a href="https://wa.me/62811250147 " target="_blank" class="fab-action fab-action-2">
            <i class="fab fa-whatsapp mr-2"></i>Yogyakarta
        </a>
    </div>
</div>
