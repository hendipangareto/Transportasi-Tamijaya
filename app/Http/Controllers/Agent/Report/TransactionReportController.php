<?php

namespace App\Http\Controllers\Agent\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction\BookingTransaction;

class TransactionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agent.report.transaction.index');
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
    public function show($booking_code)
    {
        echo json_encode($booking_code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($transaction_report)
    {
        $data = BookingTransaction::where('booking_transactions_code', $transaction_report)->first();
        if ($data) {
            return response()->json([
                'data' => $data,
                'message' => 'Berhasil mendapatkan data transaksi',
                'status' => 200,
            ]);
        }
        return response()->json([
            'message' => 'Tidak Berhasil mendapatkan data transaksi',
            'status' => 400,
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

    public function showDataTransaction($booking_code)
    {
        $data = BookingTransaction::where('booking_transactions_code', $booking_code)->first();
        if ($data) {
            return view('agent.report.transaction.detail', ["booking_code" => $booking_code]);
        } else {
            return view('agent.report.transaction.not-found', ["booking_code" => $booking_code]);
        }


        // else {
        // }
    }
}
