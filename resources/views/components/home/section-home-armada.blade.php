{{-- Section Home Armada --}}
<section class="section home-armada">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 my-auto">
                <h2>Armada Andalan Tamijaya</h2>
                <p class="my-4">Kami menyediakan armada terbaik kami untuk pelayanan wisata maupun
                    keberangkatan reguler dengan berbagai macam fasilitas yang bisa di nikmati oleh anda. Nikmati
                    kenikmatan armada kami dengan maksimal.</p>
                <a href="{{ route('coming-soon') }}" class="btn btn--primary">Cek Armada Kami</a>
            </div>
            <div class="col-12 col-md-8 mt-4 mt-md-0">
                <div class="owl-carousel owl-theme" style="z-index: 0" id="owl-carousel-2">
                    @foreach ($buses as $bus)
                        <div class="item">
                            <div class="card--armada-list">
                                {{-- <img src="/storage/{{ $blog->blog_image }}" alt="Blog Thumbnail" /> --}}
                                <img src="/storage/{{ $bus->bus_image }}" class="w-100 img-fluid" alt="Bus Tamijaya">
                                <h5 class="mt-3">{{ $bus->bus_name }}</h5>
                                <ul class="mb-3">
                                    @php
                                        $facility_explode = explode(', ', $bus->bus_facility);
                                    @endphp
                                    @foreach ($facility_explode as $facility)
                                        <li>
                                            <ion-icon name="checkmark-done-outline" class="icon"></ion-icon>
                                            {{ $facility }}
                                        </li>
                                    @endforeach
                                </ul>
                                <button type="button" onclick="openDetailBus({{ $bus->id }})"  class="btn--primary-sm">Lihat Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
