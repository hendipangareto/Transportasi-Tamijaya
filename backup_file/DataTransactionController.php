<?php

namespace App\Http\Controllers\Admin\Transaction\Reguler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction\BookingTransaction;
use Illuminate\Support\Facades\DB;

class DataTransactionController extends Controller
{
    public function index()
    {
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, sr.`date_departure`, s.status_name, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status"));
        return view('admin.transaction.reguler.data-transaction.index', ['data' => $data]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, bt.created_at, sr.`date_departure`, s.status_name,
        c.customer_name, c.customer_address, c.customer_email, c.customer_phone,
        sr.`type_bus`, sr.`destination`, 
        (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point,
        (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point,
        bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name,
        (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder,
        (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account,
        bt.booking_transactions_is_agent,
        bt.`booking_transactions_total_costs`,
        bt.booking_transactions_total_discount,
        a.agent_name,
        bt.booking_transactions_payment_attachment
        FROM `booking_transactions` bt 
        INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code
        INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id
        INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status
        LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent
        WHERE bt.id = $id"))->first();

        $details = DB::select("SELECT booking_seats_seat_number FROM booking_seats WHERE booking_seats_booking_id = $id");
        return view('admin.transaction.reguler.data-transaction.detail', ['data' => $data, 'details' => $details]);
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
}
