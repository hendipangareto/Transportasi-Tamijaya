<?php

namespace App\Http\Controllers\Client\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Armada;
use App\Models\HumanResource\Employee;
use App\Models\Transaction\ScheduleReguler;
use Illuminate\Support\Facades\DB;

class BookingReservationController extends Controller
{
    public function getScheduleReguler(Request $request)
    {
        $resultSchedule = DB::select("SELECT SCHREG.id, ARMD.armada_type FROM schedule_regulers SCHREG
                    LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
                    WHERE SCHREG.`date_departure` = '" . $request->dateTravel . "' AND destination = '" . $request->tujuanTravel . "'");

        $resultSeat = DB::select("SELECT booking_seats_seat_number FROM booking_seats SEAT
                            LEFT JOIN schedule_regulers SCHREG ON SEAT.booking_seats_schedule_id = SCHREG.ID
                            WHERE SCHREG.`date_departure` =  '" . $request->dateTravel . "'  AND destination = '" . $request->tujuanTravel . "'");

        if (isset($request->typeTravel)) {
            $resultSchedule = DB::select("SELECT SCHREG.id, ARMD.armada_type FROM schedule_regulers SCHREG
            LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
            WHERE SCHREG.`date_departure` = '" . $request->dateTravel . "' AND destination = '" . $request->tujuanTravel . "'  AND ARMD.armada_type = '" . $request->typeTravel . "'");

            $resultSeat = DB::select("SELECT booking_seats_seat_number FROM booking_seats SEAT
                    LEFT JOIN schedule_regulers SCHREG ON SEAT.booking_seats_schedule_id = SCHREG.ID
                    LEFT JOIN armadas ARMD ON SCHREG.id_armada = ARMD.ID
                    WHERE SCHREG.`date_departure` =  '" . $request->dateTravel . "'  AND destination = '" . $request->tujuanTravel . "' AND ARMD.armada_type = '" . $request->typeTravel . "'");
        }

        return response()->json([
            'seat' => $resultSeat,
            'schedule' => $resultSchedule,
            'message' => empty($resultSchedule) ? 'Tidak ada armada tersedia' : 'Armada Tersedia !',
            'status' => $resultSchedule ? 200 : 400
        ]);
    }

    public function getSeatReguler(Request $request)
    {
        if ($request->typeTravel == "SUITESS") {
            return view('admin.transaction.reguler.seat.suitess');
        } else {
            return view('admin.transaction.reguler.seat.executive');
        }
    }
}
