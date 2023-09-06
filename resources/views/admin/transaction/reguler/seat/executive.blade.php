{{-- <div class="col-12 col-md-6 mt-4 mt-md-5"> --}}
<div class="bus">
    <div class="bus-info">
        <h5 class="text-center">Executive 22 Seats</h5>
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
                <ul class="seats">
                    <li class="seat disabled">
                        <label for="front-2"></label>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="seats">
                    <li class="seat disabled">
                        <label for="front-driver">
                            <img src="{{ asset('images/steering-wheel.png') }}" class="img-fluid d-block mx-auto"
                                width="24px">
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        @php
            $row_1 = ['1C', '2C', '3C', '4C', '5C', '6C', '7C'];
            $row_2 = ['1B', '2B', '3B', '4B', '5B', '6B', '7B'];
            $row_3 = ['1A', '2A', '3A', '4A', '5A', '6A', '7A', '8A'];
        @endphp
        <div class="row">
            <div class="col-4">
                <ul class="seats" type="ExecutiveC">
                    @foreach ($row_1 as $row1)
                        <li class="seat">
                            <input type="checkbox" onclick="selectSeat('{{ $row1 }}')"
                                id="Executive{{ $row1 }}" />
                            <label for="Executive{{ $row1 }}">{{ $row1 }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-4">
                <ul class="seats" type="ExecutiveB">
                    @foreach ($row_2 as $row2)
                        <li class="seat">
                            <input type="checkbox" onclick="selectSeat('{{ $row2 }}')"
                                id="Executive{{ $row2 }}" />
                            <label for="Executive{{ $row2 }}">{{ $row2 }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-4">
                <ul class="seats" type="ExecutiveA">
                    @foreach ($row_3 as $row3)
                        <li class="seat">
                            <input type="checkbox" onclick="selectSeat('{{ $row3 }}')"
                                id="Executive{{ $row3 }}" />
                            <label for="Executive{{ $row3 }}">{{ $row3 }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row back">
            <div class="col-4">
                <div class="bus-toilet">
                    <img src="{{ asset('images/toilet.png') }}" class="img-fluid d-block mx-auto" width="32px">
                </div>
            </div>
        </div>
    </div>

    <div class="bus-exit">
        <h6>EXIT</h6>
    </div>
</div>
