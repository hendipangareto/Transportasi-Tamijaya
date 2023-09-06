{{-- Section Facilities --}}
<section class="section facilities">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">Fasilitas Kami</h3>
            </div>
            @forelse ($facilities as $facility)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card--facilities">
                        <ion-icon name="checkmark-done-outline" class="icon mr-2"></ion-icon>
                        {{ $facility->facility_name }}
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card--facilities">
                        Tidak Terdapat Data Fasilitas
                    </div>
                </div>
            @endforelse
            </div>
        </div>
    </div>
</section>
