<?php

namespace App\Http\Controllers\Admin\Transaction\Reguler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction\BookingTransaction;
use App\Models\Transaction\BookingSeat;
use App\Models\Transaction\BookingPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\General\Notification;
use PDF;
use Mail;

class DataTransactionRegulerController extends Controller
{
    public function index()
    {
        $all_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, sr.`date_departure`, s.status_name, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status 	WHERE bt.deleted_at IS NULL"));
        $suitess_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, sr.`date_departure`, s.status_name, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE sr.`type_bus` = 'SUITESS' AND bt.deleted_at IS NULL"));
        $executive_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, sr.`date_departure`, s.status_name, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE sr.`type_bus` = 'EXECUTIVE' AND bt.deleted_at IS NULL"));
        return view('admin.transaction.reguler.data-transaction.index', ['all_transactions' => $all_transactions, 'suitess_transactions' => $suitess_transactions, 'executive_transactions' => $executive_transactions]);
    }
    public function create()
    {
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, sr.`date_departure`, s.status_name, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`) FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.`booking_transactions_total_costs` FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status"));
        return view('admin.transaction.reguler.data-transaction.all-transaction', ['data' => $data]);
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $header  = BookingTransaction::findOrFail($id);
        $details = BookingSeat::where('booking_seats_schedule_id', $header->booking_transactions_schedule_id)->get();
        $payments = DB::select("SELECT * FROM booking_payments WHERE id_booking_transaction = $id");
        return view('admin.transaction.reguler.data-transaction.detail-payment', ['header' => $header, 'details' => $details, 'payments' => $payments]);
    }
    public function edit($id)
    {
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, (SELECT DATE_FORMAT(bt.created_at , '%d %M %Y')) as created_at, (SELECT DATE_FORMAT(sr.`date_departure` , '%d %M %Y')) as date_departure, s.status_name, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, bt.booking_transactions_is_agent, bt.`booking_transactions_total_costs`, bt.booking_transactions_total_discount, a.agent_name, bt.booking_transactions_payment_attachment FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent WHERE bt.id = $id"))->first();
        $details = DB::select("SELECT booking_seats_seat_number, booking_seats_seat_price FROM booking_seats WHERE booking_seats_booking_id = $id");
        $payments = DB::select("SELECT * FROM booking_payments WHERE id_booking_transaction = $id");
        return view('admin.transaction.reguler.data-transaction.detail', ['data' => $data, 'details' => $details, 'payments' => $payments]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        BookingTransaction::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Transaksi Reguler',
            'status' => 200,
        ]);
    }

    public function printInvoice($booking_code)
    {
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, (SELECT DATE_FORMAT(bt.created_at , '%d %M %Y')) as created_at, (SELECT DATE_FORMAT(sr.`date_departure` , '%d %M %Y')) as date_departure, s.status_name, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, bt.booking_transactions_is_agent, bt.`booking_transactions_total_costs`, bt.booking_transactions_total_discount, a.agent_name, bt.booking_transactions_payment_attachment FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent WHERE bt.booking_transactions_code = '$booking_code'"))->first();
        $id_booking = $data->id;
        $details = DB::select("SELECT booking_seats_seat_number, booking_seats_seat_price FROM booking_seats WHERE booking_seats_booking_id = $id_booking");
        $pdf = PDF::loadView('admin.reports.invoice-reguler', ['data' => $data, 'details' => $details]);
        $invoice_name = 'INVOICE_REGULER_' . $booking_code;
        return $pdf->stream($invoice_name . '.pdf');
    }
    public function printKwitansi($booking_code)
    {
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, (SELECT DATE_FORMAT(bt.created_at , '%d %M %Y')) as created_at, (SELECT DATE_FORMAT(sr.`date_departure` , '%d %M %Y')) as date_departure, s.status_name, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, bt.booking_transactions_is_agent, bt.`booking_transactions_total_costs`, bt.booking_transactions_total_discount, a.agent_name, bt.booking_transactions_payment_attachment FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent WHERE bt.booking_transactions_code = '$booking_code'"))->first();
        $id_booking = $data->id;
        $details = DB::select("SELECT booking_seats_seat_number, booking_seats_seat_price FROM booking_seats WHERE booking_seats_booking_id = $id_booking");
        $customPaper = array(0, 0, 283.80, 567.00);
        // $pdf = PDF::loadView('pdf.retourlabel', compact('retour','barcode'))->setPaper($customPaper, 'landscape');
        $pdf = PDF::loadView('admin.reports.kwitansi-reguler', ['data' => $data, 'details' => $details])->setPaper($customPaper, 'landscape');
        $invoice_name = 'KWITANSI_REGULER_' . $booking_code;
        return $pdf->stream($invoice_name . '.pdf');
    }

    public function submitPayment(Request $request)
    {
        $id_transaction = $request->id_booking_transaction;
        $amount = $request->amount;
        $payment_type = $request->payment_type;

        $data_payment = [
            'id_booking_transaction' => $id_transaction,
            'amount' => $amount,
            'payment_type' => $payment_type,
            'send_by' => Auth::user()->id
        ];
        BookingPayment::create($data_payment);
        $message = 'Terdapat pembayaran Rp. ' . number_format($amount) . ' (' . $payment_type . ') Nomor Transaksi : R123123';
        $data_notif = [
            'user_id' => 6,
            'user_from' => Auth::user()->id,
            'message' => $message
        ];
        Notification::create($data_notif);

        return response()->json([
            'data' => $data_notif,
            'message' => 'Berhasil menambahakan data pembayaran',
            'status' => $data_notif ? 200 : 400,
        ]);
        // \Mail::send('layouts.template.email', $emailData, function ($message) use ($emailData) {
        //     $message->to($emailData['email'], $emailData['name'])->subject('Notification Email to Finance ' . $emailData['booking_transactions_code']);
        //     $message->from('test@mail.com', 'Booking Transaction Reguler');
        // });
    }
}
