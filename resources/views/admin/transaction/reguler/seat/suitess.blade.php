<style>
    /* Untuk mengubah warna latar belakang tab aktif */
    .nav-tabs-bus .nav-item.active .nav-link {
        background-color: #1aff00; /* Ganti #ff0000 dengan kode warna yang Anda inginkan */
        color: #ffffff; /* Ganti #ffffff dengan kode warna teks yang Anda inginkan */
    }

    /* Untuk mengubah warna latar belakang tab tidak aktif */
    .nav-tabs-bus .nav-item .nav-link {
        background-color: #00ff00; /* Ganti #00ff00 dengan kode warna yang Anda inginkan */
        color: #000000; /* Ganti #000000 dengan kode warna teks yang Anda inginkan */
    }

    /* Untuk mengubah warna latar belakang suite */
    .bus-info h5 {
        background-color: #ffffff; /* Ganti #0000ff dengan kode warna yang Anda inginkan */
        color: #ffffff; /* Ganti #ffffff dengan kode warna teks yang Anda inginkan */
    }

    /* Untuk mengubah warna latar belakang kursi yang bisa dipilih */
    ul.seats .seat input[type="checkbox"]:checked + label::before {
        background-color: #ff00ff; /* Ganti #ff00ff dengan kode warna yang Anda inginkan */
    }

    /* Untuk mengubah warna

</style>

<ul class="nav nav-tabs-bus" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Ground</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Top</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tabs-1" role="tabpanel">
        {{-- Ground Floor --}}
        <h4 class="text-center">Ground Floor</h4>
        <div class="bus">
            <div class="bus-info">
                <h5 class="text-center">Suite</h5>
            </div>

            <div class="bus-door"></div>

            <div class="bus-seats">
                <div class="row front">
                    <div class="col-4">
                        <ul class="seats">
                            <li class="seat disabled">
                                <label for="front-1"></label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <ul class="seats">
                            <li class="seat disabled">
                                <label for="front-driver">
                                    <img src="{{ asset('images/steering-wheel.png') }}"
                                        class="img-fluid d-block mx-auto" width="24px">
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <ul class="seats" type="SuiteD">
                            @php
                                $seat_a = ['1A', '2A', '3A', '4A', '5A', '6A'];
                                $seat_b = ['1B', '2B', '3B', '4B', '5B'];
                                $seat_c = ['1C', '2C', '3C', '4C', '5C'];
                                $seat_d = ['1D', '2D', '3D', '4D', '5D'];
                            @endphp
                            @foreach ($seat_d as $d_seat)
                                <li class="seat">
                                    <input onclick="selectSeat('{{ $d_seat }}')" type="checkbox"
                                        id="Suite{{ $d_seat }}" />
                                    <label for="Suite{{ $d_seat }}">{{ $d_seat }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <ul class="seats" type="SuiteB">
                            @foreach ($seat_b as $b_seat)
                                <li class="seat">
                                    <input onclick="selectSeat('{{ $b_seat }}')" type="checkbox"
                                        id="Suite{{ $b_seat }}" />
                                    <label for="Suite{{ $b_seat }}">{{ $b_seat }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tabs-2" role="tabpanel">
        {{-- Top Floor --}}
        <h4 class="text-center">Top Floor</h4>
        <div class="bus">
            <div class="bus-info">
                <h5 class="text-center">Suite</h5>
            </div>

            <div class="bus-door"></div>
            <div class="bus-seats">
                <div class="row">
                    <div class="col-4">
                        <ul class="seats" type="SuiteC">
                            @foreach ($seat_c as $c_seat)
                                <li class="seat">
                                    <input onclick="selectSeat('{{ $c_seat }}')" type="checkbox"
                                        id="Suite{{ $c_seat }}" />
                                    <label for="Suite{{ $c_seat }}">{{ $c_seat }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <ul class="seats" type="SuiteA">
                            @foreach ($seat_a as $a_seat)
                                <li class="seat">
                                    <input onclick="selectSeat('{{ $a_seat }}')" type="checkbox"
                                        id="Suite{{ $a_seat }}" />
                                    <label for="Suite{{ $a_seat }}">{{ $a_seat }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
