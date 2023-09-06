  {{-- START TAB TRAVEL DETAIL --}}

  <div class="row">
      <div class="col-6">
          <label>Tujuan: <span style="color:red;">*</span></label>
          <div class="form-group">
              <select id="transaction_travel_detail_tujuan" name="transaction_travel_detail_tujuan"
                  class="form-control required" onChange="changeTujuan(this)">
                  <option value="JOG-DPS">Jogjakarta - Denpasar (JOG ➤ DPS)</option>
                  <option value="DPS-JOG">Denpasar - Jogjakarta DPS ➤ JOG</option>
              </select>
          </div>
      </div>
      <div class="col-6">
          <label>Date Departure: <span style="color:red;">*</span></label>
          <div class="form-group">
              <input type="date" id="transaction_travel_detail_date_departure"
                  name="transaction_travel_detail_date_departure" class="form-control required" value="@php
                      echo date('Y-m-d');
                  @endphp"
                  min="@php
                      echo date('Y-m-d');
                  @endphp">

          </div>
      </div>
      <div class="col-6">
          <label>Pick Point: <span style="color:red;">*</span></label>
          <div class="form-group">
              <select id="transaction_travel_detail_pick_point" name="transaction_travel_detail_pick_point"
                  class="form-control required">
              </select>
          </div>
      </div>
      <div class="col-6">
          <label>Arrival Point: <span style="color:red;">*</span></label>
          <div class="form-group">
              <select id="transaction_travel_detail_arrival_point" name="transaction_travel_detail_arrival_point"
                  class="form-control required">
              </select>
          </div>
      </div>
  </div>
  <hr />
  <div class="row">
      <div class="col-12">
          <button class="btn btn-warning btn-block" onclick="searchTravel()"><i class="bx bx-search-alt"></i> Check
              Availibility</button>
      </div>
  </div>
  <hr />
  <div id="reguler-schedule-not-available" style="display: none">
      <div class="alert alert-secondary text-center font-weight-bold" role="alert">
          Sorry, regular schedule is not available. Try another date or destination.
      </div>
  </div>
  <div id="seat-selection" style="display: none">
      <h5 style="margin-left: 175px" class="font-weight-bold">Pick Seat</h5>
      <div class="row">
          <link href="{{ asset('css/animate-seat.css') }}" rel="stylesheet">
          <div class="col-md-6" id="display-seat">

          </div>
          <div class="col-md-6">
              <h6 class="font-weight-bold text-uppercase">Detail Seat & Travel Type</h6>
              <small class="font-weight-bold text-warning">Available Seats : <span id="available_seats"></span>
                  Seat(s)</small>
              <hr>
              <div class="form-body">
                  <div class="row">
                      <input type="hidden" id="id_schedule" name="id_schedule">
                      <div class="col-md-4">
                          <label>Travel Type <span style="color:red;">*</span></label>
                      </div>
                      <div class="col-md-8 form-group ">
                          <input type="text" id="travel_type_name" readonly
                              class="form-control form-control-sm bg-transparent required" name="travel_type_name">
                      </div>
                      <div class="col-md-4">
                          <label>Travel Price <span style="color:red;">*</span></label>
                      </div>
                      <div class="col-md-8 form-group ">
                          <input type="text" id="travel_price" readonly
                              class="form-control form-control-sm bg-transparent required" name="travel_price">
                      </div>
                      <div class="col-md-4">
                          <label>Selected Seat <span style="color:red;">*</span></label>
                      </div>
                      <div class="col-md-8 form-group ">
                          <input type="text" id="travel_selected_seat" readonly
                              class="form-control form-control-sm bg-transparent required" name="travel_selected_seat">
                      </div>
                      <div class="col-md-4">
                          <label>Passenger(s) <span style="color:red;">*</span></label>
                      </div>
                      <div class="col-md-8 form-group ">
                          <input type="text" id="travel_passenger" readonly
                              class="form-control form-control-sm bg-transparent required" name="travel_passenger">
                      </div>
                      <div class="col-md-4">
                          <label>Total Price <span style="color:red;">*</span></label>
                      </div>
                      <div class="col-md-8 form-group ">
                          <input type="text" id="travel_total_price"
                              class="form-control form-control-sm bg-transparent required" name="travel_total_price"
                              readonly>
                          <input type="hidden" id="travel_detail_total_cost" name="travel_detail_total_cost" readonly>
                      </div>
                      <div class="col-md-4">
                          <label>Agent</label>
                      </div>
                      <div class="col-md-8 form-group ">
                          <input type="hidden" id="check_agent" name="check_agent" value="N">
                          <li class="d-inline-block mr-2">
                              <fieldset>
                                  <div class="custom-control custom-radio">
                                      <input type="radio" class="custom-control-input" name="is_agent"
                                          id="radio-not-agent" checked="" onchange="chooseIsAgent()">
                                      <label class="custom-control-label" for="radio-not-agent">Bukan Agent</label>
                                  </div>
                              </fieldset>
                          </li>
                          <li class="d-inline-block mr-2">
                              <fieldset>
                                  <div class="custom-control custom-radio">
                                      <input type="radio" class="custom-control-input" name="is_agent" id="radio-agent"
                                          onchange="chooseIsAgent()">
                                      <label class="custom-control-label" for="radio-agent">Agent</label>
                                  </div>
                              </fieldset>
                          </li>
                      </div>

                      <div class="col-md-4 list-pic">
                          <label style="font-size: 11px">Person In Charge <span style="color:red;">*</span></label>
                      </div>

                      <div class="col-md-8 form-group list-pic">
                          <select name="booking_transactions_pic" id="booking_transactions_pic" class="form-control form-control-sm">
                              <option value="">Silahkan Pilih PIC</option>
                              @php
                                  $user_login_id = Auth::user()->id;
                              @endphp
                              @foreach ($users as $pic)
                                  <option @if ($user_login_id == $pic->id) selected @endif value="{{ $pic->id }}">
                                      {{ $pic->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="col-md-4 list-agent" style="display: none">
                          <label>Data Agent <span id="id_agent_alert" style="color:red;display:none;">*</span></label>
                      </div>
                      <div class="col-md-8 form-group list-agent" style="display: none">
                          <select name="id_agent" id="id_agent" class="form-control form-control-sm">
                              <option value="">Silahkan Pilih Agent</option>
                              @foreach ($agents as $agent)
                                  <option value="{{ $agent->id }}">{{ $agent->agent_domicile }} -
                                      {{ $agent->agent_name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="col-md-4 list-agent" style="display: none">
                          <label>Potongan Diskon Agent</label>
                      </div>
                      <div class="col-md-8 form-group list-agent" style="display: none">
                          <input type="text" id="travel_discount_agent" readonly
                              class="form-control form-control-sm bg-transparent" name="travel_discount_agent">
                          <input type="hidden" id="travel_detail_total_discount" name="travel_detail_total_discount">
                      </div>
                      <div class="col-md-4 list-agent" style="display: none">
                          <label>Total Price Agent</label>
                      </div>
                      <div class="col-md-8 form-group list-agent" style="display: none">
                          <input type="text" id="travel_price_agent" readonly
                              class="form-control form-control-sm bg-transparent" name="travel_price_agent">
                      </div>
                      <div class="col-md-12 form-group w-100 text-right ">
                          <button class="btn btn-success submit_transaction_reguler" style="display:none" type="button"
                              onClick="changeTab(`payment-tab`)">Next</button>
                      </div>


                  </div>
              </div>
          </div>
      </div>

  </div>

  {{-- END TAB TRAVEL DETAIL --}}
