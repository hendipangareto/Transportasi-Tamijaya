<?php

namespace App\Http\Controllers\Admin\Transaction\Reguler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Bank;
use App\Models\Transaction\Booking;
use App\Models\HumanResource\Agent;
use Illuminate\Support\Facades\Auth;
use App\Models\FinanceAccounting\Journal;
use App\Models\FinanceAccounting\JournalDetail;

class BookingController extends Controller
{
    public function index()
    {
        $banks = Bank::orderBy('bank_name', 'ASC')->get();
        $agents = Agent::orderBy('agent_domicile', 'ASC')->get();
        return view('admin.transaction.reguler.booking.index', ['banks' => $banks, 'agents' => $agents]);
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
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }



    public function getMasterCustomer(Request $request)
    {
        $data = [];
        $search = $request->search;
        $data =  DB::select("SELECT CONCAT(id,'|',customer_code,'|',customer_phone,'|',customer_nik,'|',customer_email) 'id', CONCAT(customer_name, ' - ', customer_email) 'text' FROM customers WHERE customer_name LIKE '%" . $search . "%'");
        return response()->json($data);
    }

    public function getMasterPickPoint()
    {
        $pick_point_jogja = DB::select("SELECT id, concat(pick_point_origin,' - ',pick_point_name) 'text' FROM `pick_points` WHERE pick_point_origin = 'JOGJA' OR pick_point_origin = 'KLATEN-SOLO-NGAWI'");
        $pick_point_denpasar = DB::select("SELECT id,  concat(pick_point_origin,' - ',pick_point_name) 'text' FROM `pick_points` WHERE pick_point_origin = 'DENPASAR'");
        return response()->json(array("JOGJA" => $pick_point_jogja, "DENPASAR" => $pick_point_denpasar));
    }


    public function getSeatReguler(Request $request)
    {
        if ($request->typeTravel == "SUITESS") {
            return view('admin.transaction.reguler.seat.suitess');
        } else {
            return view('admin.transaction.reguler.seat.executive');
        }
    }

    public function getScheduleReguler(Request $request)
    {
        $resultSchedule = DB::select("SELECT SCHREG.id, ARMD.armada_type FROM schedule_regulers SCHREG
                    LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
                    WHERE SCHREG.`date_departure` = '" . $request->dateTravel . "' AND destination = '" . $request->tujuanTravel . "'");

        $resultSeat = DB::select("SELECT booking_seats_seat_number FROM booking_seats SEAT
                            LEFT JOIN schedule_regulers SCHREG ON SEAT.booking_seats_schedule_id = SCHREG.ID
                            WHERE SCHREG.`date_departure` =  '" . $request->dateTravel . "'  AND destination = '" . $request->tujuanTravel . "'");

        return response()->json([
            'seat' => $resultSeat,
            'schedule' => $resultSchedule,
            'message' => empty($resultSchedule) ? 'Tidak ada armada tersedia' : 'Armada Tersedia !',
            'status' => $resultSchedule ? 200 : 400
        ]);
    }

    public function submitTransactionReguler(Request $request)
    {
        // $this->_validation($request);
        $req = $request->all();
        $payload = array(
            "_token" =>  $req['_token'],
            'booking_transactions_code' => 'R'.date('dHis'),
            'booking_transactions_customer_code' => $req['transaction_customer_id'],
            'booking_transactions_schedule_id' => $req['id_schedule'],
            'booking_transactions_pick_point' => $req['transaction_travel_detail_pick_point'],
            'booking_transactions_arrival_point' => $req['transaction_travel_detail_arrival_point'],
            'booking_transactions_total_seats' => $req['travel_passenger'],
            'booking_transactions_total_costs' => $req['travel_detail_total_cost'],
            'booking_transactions_total_discount' => $req['travel_detail_total_discount'] ? $req['travel_detail_total_discount'] : 0,
            'booking_transactions_payment_method' => $req['payment_method'],
            'booking_transactions_id_payment' => $req['id_payment'] ? $req['id_payment'] : null,
            // 'booking_transactions_payment_attachment' => $req['payment_attachment'],
            'booking_transactions_is_agent' => $req['check_agent'],
            'booking_transactions_id_agent' => $req['id_agent'] ? $req['id_agent'] : null,
            'booking_transactions_status' => 7,
            'created_by' => Auth::user()->id
        );

        $data = Booking::create($payload);

        $valueSeat = '';
        $bookedSeat = explode(",", $req['travel_selected_seat']);
        $costSeat = ((int)$req['travel_detail_total_cost'] + ((int)$req['travel_detail_total_discount'] ? (int)$req['travel_detail_total_discount'] : 0)) / $req['travel_passenger'];
        foreach ($bookedSeat as $key => $value) {
            if($valueSeat === ''){
                $valueSeat .=  "(" . $req['id_schedule'] . "," . $data['id'] . ",'". $value . "'," . $costSeat . ", NOW())";
            } else {
                $valueSeat .=  ",(" . $req['id_schedule'] . "," . $data['id'] . ",'". $value . "'," .  $costSeat . ", NOW())";
            }
        }

        $resultInsertSeat = DB::insert("INSERT INTO booking_seats(booking_seats_schedule_id,booking_seats_booking_id,booking_seats_seat_number,booking_seats_seat_price,created_at) VALUES $valueSeat");

        // ADD JOURNAL
        $count = Journal::count();
        if ($count > 0) {
            $last_data =  Journal::latest('id')->first();
            $last_data_code = substr($last_data->data_code, -3);
            if (str_contains($last_data_code, "00")) {
                $sequence = substr($last_data_code, -1) + 1;
            } else if (str_contains($last_data_code, "0")) {
                $sequence = substr($last_data_code, -2) + 1;
            } else {
                $sequence =  $last_data->id + 1;
            }
        } else {
            $sequence =  1;
        }

        $output = '';
        if ($sequence == 1) {
            $sequence = 1;
        }
        if (strlen($sequence) == 1) {
            $output = '00' . $sequence;
        } else if (strlen($sequence) == 2) {
            $output = '0' . $sequence;
        } else {
            $output = $sequence;
        }
        // GENERATE DATE TO NUMBER
        $fullDate = date("dmy");
        $journal_number = "JU" . $fullDate . "-" . $output;
        $journal_description = 'Transaksi Tiket : R' . date('dHis') . ' total pembelian Rp. ' . number_format($req['travel_detail_total_cost']);
        $amount = $req['travel_detail_total_cost'];
        if ($req['payment_method'] == "TRANSFER" && $req['id_payment'] == 1) {
            $account_debit = 3;
        } else if ($req['payment_method'] == "TRANSFER" && $req['id_payment'] == 2) {
            $account_debit = 4;
        } else if ($req['payment_method'] == "TRANSFER" && $req['id_payment'] == 3) {
            $account_debit = 5;
        } else if ($req['payment_method'] == "CASH") {
            $account_debit = 6;
        }

        $transaction_type = "SUITESS";
        if ($transaction_type == "SUITESS") {
            $account_kredit = 27;
        } else if ($transaction_type == "EXECUTIVE") {
            $account_kredit = 28;
        }
        $data_journal = [
            'journal_number' => $journal_number,
            'journal_date' => date("Y-m-d"),
            'journal_description' => $journal_description,
            'journal_debit' => $amount,
            'journal_kredit' => $amount,
            'journal_balance' => 0,
            'status' => 2
        ];

        $journal = Journal::create($data_journal);
        $data_debit = [
            'id_journal' => $journal->id,
            'id_account' => $account_debit,
            'type_journal' => 'DEBIT',
            'journal_amount' => $amount,
            'journal_notes' => ''
        ];
        $data_kredit = [
            'id_journal' => $journal->id,
            'id_account' => $account_kredit,
            'type_journal' => 'KREDIT',
            'journal_amount' => $amount,
            'journal_notes' => ''
        ];
        JournalDetail::create($data_debit);
        JournalDetail::create($data_kredit);

        return response()->json([
            'data' => $resultInsertSeat,
            'message' => 'Berhasil submit Data Transaction Reguler',
            'status' => $resultInsertSeat ? 200 : 400
        ]);
    }

}
