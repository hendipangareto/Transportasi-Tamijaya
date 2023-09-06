<div class="modal fade text-left" id="modal-reschedule-reguler-transaction" tabindex="-1" role="dialog"
    aria-labelledby="modal-title " aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header mx-1 px-1">
                <div class="d-flex">
                    <h4 class="modal-title" id="modal-title">Reschedule # </h4>
                    <h4 id="reschedule-booking_transactions_code"> </h4>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="reschedule-form" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="reschedule-booking_id" name="booking_id">
                    <input type="hidden" id="reschedule-booking_code" name="booking_code">
                    <input type="hidden" id="reschedule-schedule_id" name="old_schedule_id">
                    <input type="hidden" id="reschedule-destination" name="old_destination">
                    <input type="hidden" id="reschedule-type_bus" name="old_type_bus">
                    <input type="hidden" id="reschedule-total_seats" name="old_total_seats">
                    <input type="hidden" id="reschedule-total_cost" name="old_total_cost">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Pick Point:</label>
                            <div class="form-group mb-0">
                                <select id="reschedule-pick_point" name="reschedule-pick_point"
                                    class="form-control form-control-sm">
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Arrival Point:</label>
                            <div class="form-group mb-0">
                                <select id="reschedule-arrival_point" name="reschedule-arrival_point"
                                    class="form-control form-control-sm">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Date Departure:</label>
                            <div class="form-group mb-0">
                                <input type="date" id="reschedule-date_departure" name="reschedule-date_departure"
                                    class="form-control form-control-sm bg-transparent" readonly>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Date Reschedule:</label>
                            <div class="form-group mb-0">
                                <input type="date" id="reschedule-date" name="reschedule-date"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-warning btn-block mt-2" onclick="searchTravel()"><i
                                    class="bx bx-search-alt"></i> Check Availibility</button>
                        </div>
                    </div>
                    <div id="reguler-schedule-not-available" class="mt-2" style="display: none">
                        <div class="alert alert-danger text-center font-weight-bold" role="alert">
                            Sorry, regular schedule is not available. Try another date or destination.
                        </div>
                    </div>
                    <div id="seat-selection" class="mt-2" style="display: none">
                        <div class="row">
                            <link href="{{ asset('css/animate-seat.css') }}" rel="stylesheet">
                            <div class="col-md-6" id="display-seat">

                            </div>
                            <div class="col-md-6">
                                {{-- <input type="hidden" id="id_schedule" name="id_schedule"> --}}
                                <h6 class="font-weight-bold text-uppercase">Detail Seat & Travel Type</h6>
                                <small class="font-weight-bold text-warning">Available Seats : <span
                                        id="available_seats"></span> Seat(s)</small>
                                <hr>
                                <div class="form-body">
                                    <div class="row">
                                        <input type="hidden" id="id_schedule" name="id_schedule">
                                        <div class="col-md-4">
                                            <label>Travel Price</label>
                                        </div>
                                        <div class="col-md-8 form-group ">
                                            <input type="text" id="travel_price" readonly
                                                class="form-control form-control-sm bg-transparent" name="travel_price">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Selected Seat</label>
                                        </div>
                                        <div class="col-md-8 form-group ">
                                            <input type="text" id="travel_selected_seat" readonly
                                                class="form-control form-control-sm bg-transparent"
                                                name="travel_selected_seat">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Passenger(s)</label>
                                        </div>
                                        <div class="col-md-8 form-group ">
                                            <input type="text" id="travel_passenger" readonly
                                                class="form-control form-control-sm bg-transparent" name="travel_passenger">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Total Price</label>
                                        </div>
                                        <div class="col-md-8 form-group ">
                                            <input type="text" id="travel_total_price"
                                                class="form-control form-control-sm bg-transparent"
                                                name="travel_total_price" readonly>
                                            <input type="hidden" id="travel_detail_total_cost"
                                                name="travel_detail_total_cost" readonly>
                                        </div>
                                        <div class="col-md-4 list-agent" style="display: none">
                                            <label>Total Price Agent</label>
                                        </div>
                                        <div class="col-md-8 form-group list-agent" style="display: none">
                                            <input type="text" id="travel_price_agent" readonly
                                                class="form-control form-control-sm bg-transparent"
                                                name="travel_price_agent">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-success btn-block" type="button"
                                                onClick="manageData(`reschedule`)"><i class="bx bx-sync mr-2"></i>Reschedule
                                                Reservation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
