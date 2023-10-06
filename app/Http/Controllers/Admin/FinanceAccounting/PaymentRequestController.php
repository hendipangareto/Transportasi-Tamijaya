<?php

namespace App\Http\Controllers\Admin\FinanceAccounting;

use Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction\BookingPayment;
use App\Models\Transaction\BookingTransaction;
use Illuminate\Support\Facades\Auth;
use App\Models\FinanceAccounting\Journal;
use App\Models\FinanceAccounting\JournalDetail;
use App\Models\FinanceAccounting\CashFlow;
use App\Models\General\Notification;

class PaymentRequestController extends Controller
{

    public function index()
    {
        return view('admin.finance-accounting.payment-request.index');
    }

    public function create()
    {
        // $data = BookingPayment::where('status', 'REQUESTED')->get();
        $data =  DB::table('booking_payments')
            ->select('booking_payments.*', 'booking_transactions.booking_transactions_code', 'customers.customer_name', 'users.name as user_name')
            ->join('booking_transactions', 'booking_payments.id_booking_transaction', 'booking_transactions.id')
            ->join('users', 'booking_payments.send_by', 'users.id')
            ->leftJoin('customers', 'booking_transactions.booking_transactions_customer_code', 'customers.id')
            ->where('booking_payments.status', 'REQUESTED')
            ->get();
        return view('admin.finance-accounting.payment-request.display', ["data" => $data]);
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
        $data = BookingPayment::findOrFail($id);
        return response()->json([
            'data' => $data,
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

    public function paymentApproveReject(Request $request)
    {
        $data_payment = BookingPayment::findOrFail($request->id);
        $id_booking_transaction = $data_payment->id_booking_transaction;
        $data_transaction = BookingTransaction::findOrFail($id_booking_transaction);
        $invoice_number = $data_transaction->booking_transactions_code;
        $amount = $data_transaction->booking_transactions_total_down_payment;
        if ($request->action == 'APPROVE') {
            $status = 'PAID';
            $outstanding_amount = $data_transaction->booking_transactions_outstanding_payment - $data_payment->amount;
            if ($data_transaction->booking_transactions_status = 19) {
                $status_id = 3;
                $data_transaction->update(['booking_transactions_status' => $status_id, 'finance_by' => Auth::user()->id]);
                $message_notificaiton = 'Transaksi dengan nomor :  ' . $invoice_number . ' telah di approve oleh Finance, silahkan kirim PO & Kwitansi kepada customer';
                $data_notification = [
                    'user_id' => $data_transaction->created_by,
                    'user_from' => Auth::user()->id,
                    'message' => $message_notificaiton
                ];
                Notification::create($data_notification);
            }
            DB::table('booking_transactions')
                ->where('id', $id_booking_transaction)
                ->update(['booking_transactions_outstanding_payment' => $outstanding_amount]);

            Helper::createJournal(27, 'Pembayaran Tiket Reguler Suitess : R01293921', 'DEBIT', 200000, $status = 'PAID');
        } else {
            $status = 'REJECT';
        }

        DB::table('booking_payments')
            ->where('id', $request->id)
            ->update(['status' => $status, 'approved_by' =>  Auth::user()->id]);

        return response()->json([
            'data' => $request->all(),
            'message' => 'Berhasil melakukan ' . $request->action . ' pembayaran',
            'status' => $request->all() ? 200 : 400,
        ]);
    }
}
