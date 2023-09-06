<div id="detail-seat" class="mt-4 mt-lg-0">
    <h4 class="text-uppercase">Detail Seat & Travel Type</h4>
    <p class="available-seats">Available Seats : <span id="available_seats"></span> Seat(s)</p>
    <hr>
    <div class="form-body">
        <div class="row">
            <input type="hidden" id="id_schedule" name="id_schedule">
            <div class="col-md-4">
                <label>Travel Type</label>
            </div>
            <div class="col-md-8 form-group ">
                <input type="text" id="travel_type_name" readonly class="form-control form-control-sm bg-transparent"
                    name="travel_type_name" value="">
            </div>
            <div class="col-md-4">
                <label>Travel Price</label>
            </div>
            <div class="col-md-8 form-group ">
                <input type="text" id="travel_price" readonly class="form-control form-control-sm bg-transparent"
                    name="travel_price" value="">
            </div>
            <div class="col-md-4">
                <label>Selected Seat</label>
            </div>
            <div class="col-md-8 form-group ">
                <input type="text" id="travel_selected_seat" readonly
                    class="form-control form-control-sm bg-transparent" name="travel_selected_seat" value="">
            </div>
            <div class="col-md-4">
                <label>Passenger(s)</label>
            </div>
            <div class="col-md-8 form-group ">
                <input type="text" id="travel_passenger" readonly class="form-control form-control-sm bg-transparent"
                    name="travel_passenger" value="">
            </div>
            <div class="col-md-4">
                <label>Total Price</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="text" id="travel_total_price" class="form-control form-control-sm bg-transparent"
                    name="travel_total_price" value="" readonly>
                <input type="hidden" id="travel_detail_total_cost" name="travel_detail_total_cost" readonly>
            </div>
        </div>
    </div>
</div>
