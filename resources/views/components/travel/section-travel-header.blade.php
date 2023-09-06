{{-- Section Travel Header --}}
<section class="section travel-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">Cek Titik Penjemputan & Info Travel Kami di Berbagai Daerah</h3>
                <div class="card--top-reservation">
                    <form id="reservation-filter" action="" method="">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <label>
                                    <ion-icon name="business-outline" class="icon"></ion-icon> Kota
                                </label>
                                <select name="destination_pp" id="destination_pp">
                                    <option value="YK">Yogyakarta (YK)</option>
                                    <option value="KSN">Klaten - Solo (KSN)</option>
                                    <option value="BL">Bali (BL)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mt-4 my-md-auto d-flex justify-content-center">
                                <button id="reservation-filter-btn" class="btn-submit" type="button"
                                    onclick="checkPickPoint()">
                                    Cek Titik Penjemputan<ion-icon name="search-outline" class="icon">
                                    </ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="row mt-4" id="result-pick-point">
                            {{-- <div class="col-12 col-md-6 col-lg-4">
                                <div class="card--pickup-point">
                                    <span>Yogyakarta</span>
                                    <h4 class="mt-2">Garasi Jl.Tinosidin</h4>
                                    <p></p>
                                    <h5 class="mt-3">
                                        <ion-icon name="time-outline"></ion-icon> ETA : 11.00 WIB
                                    </h5>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
