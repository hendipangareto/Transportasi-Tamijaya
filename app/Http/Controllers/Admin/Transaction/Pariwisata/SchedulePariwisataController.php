<?php

namespace App\Http\Controllers\Admin\Transaction\Pariwisata;

use App\Http\Controllers\Controller;
use App\Models\MasterData\DestinationWisata;
use App\Models\MasterData\PickPoint;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HumanResource\Employee;
use App\Models\MasterData\Armada;
use App\Models\Transaction\SchedulePariwisata;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class SchedulePariwisataController extends Controller
{
    public function JadwalWisata()
    {
        // $armadas =  Armada::where('armada_category', 'PARIWISATA')->orderBy('id', 'ASC')->get();
        // $drivers =   Employee::where('id_department', 5)->orderBy('id', 'ASC')->get();
        // $conductors =  Employee::where('id_department', 6)->orderBy('id', 'ASC')->get();
        // $PickPoin =  PickPoint::where('pick_point_origin', 6)->orderBy('id', 'ASC')->get();
        $armadas = Armada::get();
        $PickPoin = PickPoint::get();
        $employees = Employee::get();
        $DestinasiWisata = DestinationWisata::get();


        $id_armada = "";
        if (isset($request->id_armada)) {
            $id_armada = $request->id_armada;
        }

        $id_pick_point = "";
        if (isset($request->pickpoinfilter)) {
            $id_pick_point = $request->pickpoinfilter;
        }
        $id_destination_wisata = "";
        if (isset($request->id_destination_wisata)) {
            $id_destination_wisata = $request->id_destination_wisata;
        }
        $id_employee = "";
        if (isset($request->id_employee)) {
            $id_employee = $request->id_employee;
        }


        $schedulePariwisatas = DB::table('schedule_pariwisatas')
            ->select('schedule_pariwisatas.*',
                'armadas.armada_no_police as no_police',
                'pick_points.pick_point_name as pick_point_name',
                'destination_wisatas.destination_wisata_name as destination_name',
                'employees.employee_name as employee_name'
            )
            ->join('armadas', 'schedule_pariwisatas.id_armada', '=', 'armadas.id')
            ->leftJoin('pick_points', 'schedule_pariwisatas.id_pick_point', '=', 'pick_points.id')
            ->leftJoin('destination_wisatas', 'schedule_pariwisatas.id_destination_wisata', '=', 'destination_wisatas.id')
            ->leftJoin('employees', 'schedule_pariwisatas.id_employee', '=', 'employees.id')
            ->orderBy('armadas.id')
            ->when(!empty($id_armada), function ($query) use ($id_armada) {
                $query->where('schedule_pariwisatas.departemen_id', $id_armada);
            })
            ->when(!empty($id_pick_point), function ($query) use ($id_pick_point) {
                $query->where('schedule_pariwisatas.id_pick_point', $id_pick_point);
            })
            ->when(!empty($id_destination_wisata), function ($query) use ($id_destination_wisata) {
                $query->where('schedule_pariwisatas.id_destination_wisata', $id_destination_wisata);
            })
            ->when(!empty($id_employee), function ($query) use ($id_employee) {
                $query->where('schedule_pariwisatas.id_employee', $id_employee);
            })
            ->get();

        $params = array(
            'id_armada' => $id_armada,
            'id_pick_point' => $id_pick_point,
            'id_destination_wisata' => $id_destination_wisata,
            'id_employee' => $id_employee,
        );

        return view('admin.transaction.pariwisata.schedule.index', compact('schedulePariwisatas',
                'PickPoin', 'DestinasiWisata', 'employees', 'armadas', 'params')
        );
    }


    public function TambahJadwalWisata(Request $request)
    {
        DB::beginTransaction();
        try {
            $existingSchedule = SchedulePariwisata::where('date_departure')
                ->where('id_armada', $request->id_armada)
                ->first();

            if ($existingSchedule) {
                return redirect()->back()->with('error', 'Armada dengan nomor polisi yang sama sudah memiliki jadwal pada tanggal tersebut');

            }
            function generateRandomString($length = 6)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            $SchedulePariwisata = new SchedulePariwisata();
            $lastNomor = SchedulePariwisata::orderBy('id', 'desc')->first();

            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_keberangkatan, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $randomString = generateRandomString(2);
            $noSchedulePariwisatan = 'KBR' . $randomString . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_tujuan, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $randomString = generateRandomString(2);
            $noSchedule = 'KTJ' . $randomString . str_pad($newNumber, 2, '0', STR_PAD_LEFT);


            $SchedulePariwisata->kode_keberangkatan = $noSchedulePariwisatan;
            $SchedulePariwisata->kode_tujuan = $noSchedule;
            $SchedulePariwisata->date_departure = $request->date_departure;
            $SchedulePariwisata->date_return = $request->date_return;
            $SchedulePariwisata->id_armada = $request->id_armada;
            $SchedulePariwisata->id_pick_point = $request->id_pick_point;
            $SchedulePariwisata->id_employee = $request->id_employee;
            $SchedulePariwisata->sopir_1 = $request->sopir_1;
            $SchedulePariwisata->sopir_2 = $request->sopir_2;
            $SchedulePariwisata->id_destination_wisata = $request->id_destination_wisata;
            $SchedulePariwisata->total_days = $request->total_days;
            $SchedulePariwisata->bus_price = $request->bus_price;
            $SchedulePariwisata->notes = $request->notes;

//            dd($SchedulePariwisata);
            $SchedulePariwisata->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data schedule pariwisata', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data schedule pariwisata', 'error']);
        }

        return redirect()->route('admin.transaction.pariwisata.schedule-pariwisata.data');
    }


    public function UpdateJadwalWisata(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $SchedulePariwisata = SchedulePariwisata::findOrFail($id);

            $SchedulePariwisata->date_departure = $request->date_departure;
            $SchedulePariwisata->date_return = $request->date_return;
            $SchedulePariwisata->id_armada = $request->id_armada;
            $SchedulePariwisata->id_pick_point = $request->id_pick_point;
            $SchedulePariwisata->id_employee = $request->id_employee;
//            $SchedulePariwisata->kernet = $request->kernet;
            $SchedulePariwisata->sopir_1 = $request->sopir_1;
            $SchedulePariwisata->sopir_2 = $request->sopir_2;
            $SchedulePariwisata->id_destination_wisata = $request->id_destination_wisata;
            $SchedulePariwisata->total_days = $request->total_days;
            $SchedulePariwisata->bus_price = $request->bus_price;
            $SchedulePariwisata->notes = $request->notes;

//            dd($SchedulePariwisata);
            $SchedulePariwisata->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data schedule pariwisata', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data schedule pariwisata', 'error']);
        }

        return redirect()->route('admin.transaction.pariwisata.schedule-pariwisata.data');
    }


    public function cetakPDF()
    {
        $armadas = request()->armada;
        $destination_wisata = request()->destination_wisata;
        $pick_point = request()->pick_point;
        $employee = request()->employee;

        $schedulePariwisatas = DB::table('schedule_pariwisatas')
            ->select('schedule_pariwisatas.*',
                'armadas.armada_no_police as no_police',
                'pick_points.pick_point_name as pick_point_name',
                'destination_wisatas.destination_wisata_name as destination_name',
                'employees.employee_name as employee_name'
            )
            ->join('armadas', 'schedule_pariwisatas.id_armada', '=', 'armadas.id')
            ->leftJoin('pick_points', 'schedule_pariwisatas.id_pick_point', '=', 'pick_points.id')
            ->leftJoin('destination_wisatas', 'schedule_pariwisatas.id_destination_wisata', '=', 'destination_wisatas.id')
            ->leftJoin('employees', 'schedule_pariwisatas.id_employee', '=', 'employees.id')
            ->orderBy('armadas.id')
            ->when(!empty($armadas), function ($query) use ($armadas) {
                $query->where('schedule_pariwisatas.departemen_id', $armadas);
            })
            ->when(!empty($pick_point), function ($query) use ($pick_point) {
                $query->where('schedule_pariwisatas.id_pick_point', $pick_point);
            })
            ->when(!empty($destination_wisata), function ($query) use ($destination_wisata) {
                $query->where('schedule_pariwisatas.id_destination_wisata', $destination_wisata);
            })
            ->when(!empty($employee), function ($query) use ($employee) {
                $query->where('schedule_pariwisatas.id_employee', $employee);
            })
            ->get();
        $filename = 'employee' . "_" . Carbon::create(now())->format('Y_m_d_H_i_s') . '.pdf';
        $pdf = PDF::loadView('admin.transaction.pariwisata.schedule.cetak-pdf', compact('schedulePariwisatas'));
        $pdf->setPaper('A4', 'portrait');

        #Set Page Number
        $canvas = $pdf->getDomPDF()->get_canvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);
        $canvas->page_text(550 / 2, 820, date('d-m-Y'), null, 8);
        return $pdf->stream($filename);
    }


    public function create()
    {
        $data = DB::select("SELECT sp.id, sp.date_departure , sp.date_return , c.customer_name , ( SELECT p2.state_name FROM provinces p2 WHERE bt.booking_transactions_province_to = p2.id ) AS destination, a.armada_type , (SELECT e2.employee_name FROM employees e2 WHERE e2.id = sp.driver ) AS driver, (SELECT e2.employee_name FROM employees e2 WHERE e2.id = sp.conductor ) AS conductor, s.status_name FROM schedule_pariwisatas sp INNER JOIN armadas a ON a.id = sp.id_armada INNER JOIN booking_transactions bt ON bt.id = sp.id_booking_transaction INNER JOIN customers c ON c.id = bt.booking_transactions_customer_code INNER JOIN STATUS s ON s.id  = bt.booking_transactions_status");
        return view('admin.transaction.pariwisata.schedule.display', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = collect(DB::select("SELECT sp.id , sp.date_departure , sp.date_return , sp.notes, bt.booking_transactions_total_seats, a.armada_type , sp.id_armada , sp.driver , sp.conductor, (SELECT p2.state_name FROM provinces p2 WHERE p2.id = bt.booking_transactions_province_to ) AS destination FROM schedule_pariwisatas sp INNER JOIN armadas a ON sp.id_armada = a.id INNER JOIN booking_transactions bt ON sp.id_booking_transaction = bt.id WHERE sp.id = $id"))->first();
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = SchedulePariwisata::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->date_departure,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
