<?php

namespace App\Http\Controllers\Admin\FinanceAccounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction\BookingTransaction;
use App\Models\Transaction\BookingPayment;
use Illuminate\Support\Facades\Auth;
use App\Models\FinanceAccounting\Journal;
use App\Models\FinanceAccounting\JournalDetail;
use App\Models\General\Notification;

class ReservationTransactionController extends Controller
{
    public function index()
    {
        $all_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, s.status_name, bt.booking_transactions_type_booking , c.customer_name , bt.created_at , bt.`booking_transactions_total_costs` , 
        s.status_name FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE bt.deleted_at IS NULL AND s.id = 19"));
        return view('admin.finance-accounting.reservation-transaction.index', ["all_transactions" => $all_transactions]);
    }
    public function create()
    {
        $all_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, s.status_name, bt.booking_transactions_type_booking , c.customer_name , bt.created_at , bt.`booking_transactions_total_costs` , 
        s.status_name FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status WHERE bt.deleted_at IS NULL AND s.id = 19"));
        return view('admin.finance-accounting.reservation-transaction.display.all-transaction', ['all_transactions' => $all_transactions]);
    }
    public function store(Request $request)
    {
        $data = BookingTransaction::findOrFail($request->id);
        if ($request->action == "APPROVE") {
            $status_id = 3;
        } else {
            $status_id = 22;
        }
        $data->update(['booking_transactions_status' => $status_id, 'finance_by' => Auth::user()->id]);
        $invoice_number = $data->booking_transactions_code;
        $amount = $data->booking_transactions_total_down_payment;
        $amount_outstanding = $data->booking_transactions_outstanding_payment - $amount;
        if ($request->action == "APPROVE") {
            $message_notificaiton = 'Transaksi dengan nomor :  ' . $invoice_number . ' telah di approve oleh Finance, silahkan kirim PO & Kwitansi kepada customer';
            $data->update(['booking_transactions_outstanding_payment' => $amount_outstanding]);
            DB::table('booking_payments')
                ->where('id_booking_transaction', $data->id)
                ->update(['status' => 'PAID', 'approved_by' =>  Auth::user()->id]);
        } else {
            $message_notificaiton = 'Transaksi dengan nomor :  ' . $invoice_number . ' telah di reject oleh Finance, silahkan periksa kembali dan konfirmasi pemesanan tiket reservasi';
        }
        $data_notification = [
            'user_id' => $data->created_by,
            'user_from' => Auth::user()->id,
            'message' => $message_notificaiton
        ];
        Notification::create($data_notification);
        // CHECK LUNAS / DP
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil melakukan ' . $request->action . ' pada transaksi ' . $request->type,
            'status' => 200,
        ]);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data = BookingTransaction::findOrFail($id);
        if ($data) {
            if ($data->booking_transactions_type_booking == "PARIWISATA") {
                $header = collect(DB::select("SELECT bt.id, bt.booking_transactions_code,bt.booking_transactions_payment_attachment, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, a.armada_type AS type_bus, sp.notes AS notes_travel, sp.total_days AS total_days, s.status_name, bt.booking_transactions_payment_method, ( SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, ( SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, ( SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, ( SELECT CONCAT(a.armada_merk, '- ', a.armada_no_police)) AS armada, (
                    select p2.state_name from provinces p2 where p2.id  = bt.booking_transactions_province_from 
                ) as province_from,
                (
                    select p2.state_name from provinces p2 where p2.id  = bt.booking_transactions_province_to
                ) as province_to,bt.booking_transactions_total_seats , bt.booking_transactions_total_costs, bt.booking_transactions_additional_price , bt.booking_transactions_total_discount ,sp.bus_price , ( SELECT DATE_FORMAT(sp.date_departure, '%d %M %Y')) AS date_departure, ( SELECT DATE_FORMAT(sp.date_return , '%d %M %Y')) AS date_return FROM booking_transactions bt INNER JOIN customers c ON c.id = bt.booking_transactions_customer_code INNER JOIN schedule_pariwisatas sp ON sp.id_booking_transaction = bt.id INNER JOIN armadas a ON a.id = sp.id_armada INNER JOIN STATUS s ON s.id = bt.booking_transactions_status WHERE bt.id = $id"))->first();
                $details = DB::select("SELECT bi.booking_itinerary_tujuan, bi.booking_itinerary_destinasi , bi.booking_itinerary_harga , '' AS notes_details FROM booking_itinerary bi WHERE bi.booking_transaction_id = $id");
                return view('admin.finance-accounting.reservation-transaction.detail-pariwisata', ['data' => $header, 'details' => $details]);
            } else {
                $header = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, bt.booking_transactions_payment_attachment, (SELECT DATE_FORMAT(bt.created_at , '%d %M %Y')) as created_at, (SELECT DATE_FORMAT(sr.`date_departure` , '%d %M %Y')) as date_departure, s.status_name, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, sr.`type_bus`, sr.`destination`, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_pick_point) AS pick_point, (SELECT CONCAT(pp.`pick_point_origin`,' - ',pp.`pick_point_name`,' (',pp.`pick_point_eta`,' ',pp.`pick_point_zone`, ')') FROM `pick_points` pp WHERE pp.id = bt.booking_transactions_arrival_point) AS arrival_point, bt.booking_transactions_payment_method, (SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, (SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, (SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, bt.booking_transactions_is_agent, bt.`booking_transactions_total_costs`, bt.booking_transactions_total_discount, a.agent_name, bt.booking_transactions_payment_attachment FROM `booking_transactions` bt INNER JOIN `customers` c ON c.id = bt.booking_transactions_customer_code INNER JOIN `schedule_regulers` sr ON sr.`id` = bt.booking_transactions_schedule_id INNER JOIN `status` s ON s.`id` = bt.booking_transactions_status LEFT JOIN `agents` a ON a.`id` = bt.booking_transactions_id_agent WHERE bt.id = $id"))->first();
                $details = DB::select("SELECT booking_seats_seat_number, booking_seats_seat_price FROM booking_seats WHERE booking_seats_booking_id = $id");
                return view('admin.finance-accounting.reservation-transaction.detail-reguler', ['data' => $header, 'details' => $details]);
            }
        }
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
