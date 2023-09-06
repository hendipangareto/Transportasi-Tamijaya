{{-- Section Bus Seats --}}

{{-- <div class="row"> --}}
    <div class="col-12 col-md-6 mt-4 mt-md-5">
        <h4 class="text-center text-uppercase">Executive Class</h4>
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
                                    <img src="{{ asset('images/steering-wheel.png') }}" class="img-fluid d-block mx-auto" width="24px">
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <ul class="seats" type="ExecutiveC">
                            <li class="seat">
                                <input type="checkbox" id="Executive1C" class="booked" />
                                <label for="Executive1C">1C</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive2C" />
                                <label for="Executive2C">2C</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive3C" />
                                <label for="Executive3C">3C</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive4C" />
                                <label for="Executive4C">4C</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive5C" />
                                <label for="Executive5C">5C</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive6C" />
                                <label for="Executive6C">6C</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive7C" />
                                <label for="Executive7C">7C</label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="seats" type="ExecutiveB">
                            <li class="seat">
                                <input type="checkbox" id="Executive1B" />
                                <label for="Executive1B">1B</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive2B" />
                                <label for="Executive2B">2B</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive3B" />
                                <label for="Executive3B">3B</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive4B" />
                                <label for="Executive4B">4B</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive5B" />
                                <label for="Executive5B">5B</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive6B" />
                                <label for="Executive6B">6B</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive7B" />
                                <label for="Executive7B">7B</label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="seats" type="ExecutiveA">
                            <li class="seat">
                                <input type="checkbox" id="Executive1A" />
                                <label for="Executive1A">1A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive2A" />
                                <label for="Executive2A">2A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive3A" />
                                <label for="Executive3A">3A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive4A" />
                                <label for="Executive4A">4A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive5A" />
                                <label for="Executive5A">5A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive6A" />
                                <label for="Executive6A">6A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive7A" />
                                <label for="Executive7A">7A</label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" id="Executive8A" />
                                <label for="Executive8A">8A</label>
                            </li>
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
    </div>

    <div class="col-12 col-md-6 mt-4 mt-md-5">
        <h4 class="text-center text-uppercase">Suite Class</h4>
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
                                            <img src="{{ asset('images/steering-wheel.png') }}" class="img-fluid d-block mx-auto" width="24px">
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <ul class="seats" type="SuiteD">
                                    <li class="seat">
                                        <input type="checkbox" id="Suite1D" />
                                        <label for="Suite1D">1D</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite2D" />
                                        <label for="Suite2D">2D</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite3D" />
                                        <label for="Suite3D">3D</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite4D" />
                                        <label for="Suite4D">4D</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite5D" />
                                        <label for="Suite5D">5D</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-4">
                                
                            </div>
                            <div class="col-4">
                                <ul class="seats" type="SuiteB">
                                    <li class="seat">
                                        <input type="checkbox" id="Suite1B" />
                                        <label for="Suite1B">1B</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite2B" />
                                        <label for="Suite2B">2B</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite3B" />
                                        <label for="Suite3B">3B</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite4B" />
                                        <label for="Suite4B">4B</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite5B" />
                                        <label for="Suite5B">5B</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="row back">
                            <div class="col-4">
                                <div class="bus-toilet">
                                    <img src="{{ asset('images/toilet.png') }}" class="img-fluid d-block mx-auto" width="32px">
                                </div>
                            </div>
                        </div> --}}
                    </div>
        
                    {{-- <div class="bus-exit">
                        <h6>EXIT</h6>
                    </div> --}}
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
                                    <li class="seat">
                                        <input type="checkbox" id="Suite1C" />
                                        <label for="Suite1C">1C</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite2C" />
                                        <label for="Suite2C">2C</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite3C" />
                                        <label for="Suite3C">3C</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite4C" />
                                        <label for="Suite4C">4C</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite5C" />
                                        <label for="Suite5C">5C</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-4">
                                
                            </div>
                            <div class="col-4">
                                <ul class="seats" type="SuiteA">
                                    <li class="seat">
                                        <input type="checkbox" id="Suite1A" />
                                        <label for="Suite1A">1A</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite2A" />
                                        <label for="Suite2A">2A</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite3A" />
                                        <label for="Suite3A">3A</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite4A" />
                                        <label for="Suite4A">4A</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite5A" />
                                        <label for="Suite5A">5A</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="Suite6A" />
                                        <label for="Suite6A">6A</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="row back">
                            <div class="col-4">
                                <div class="bus-toilet">
                                    <img src="{{ asset('images/toilet.png') }}" class="img-fluid d-block mx-auto" width="32px">
                                </div>
                            </div>
                        </div> --}}
                    </div>
        
                    {{-- <div class="bus-exit">
                        <h6>EXIT</h6>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}