{{-- Section Home News --}}
<section class="section home-news-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <h2 class="mb-4 text-center text-uppercase">Where Journey of Thousands Miles Begins</h2>
            </div>
            <div class="col-12 px-0">
                <div class="owl-carousel owl-theme" style="z-index: 0" id="owl-carousel">
                    @php
                        $images = ['banner-1.png', 'banner-2.png', 'banner-3.png'];
                    @endphp

                    @foreach ($images as $image)
                        <div class="item">
                            <div class="card--news-banner">
                                @php
                                    $img_src = 'images/' . $image;
                                @endphp
                                <img src="{{ asset($img_src) }}" class="w-100 img-fluid" alt="News Banner">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
