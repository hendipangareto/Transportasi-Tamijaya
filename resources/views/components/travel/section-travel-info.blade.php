{{-- Section Travel Info --}}
<section class="section travel-info">
    <div class="container">
        <div class="row">
            @forelse ($offices as $office)
                @php
                    $maps = '';
                    if ($office->office_origin == 'YOGYAKARTA') {
                        $maps = 'https://www.google.co.id/maps/place/PO+Tami+Jaya/@-7.800923,110.348278,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7a57f4691c20ed:0x74f40042c3c1ef7!8m2!3d-7.8008843!4d110.3504765?hl=en&authuser=0';
                    } else {
                        $maps = 'https://www.google.com/maps/dir/-6.9858982,110.4142924/Garasi+Bus+Tami+Jaya/@-7.8069237,110.5596095,7z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2dd23f523ffc30dd:0xfd72233506d05316!2m2!1d115.1987882!2d-8.6396593';
                    }
                @endphp
                <div class="col-12 col-md-6">
                    {{-- <a href="{{ $maps }}" target="_blank"> --}}
                    <div class="card--travel-info">
                        <span>{{ $office->office_origin }}</span>
                        <h4 class="mt-2">{{ $office->office_name }}</h4>
                        <a href="{{ $maps }}" target="_blank"
                            class="text-white">{{ $office->office_address }}
                        </a>
                        {{-- <h5 class="mt-3">
                                <ion-icon name="call-outline" class="icon mr-2"></ion-icon>
                                {{ $office->office_phone }}
                            </h5> --}}

                        {{-- <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mt-3">
                                        <ion-icon name="call-outline" class="icon mr-2"></ion-icon>
                                        018237328
                                    </h5>
                                </div>
                                <div class="col-md-6"></div>
                            </div> --}}
                        @php
                            $arr_phone = explode(' | ', $office->office_phone);
                        @endphp
                        <div class="row">
                            @foreach ($arr_phone as $phone)
                                @php
                                    $pos = strpos($phone, '(');
                                    $isName = strpos($phone, ',');
                                    if ($isName) {
                                        $arr_data = explode(',', $phone);
                                        $phone = $arr_data[0];
                                        $name = $arr_data[1];
                                    } else {
                                        $phone = $phone;
                                        $name = '';
                                    }
                                @endphp

                                <div class="col-md-6">
                                    @if ($pos === false)
                                        <h5 class="mt-1 mb-0">
                                            @php
                                                $wa_number = str_replace('+62 8', '628', $phone);
                                                $wa_number = str_replace('-', '', $wa_number);
                                            @endphp
                                            <a class="text-white" href="https://wa.me/{{ $wa_number }}"
                                                target="_blank">
                                                <ion-icon name="logo-whatsapp" class="icon mr-2"></ion-icon>
                                                {{ $phone }}
                                            </a>
                                        </h5>

                                        @if ($name !== '')
                                            <label class="text-white"> ({{ $name }})</label>
                                        @endif
                                    @else
                                        <h5 class="mt-1 mb-0">
                                            <ion-icon name="call-outline" class="icon mr-2"></ion-icon>
                                            {{ $phone }}
                                        </h5>
                                        @if ($name !== '')
                                            <label class="text-white"> ({{ $name }})</label>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- </a> --}}


                </div>
            @empty
                <div class="col-12 col-md-12">
                    Tidak Terdapat Data Kantor
                </div>
            @endforelse
        </div>
    </div>
    </div>
</section>
