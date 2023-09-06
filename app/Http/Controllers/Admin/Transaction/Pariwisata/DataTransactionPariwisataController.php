<?php

namespace App\Http\Controllers\Admin\Transaction\Pariwisata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DataTransactionPariwisataController extends Controller
{
    public function index()
    {
        $all_transactions = collect(DB::select("SELECT bt.id, bt.booking_transactions_code, c.customer_name, s.status_name, ( SELECT CONCAT(a.armada_merk, '- ', a.armada_no_police)) AS armada,(
			select p2.state_name from provinces p2 where p2.id  = bt.booking_transactions_province_from 
		) as province_from, bt.booking_transactions_total_seats , bt.booking_transactions_total_costs, ( SELECT DATE_FORMAT(sp.date_departure, '%d %M %Y')) AS date_departure FROM booking_transactions bt INNER JOIN customers c ON c.id = bt.booking_transactions_customer_code INNER JOIN schedule_pariwisatas sp ON sp.id_booking_transaction = bt.id INNER JOIN armadas a ON a.id = sp.id_armada INNER JOIN STATUS s ON s.id = bt.booking_transactions_status"));
        return view('admin.transaction.pariwisata.data-transaction.index', ['all_transactions' => $all_transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = collect(DB::select("SELECT bt.id, bt.booking_transactions_code,bt.booking_transactions_payment_attachment, c.customer_name, c.customer_address, c.customer_email, c.customer_phone, a.armada_type AS type_bus, sp.notes AS notes_travel, sp.total_days AS total_days, s.status_name, bt.booking_transactions_payment_method, ( SELECT b.bank_name FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_name, ( SELECT b.bank_holder FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_holder, ( SELECT b.bank_account FROM banks b WHERE b.`id` = bt.booking_transactions_id_payment) AS bank_account, ( SELECT CONCAT(a.armada_merk, '- ', a.armada_no_police)) AS armada, (
			select p2.state_name from provinces p2 where p2.id  = bt.booking_transactions_province_from 
		) as province_from,
		(
			select p2.state_name from provinces p2 where p2.id  = bt.booking_transactions_province_to
		) as province_to,bt.booking_transactions_total_seats , bt.booking_transactions_total_costs, bt.booking_transactions_additional_price , bt.booking_transactions_total_discount ,sp.bus_price , ( SELECT DATE_FORMAT(sp.date_departure, '%d %M %Y')) AS date_departure, ( SELECT DATE_FORMAT(sp.date_return , '%d %M %Y')) AS date_return FROM booking_transactions bt INNER JOIN customers c ON c.id = bt.booking_transactions_customer_code INNER JOIN schedule_pariwisatas sp ON sp.id_booking_transaction = bt.id INNER JOIN armadas a ON a.id = sp.id_armada INNER JOIN STATUS s ON s.id = bt.booking_transactions_status WHERE bt.id = $id"))->first();
        $details = DB::select("SELECT bi.booking_itinerary_tujuan, bi.booking_itinerary_destinasi , bi.booking_itinerary_harga , '' AS notes_details FROM booking_itinerary bi WHERE bi.booking_transaction_id = $id");
        return view('admin.transaction.pariwisata.data-transaction.detail', ['data' => $data, 'details' => $details]);
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

    public function printInvoice($booking_code)
    {
        $booking = collect(DB::select("SELECT BTRX.ID booking_id, BTRX.booking_transactions_code, BTRX.booking_transactions_total_seats, DATE_FORMAT(SCHPAR.`date_departure` , '%W, %d %M %Y') date_departure, DATE_FORMAT(SCHPAR.`date_return` , '%W, %d %M %Y') date_return, SCHPAR.`notes` customer_notes, SCHPAR.`bus_price` ,CUST.customer_name, CUST.customer_address, CUST.customer_email, PRVFRM.`state_name` province_from, PRVTO.`state_name` province_to, CITYFRM.city_name, CITYTO.city_name, ARMD.`armada_no_police`, ARMD.`armada_type`, ARMD.`armada_seat`, BTRX.`booking_transactions_additional_price`, BTRX.`booking_transactions_total_discount`
        FROM booking_transactions BTRX INNER JOIN CUSTOMERS CUST ON BTRX.booking_transactions_customer_code = CUST.ID
        INNER JOIN schedule_pariwisatas SCHPAR ON BTRX.ID = SCHPAR.`id_booking_transaction`
        INNER JOIN armadas ARMD ON SCHPAR.`id_armada` = ARMD.`id`
        INNER JOIN provinces PRVFRM ON BTRX.`booking_transactions_province_from` = PRVFRM.`id`
        INNER JOIN provinces PRVTO ON BTRX.`booking_transactions_province_from` = PRVTO.`id`
        INNER JOIN cities CITYFRM ON BTRX.`booking_transactions_city_from` = CITYFRM.`id`
        INNER JOIN cities CITYTO ON BTRX.`booking_transactions_city_to` = CITYTO.`id`
        WHERE BTRX.booking_transactions_code = '$booking_code'"))->first();
        $id_booking = $booking->booking_id;
        $itinerary = DB::select("SELECT * FROM booking_itinerary WHERE booking_transaction_id = $id_booking");

        $pdf = PDF::loadView('admin.reports.invoice-pariwisata', ['booking' => $booking, 'itinerary' => $itinerary]);
        $invoice_name = 'INVOICE_PARIWISATA_' . $booking_code;
        // return $pdf->download($invoice_name.'.pdf');
        return $pdf->stream();
    }
}
