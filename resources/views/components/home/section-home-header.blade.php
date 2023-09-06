{{-- Section Home Header --}}

<section class="section home-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3 text-center">Pemesanan Tiket</h3>
                <ul class="nav nav-tabs-book" id="tabReservation" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="reguler-tab" data-toggle="tab" href="#reguler" role="tab"
                            aria-controls="reguler" aria-selected="true">Reguler</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pariwisata-tab" data-toggle="tab" href="#pariwisata" role="tab"
                            aria-controls="pariwisata" aria-selected="false">Pariwisata</a>
                    </li>
                </ul>
                <div class="tab-content mt-" id="tabReservationContent">
                    <div class="tab-pane fade show active" id="reguler" role="tabpanel" aria-labelledby="reguler-tab">
                     
                        <div
                        class="card--top-reservation d-none coming-soon d-flex align-items-center justify-content-center">
                        <lottie-player src="{{ asset('images/bus-coming-soon.json') }}"
                            background="transparent" speed="1" style="width: 250px;" class="d-none d-lg-block"
                            loop autoplay></lottie-player>
                        <h2 class="ml-lg-4">
                            Kami sedang mempersiapkan <br />
                            yang terbaik untuk Anda
                        </h2>
                    </div>
                    </div>

                    <div class="tab-pane fade" id="pariwisata" role="tabpanel" aria-labelledby="pariwisata-tab">
                        <div class="card--top-reservation" id="pariwisata-reservation">
                            <div
                                class="card--top-reservation d-none coming-soon d-flex align-items-center justify-content-center">
                                <lottie-player src="{{ asset('images/bus-coming-soon.json') }}"
                                    background="transparent" speed="1" style="width: 250px;" class="d-none d-lg-block"
                                    loop autoplay></lottie-player>
                                <h2 class="ml-lg-4">
                                    Kami sedang mempersiapkan <br />
                                    yang terbaik untuk Anda
                                </h2>
                            </div>
                            {{-- <form id="reservation-filter" action="" method="">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-2">
                                        <label>
                                            <ion-icon name="calendar-outline" class="icon"></ion-icon>
                                            Berangkat
                                        </label>
                                        <input type="date" class="form-control" id="pariwisata_date_departure"
                                            placeholder="Tanggal Berangkat">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-2">
                                        <label>
                                            <ion-icon name="calendar-outline" class="icon"></ion-icon> Kembali
                                        </label>
                                        <input type="date" class="form-control" id="pariwisata_date_return"
                                            placeholder="Tanggal Kembali">
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label>
                                            <ion-icon name="bus-outline" class="icon"></ion-icon>Penjemputan
                                        </label>
                                        <select id="pariwisata_province_to" name="pariwisata_province_to">
                                            <option value="JOG-DPS">Jogjakarta</option>
                                            <option value="DPS-JOG">Denpasar</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <label>
                                            <ion-icon name="bus-outline" class="icon"></ion-icon>Tujuan Wisata
                                        </label>
                                        <select id="pariwisata_province_from" name="pariwisata_province_from">
                                            <option value="JOG-DPS">Jogjakarta</option>
                                            <option value="DPS-JOG">Denpasar</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-2">
                                        <label>
                                            <ion-icon name="people-outline" class="icon"></ion-icon>Penumpang
                                        </label>

                                        <input type="text" class="form-control" id="seat_passengers"
                                            placeholder="Silahkan masukan jumlah penumpang" value="0"
                                            name="seat_passengers">
                                    </div>

                                    <div class="col-12 mt-4 d-flex justify-content-center">
                                        <button id="reservation-filter-btn-pariwisat"
                                            onclick="searchTravel('PARIWISATA')" class="btn-submit" type="button">
                                            Check Availability<ion-icon name="search-outline" class="icon">
                                            </ion-icon>
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="pariwisata-bus-available" style="display: none">

                                        </div>
                                    </div>
                                </div>


                                <div id="pariwisata-armada-available" class="row mt-2" style="display: none">
                                    <hr />
                                    <div class="col-md-12">
                                        <style>
                                            .table-data thead tr th {
                                                font-size: 11px !important;
                                                padding-top: 10px !important;
                                                padding-bottom: 10px !important;
                                            }

                                            .table-data tfoot tr td {
                                                padding-top: 10px !important;
                                                padding-bottom: 10px !important;
                                                padding-left: 10px !important;
                                                padding-right: 10px !important;
                                            }

                                        </style>
                                        <div class="row mb-1">
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6 text-right my-auto">
                                                <button type="button" class="btn btn-light-primary btn-danger"
                                                    onClick="addItinerary()"><i class="bx bx-plus-circle"></i>
                                                    Tambah Tujuan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="total-itinerary" name="total_itinerary" value="0">
                                        <table class="table table-bordered table-hover table-data">
                                            <thead>
                                                <tr>
                                                    <th>Tujuan<span class="text-danger">*</span>
                                                    </th>
                                                    <th>Destinasi<span class="text-danger">*</span></th>
                                                    <th>Notes</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-detail-itinerary">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label font-weight-bold">Catatan Travel
                                                Pariwisata</label>
                                            <textarea id="notes_pariwisata" name="notes_pariwisata"
                                                style="min-height:120px;"
                                                class="form-control form-control-sm "></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h6 for="">
                                            Estimasi Perjalanan Wisata : <span class="font-weight-bold"
                                                id="estimate-date"> 1 </span> Hari
                                        </h6>
                                        <div id="submit-booking-travel-pariwisata" class="mt-5">
                                            <button id="reservation-filter-btn-pariwisata"
                                                onclick="bookTravel('PARIWISATA')" class="btn-submit" type="button">
                                                Kirim Permintaan Reservasi<ion-icon style="font-size: 32px"
                                                    name="checkmark-circle-outline" class="ml-2">
                                                </ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>

                {{-- <div class="card--top-reservation d-none coming-soon d-flex align-items-center justify-content-center">
                    <lottie-player src="{{ asset('images/bus-coming-soon.json') }}" background="transparent"  speed="1"  style="width: 250px;" class="d-none d-lg-block" loop autoplay></lottie-player>
                    <h2 class="ml-lg-4">
                        Kami sedang mempersiapkan <br/>
                        yang terbaik untuk Anda
                    </h2>
                </div> --}}
            </div>
        </div>
    </div>
</section>
