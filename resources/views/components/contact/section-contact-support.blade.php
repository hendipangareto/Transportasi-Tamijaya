{{-- Section Contact Support --}}
<section class="section contact-support">
    <div class="container">
        <div class="row">
            @foreach ($offices as $office)
                <div class="col-12 col-md-6">
                    <div class="card--support">
                        <span>Pusat Informasi</span>
                        <h4 class="mt-2">{{ $office->office_name }} - {{ $office->office_origin }}</h4>
                        <p style="min-height: 50px">
                            {{ $office->office_address }}
                        </p>
                        <h5 class="mt-3">
                            <ion-icon name="time-outline" class="icon mr-2"></ion-icon>Senin pukul 08.00
                        </h5>
                        <div class="row align-center mt-3">
                            @php
                                $arr_phone = explode(' | ', $office->office_phone);
                            @endphp
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
                                        <h5 class="mb-3 mr-3">
                                            @php
                                                $wa_number = str_replace('+62 8', '628', $phone);
                                                $wa_number = str_replace('-', '', $wa_number);

                                            @endphp
                                            <a href="https://wa.me/{{ $wa_number }}" target="_blank">
                                                <ion-icon name="logo-whatsapp" class="icon mr-2"></ion-icon>
                                                {{ $phone }}
                                            </a>
                                            <p style="font-size: 14px; text-align: left;margin-left: 32px"
                                                class="text-black">
                                                @if ($name !== '')
                                                    ({{ $name }})
                                                @endif
                                            </p>
                                        </h5>
                                    @else
                                        <h5 class="mb-3 mr-3">
                                            <ion-icon name="call-outline" class="icon mr-2"></ion-icon>
                                            {{ $phone }}
                                            <p style="font-size: 14px; text-align: left;margin-left: 32px"
                                                class="text-black">
                                                @if ($name !== '')
                                                    ({{ $name }})
                                                @endif
                                            </p>
                                        </h5>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
