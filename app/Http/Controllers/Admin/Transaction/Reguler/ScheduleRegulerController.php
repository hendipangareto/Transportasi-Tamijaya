<?php

namespace App\Http\Controllers\Admin\Transaction\Reguler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Armada;
use App\Models\HumanResource\Employee;
use App\Models\Transaction\ScheduleReguler;
use Illuminate\Support\Facades\DB;

class ScheduleRegulerController extends Controller
{
    public function index()
    {
        $armadas =  Armada::where('armada_category', 'REGULER')->orderBy('id', 'ASC')->get();
        $drivers =   Employee::where('id_department', 5)->orderBy('id', 'ASC')->get();
        $conductors =  Employee::where('id_department', 6)->orderBy('id', 'ASC')->get();
        return view('admin.transaction.reguler.schedule.index', ["armadas" => $armadas, "drivers" => $drivers, "conductors" => $conductors]);
    }

    public function create()
    {
        $data = DB::select("SELECT sr.`id`, sr.`date_departure`, sr.`destination`, sr.`type_bus`,
        concat(a.armada_merk,' - ',a.armada_no_police) as armada,
        (SELECT e.employee_name FROM `employees` e WHERE e.id = sr.`driver_1`) AS driver_1,
        (SELECT e.employee_name FROM `employees` e WHERE e.id = sr.`driver_2`) AS driver_2,
        (SELECT e.employee_name FROM `employees` e WHERE e.id = sr.`conductor`) AS conductor
        FROM `schedule_regulers` sr
        INNER JOIN `armadas` a ON sr.`id_armada` = a.`id` ORDER BY type_bus, date_departure");
        return view('admin.transaction.reguler.schedule.display', ["data" => $data]);
    }

    public function store(Request $request)
    {

        for ($count_1 = 0; $count_1 < count($request->date_departure); $count_1++) {
            $date_value = $request->date_departure[$count_1];
            $arr_date = explode("-", $date_value);
            $date_departure = $arr_date[2] . '-' . $arr_date[1] . '-' . $arr_date[0];
            DB::table('schedule_regulers')->insert(
                [
                    'date_departure' => $date_departure,
                    'id_armada' => $request->id_armada[$count_1],
                    'driver_1' => $request->driver_1[$count_1],
                    'driver_2' => $request->driver_2[$count_1],
                    'conductor' => $request->conductor[$count_1],
                    'destination' => 'JOG-DPS',
                    'type_bus' => $request->type_bus[$count_1]
                ]
            );
        }

        for ($count_2 = 0; $count_2 < count($request->date_departure); $count_2++) {
            $date_value = $request->date_arrival[$count_2];
            $arr_date = explode("-", $date_value);
            $date_arrival = $arr_date[2] . '-' . $arr_date[1] . '-' . $arr_date[0];
            DB::table('schedule_regulers')->insert(
                [
                    'date_departure' => $date_arrival,
                    'id_armada' => $request->id_armada[$count_2],
                    'driver_1' => $request->driver_1[$count_2],
                    'driver_2' => $request->driver_2[$count_2],
                    'conductor' => $request->conductor[$count_2],
                    'destination' => 'DPS-JOG',
                    'type_bus' => $request->type_bus[$count_2]
                ]
            );
        }

        return response()->json([
            'data' => $request->all(),
            'message' => 'Berhasil menambahkan data Jadwal Bus',
            'status' => $request->all() ? 200 : 400,
        ]);
    }

    public function show($month)
    {
        $year = date('Y');
        $data = DB::select("SELECT sr.`id`, sr.`date_departure`, sr.`destination`, sr.`type_bus`,
        concat(a.armada_merk,' - ',a.armada_no_police) as armada,
        (SELECT e.employee_name FROM `employees` e WHERE e.id = sr.`driver_1`) AS driver_1,
        (SELECT e.employee_name FROM `employees` e WHERE e.id = sr.`driver_2`) AS driver_2,
        (SELECT e.employee_name FROM `employees` e WHERE e.id = sr.`conductor`) AS conductor
        FROM `schedule_regulers` sr
        INNER JOIN `armadas` a ON sr.`id_armada` = a.`id` WHERE MONTH (sr.`date_departure`) = $month AND YEAR (sr.`date_departure`) = $year ORDER BY type_bus, date_departure");
        // echo json_encode($data);
        return view('admin.transaction.reguler.schedule.display', ["data" => $data]);
    }

    public function edit($id)
    {
        $data = ScheduleReguler::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ScheduleReguler::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->date_departure,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function destroy($id)
    {
        //
    }

    public function getDataArmada()
    {
        $data = Armada::where('armada_category', 'REGULER')->orderBy('id', 'ASC')->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil memperoleh data armada',
            'status' => 200,
        ]);
    }
    public function getDataDriver()
    {
        $data = Employee::where('id_department', 5)->orderBy('id', 'ASC')->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil memperoleh data sopir',
            'status' => 200,
        ]);
    }
    public function getDataConductor()
    {
        $data = Employee::where('id_department', 6)->orderBy('id', 'ASC')->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil memperoleh data kondektur',
            'status' => 200,
        ]);
    }

    public function checkScheduleReguler(Request $request)
    {
        $type_bus = $request->typeBus;
        $master_schedule = DB::table('schedules')
            ->where(
                'schedule_bus',
                $type_bus
            )->get();

        $departure_jog_dps = [];
        foreach ($master_schedule as $jog_dps) {
            if ($jog_dps->schedule_destination == 'JOG-DPS') {
                array_push($departure_jog_dps, $jog_dps->schedule_day);
            }
        }
        $departure_dps_jog = [];
        foreach ($master_schedule as $dps_jog) {
            if ($dps_jog->schedule_destination == 'DPS-JOG') {
                array_push($departure_dps_jog, $dps_jog->schedule_day);
            }
        }

        $start_date = $request->startDate;
        $end_date = $request->endDate;
        $count_day = $request->countDay;

        $AVAILJOGDPS = [];

        $RESAVAILJOGDPS = DB::select("SELECT DATE_FORMAT(date_departure,'%d-%m-%Y') JOGDPSAVAILDATE FROM schedule_regulers WHERE destination = 'JOG-DPS' AND type_bus = '$type_bus' AND DATE_FORMAT(date_departure,'%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'");

        foreach ($RESAVAILJOGDPS as $VALUE) {
            array_push($AVAILJOGDPS, $VALUE->JOGDPSAVAILDATE);
        }

        $AVAILDPSJOG = [];

        $RESAVAILDPSJOG = DB::select("SELECT DATE_FORMAT(date_departure,'%d-%m-%Y') DPSJOGAVAILDATE FROM schedule_regulers WHERE DESTINATION = 'JOG-DPS' AND DATE_FORMAT(date_departure,'%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'");

        foreach ($RESAVAILDPSJOG as $VALUE) {
            array_push($AVAILDPSJOG, $VALUE->DPSJOGAVAILDATE);
        }
        $jogja_denpasar = [];
        $denpasar_jogja = [];
        for ($i = 1; $i <= $count_day; $i++) {
            $incr = $i - 1;
            $timestamp = strtotime($start_date . '+' . $incr . 'day');
            $day = date('D', $timestamp);
            if (in_array($day, $departure_jog_dps)) {
                $date = date('d-m-Y', $timestamp);
                $validator = array_search($date, $AVAILJOGDPS, true);
                if (!$validator && !is_numeric($validator)) {
                    array_push($jogja_denpasar, $date);
                }
            }
            if (in_array($day, $departure_dps_jog)) {
                $date = date('d-m-Y', $timestamp);
                $validator = array_search($date, $AVAILDPSJOG, true);
                if (!$validator && !is_numeric($validator)) {
                    array_push($denpasar_jogja, $date);
                }
            }
        }

        $data = [
            'JOG_DPS' => $jogja_denpasar,
            'DPS_JOG' => $denpasar_jogja
        ];
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil memperoleh data armada',
            'status' => 200,
        ]);
    }
}
