{{-- Section Armada List --}}
<section class="section armada-list">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme" id="owl-carousel-3">
                    @foreach ($buses as $bus)
                        <div class="item">
                            <div class="card--armada-list">
                                <img src="/storage/{{ $bus->bus_image }}" class="w-100 img-fluid"
                                    alt="{{ $bus->bus_name }}">
                                <h5 class="mt-3">{{ $bus->bus_name }}</h5>
                                <ul>
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
                                <button type="button" onclick="openDetailBus({{ $bus->id }})" class="btn--primary-sm">Lihat Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
