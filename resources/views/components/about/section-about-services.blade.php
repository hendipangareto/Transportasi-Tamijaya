{{-- Section About Services --}}
<section class="section about-services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">Daftar Layanan Kami</h3>
            </div>
            @forelse ($services as $service)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card--services">
                        {{ $service->service_name }}
                    </div>
                </div>
            @empty
                <div class="col-12">
                    Tidak Terdapat Layanan
                </div>
            @endforelse
        </div>
    </div>
</section>
