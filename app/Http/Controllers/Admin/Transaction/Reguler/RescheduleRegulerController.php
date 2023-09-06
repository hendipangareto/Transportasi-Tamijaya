<?php

namespace App\Http\Controllers\Admin\Transaction\Reguler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RescheduleRegulerController extends Controller
{
    public function index()
    {
        $all_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, CONCAT(DATE_FORMAT(sr.`date_departure`, '%d %M %Y'), ' (', (SELECT CONCAT(pp.`pick_point_eta`, ' ' , pp.`pick_point_zone`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) , ')') AS date_departure, s.status_name, sr.`type_bus`, c.`customer_name`, c.`customer_phone`, sr.`destination`, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE s.`id` IN (7,8,9,10,13)"));
        return view('admin.transaction.reguler.reschedule.index', ["all_transactions" => $all_transactions]);
    }
    public function create()
    {
        $all_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, CONCAT(DATE_FORMAT(sr.`date_departure`, '%d %M %Y'), ' (', (SELECT CONCAT(pp.`pick_point_eta`, ' ' , pp.`pick_point_zone`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) , ')') AS date_departure, s.status_name, sr.`type_bus`, c.`customer_name`, c.`customer_phone`, sr.`destination`, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE s.`id` IN (7,8,9,10,13)"));
        return view('admin.transaction.reguler.reschedule.display', ["all_transactions" => $all_transactions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = collect(DB::select("SELECT bt.id,bt.booking_transactions_schedule_id, bt.booking_transactions_code, bt.created_at, sr.`date_departure`, s.status_name, c.customer_name, sr.`type_bus`, sr.`destination`, bt.`booking_transactions_pick_point`, bt.`booking_transactions_arrival_point` , bt.`booking_transactions_total_seats`, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE bt.id = $id " ))->first();
        // and bt.booking_transactions_reschedule_date IS NULL
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mendapatkan data',
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rescheduleReguler(Request $request)
    {
        extract($request->all());

        // GET BOOK SEAT
        $BOOKED_SEATS = DB::select("SELECT * FROM booking_seats WHERE booking_seats_booking_id = $booking_id AND booking_seats_schedule_id = $old_schedule_id");

        $arrSeatRescheduled = explode(",",$travel_selected_seat);
        $i = 0;

        foreach ($BOOKED_SEATS as $SEAT) {
            // UPDATE BY ID BOOKING ID & SEAT NUMBER & ID SCHEDULE
            $rescheduledSeatNumber = $arrSeatRescheduled[$i];
            DB::update("UPDATE booking_seats SET updated_at = NOW(), booking_seats_schedule_id = $id_schedule, booking_seats_seat_number = '$rescheduledSeatNumber' WHERE id = " . $SEAT->id);
            $i++;
        }

        // UPDATE ID SCHEDULE WITH BOOKING ID
        if(DB::update("UPDATE booking_transactions SET booking_transactions_reschedule_date = NOW(),booking_transactions_schedule_id = $id_schedule, updated_at = NOW(), updated_by = " . Auth::user()->id ." WHERE booking_transactions_schedule_id = $old_schedule_id AND id = $booking_id")){
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Melakukan Reschedule untuk Booking ID ' . $booking_code,
                'status' => 200
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Melakukan Reschedule untuk Booking ID ' . $booking_code,
                'status' => 200
            ]);
        }

    }
}
