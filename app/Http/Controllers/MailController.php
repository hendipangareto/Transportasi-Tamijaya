<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;

class MailController extends Controller {

    public function sendEmail(Request $request){
        try {
            $data = $request->all();
            $booking_code = 'R19082729';

            $customer = array('name'=> 'Johanes Adhitya Hartanto', 'email' => 'joadhityah73@gmail.com');

            $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, (SELECT DATE_FORMAT(bt.created_at , '%d %M %Y')) as created_at, (SELECT DATE_FORMAT(sr.`date_departure` , '%d %M %Y')) as date_departure, s.status_name, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, bt.booking_transactions_is_agent, bt.`booking_transactions_total_costs`, bt.booking_transactions_total_discount, a.agent_name, bt.booking_transactions_payment_attachment FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent WHERE bt.booking_transactions_code = '$booking_code'"))->first();
            $id_booking = $data->id;
            $details = DB::select("SELECT booking_seats_seat_number, booking_seats_seat_price FROM booking_seats WHERE booking_seats_booking_id = $id_booking");
            $pdf = PDF::loadView('admin.reports.invoice-reguler', ['data' => $data, 'details' => $details]);
            $invoice_name = 'INVOICE_REGULER_' . $booking_code . '.pdf';

            // Send Email
            \Mail::send('layouts.template.email', $customer, function($message) use($customer, $pdf, $invoice_name) {
                $message->to($customer['email'], $customer['name'])->subject('Invoice Mail Test')->attachData($pdf->output(), $invoice_name);;
                $message->from('test@mail.com','Test User');
            });
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            echo 'Error sending email';
        }

    }

}
