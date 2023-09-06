<?php

namespace App\Http\Controllers\Admin\Transaction\Reguler;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\MasterData\Bank;
use App\Models\Transaction\BookingTransaction;
use App\Models\Transaction\BookingPayment;
use App\Models\HumanResource\Agent;
use App\Models\General\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class BookingRegulerController extends Controller
{
    public function index()
    {
        $banks = Bank::orderBy('bank_name', 'ASC')->get();
        $agents = Agent::orderBy('agent_domicile', 'ASC')->get();
        $users = User::orderBy('name', 'ASC')->get();
        return view('admin.transaction.reguler.booking.index', ['banks' => $banks, 'agents' => $agents, 'users' => $users]);
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
        $data = DB::select("SELECT CONCAT(id,'|',customer_code,'|',customer_phone,'|',customer_nik,'|',customer_email) 'id', CONCAT(customer_name, ' - ', customer_email) 'text' FROM customers WHERE customer_name LIKE '%" . $search . "%'");
        return response()->json($data);
    }

    public function getMasterPickPoint()
    {
        $pick_point_jogja = DB::select("SELECT id, concat(pick_point_origin,' - ',pick_point_name) 'text' FROM `pick_points` WHERE pick_point_origin = 'JOGJA' OR pick_point_origin = 'KLATEN-SOLO-NGAWI'");
        $pick_point_denpasar = DB::select("SELECT id,  concat(pick_point_origin,' - ',pick_point_name) 'text' FROM `pick_points` WHERE pick_point_origin = 'DENPASAR'");
        return response()->json(['JOGJA' => $pick_point_jogja, 'DENPASAR' => $pick_point_denpasar]);
    }

    public function getSeatReguler(Request $request)
    {
        if ($request->typeTravel == 'SUITESS') {
            return view('admin.transaction.reguler.seat.suitess');
        } else {
            return view('admin.transaction.reguler.seat.executive');
        }
    }

    public function getScheduleReguler(Request $request)
    {
        $resultSchedule = DB::select(
            "SELECT SCHREG.id, ARMD.armada_type FROM schedule_regulers SCHREG
                    LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
                    WHERE SCHREG.`date_departure` = '" .
                $request->dateTravel .
                "' AND destination = '" .
                $request->tujuanTravel .
                "'",
        );

        $resultSeat = DB::select(
            "SELECT booking_seats_seat_number FROM booking_seats SEAT
                            LEFT JOIN schedule_regulers SCHREG ON SEAT.booking_seats_schedule_id = SCHREG.ID
                            WHERE SCHREG.`date_departure` =  '" .
                $request->dateTravel .
                "'  AND destination = '" .
                $request->tujuanTravel .
                "'",
        );

        if (isset($request->typeTravel)) {
            $resultSchedule = DB::select(
                "SELECT SCHREG.id, ARMD.armada_type FROM schedule_regulers SCHREG
            LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
            WHERE SCHREG.`date_departure` = '" .
                    $request->dateTravel .
                    "' AND destination = '" .
                    $request->tujuanTravel .
                    "'  AND ARMD.armada_type = '" .
                    $request->typeTravel .
                    "'",
            );

            $resultSeat = DB::select(
                "SELECT booking_seats_seat_number FROM booking_seats SEAT
                    LEFT JOIN schedule_regulers SCHREG ON SEAT.booking_seats_schedule_id = SCHREG.ID
                    LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
                    WHERE SCHREG.`date_departure` =  '" .
                    $request->dateTravel .
                    "'  AND destination = '" .
                    $request->tujuanTravel .
                    "' AND ARMD.armada_type = '" .
                    $request->typeTravel .
                    "'",
            );
        }

        return response()->json([
            'seat' => $resultSeat,
            'schedule' => $resultSchedule,
            'message' => empty($resultSchedule) ? 'Tidak ada armada tersedia' : 'Armada Tersedia !',
            'status' => $resultSchedule ? 200 : 400,
        ]);
    }

    public function submitTransactionReguler(Request $request)
    {
        // $this->_validation($request);
        $req = $request->all();
        $path_payment_attachment = null;

        $files = $request->file();
        if ($files) {
            $path_payment_attachment = $files['payment_attachment']->store('assets/payment', 'public');
        }

        $payload = [
            '_token' => $req['_token'],
            'booking_transactions_code' => 'R' . date('dHis'),
            'booking_transactions_customer_code' => $req['transaction_customer_id'],
            'booking_transactions_type_booking' => 'REGULER',
            'booking_transactions_schedule_id' => $req['id_schedule'],
            'booking_transactions_pick_point' => $req['transaction_travel_detail_pick_point'],
            'booking_transactions_pic' => $req['booking_transactions_pic'],
            'booking_transactions_arrival_point' => $req['transaction_travel_detail_arrival_point'],
            'booking_transactions_total_seats' => $req['travel_passenger'],
            'booking_transactions_total_costs' => $req['travel_detail_total_cost'],
            'booking_transactions_outstanding_payment' => $req['travel_detail_total_cost'],
            'booking_transactions_total_discount' => $req['travel_detail_total_discount'] ? $req['travel_detail_total_discount'] : 0,
            'booking_transactions_type_down_payment' => $req['type_down_payment'] ? $req['type_down_payment'] : null,
            'booking_transactions_total_down_payment' => $req['total_down_payment'] ? $req['total_down_payment'] : null,
            'booking_transactions_payment_method' => $req['payment_method'],
            'booking_transactions_id_payment' => $req['id_payment'] ? $req['id_payment'] : null,
            'booking_transactions_payment_attachment' => $path_payment_attachment ? $path_payment_attachment : null,
            'booking_transactions_is_agent' => $req['check_agent'],
            'booking_transactions_id_agent' => $req['id_agent'] ? $req['id_agent'] : null,
            'booking_transactions_status' => 19,
            'created_by' => Auth::user()->id,
        ];

        $data = BookingTransaction::create($payload);
        $data_payment = [
            'id_booking_transaction' => $data->id,
            'amount' => $data->booking_transactions_total_down_payment,
            'payment_type' => $data->booking_transactions_payment_method,
            'attachment' => $data->booking_transactions_payment_attachment,
            'send_by' => $data->created_by,
        ];
        BookingPayment::create($data_payment);

        $valueSeat = '';
        $bookedSeat = explode(',', $req['travel_selected_seat']);
        $costSeat = ((int) $req['travel_detail_total_cost'] + ((int) $req['travel_detail_total_discount'] ? (int) $req['travel_detail_total_discount'] : 0)) / $req['travel_passenger'];
        foreach ($bookedSeat as $key => $value) {
            if ($valueSeat === '') {
                $valueSeat .= '(' . $req['id_schedule'] . ',' . $data['id'] . ",'" . $value . "'," . $costSeat . ', NOW())';
            } else {
                $valueSeat .= ',(' . $req['id_schedule'] . ',' . $data['id'] . ",'" . $value . "'," . $costSeat . ', NOW())';
            }
        }

        $resultInsertSeat = DB::insert("INSERT INTO booking_seats(booking_seats_schedule_id,booking_seats_booking_id,booking_seats_seat_number,booking_seats_seat_price,created_at) VALUES $valueSeat");

        Notification::create(['user_id' => 6, 'user_from' => Auth::user()->id, 'message' => 'Reguler Transaction ' . $data['booking_transactions_code'] . ' waiting for payment confirmation !']);

        $emailData = array('name' => 'Keuangan Tamijaya', 'email' => 'keuangan@gmail.com', 'booking_transactions_code' => $data['booking_transactions_code']);

        
        // Send Email
        \Mail::send('layouts.template.email', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'], $emailData['name'])->subject('Notification Email to Finance ' . $emailData['booking_transactions_code']);
            $message->from('test@mail.com', 'Booking Transaction Reguler');
        });

        return response()->json([
            'data' => $resultInsertSeat,
            'message' => 'Berhasil submit Data Transaction Reguler',
            'status' => $resultInsertSeat ? 200 : 400,
        ]);
    }
}
