<?php

namespace App\Http\Controllers\Admin\Transaction\Pariwisata;

use App\Http\Controllers\Controller;
use App\Models\MasterData\DestinationWisata;
use App\Models\MasterData\PickPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HumanResource\Employee;
use App\Models\MasterData\Armada;
use App\Models\Transaction\SchedulePariwisata;

class SchedulePariwisataController extends Controller
{
    public function JadwalWisata()
    {
        $armadas =  Armada::where('armada_category', 'PARIWISATA')->orderBy('id', 'ASC')->get();
//        $drivers =   Employee::where('id_department', 5)->orderBy('id', 'ASC')->get();
        $conductors =  Employee::where('id_department', 6)->orderBy('id', 'ASC')->get();
//        $PickPoin =  PickPoint::where('pick_point_origin', 6)->orderBy('id', 'ASC')->get();
        $PickPoin =  PickPoint::get();
        $employees = Employee::get();

        $DestinasiWisata = DestinationWisata::get();

        $SchedulePariwisata = SchedulePariwisata::select(
            'schedule_pariwisatas.*',
            'booking_transactions.booking_transactions_code as booking_code',
            'armadas.armada_no_police as no_police',
            'pick_points.pick_point_name as pick_point_name',
            'destination_wisatas.destination_wisata_name as destination_name',
            'employees.employee_name as employee_name'
        )
            ->join('booking_transactions', 'booking_transactions.id', '=', 'schedule_pariwisatas.id_booking_transaction')
            ->join('armadas', 'armadas.id', '=', 'schedule_pariwisatas.id_armada')
            ->leftJoin('pick_points', 'pick_points.id', '=', 'schedule_pariwisatas.id_pick_point')
            ->leftJoin('destination_wisatas', 'destination_wisatas.id', '=', 'schedule_pariwisatas.id_destination_wisata')
            ->leftJoin('employees', 'employees.id', '=', 'schedule_pariwisatas.id_employee') // Join with employees table
            ->orderBy('armadas.id')
            ->get();




//        dd($SchedulePariwisata);
        return view('admin.transaction.pariwisata.schedule.index', compact('SchedulePariwisata',
            'armadas', 'conductors','PickPoin','DestinasiWisata', 'employees')
        );
    }

    public function TambahJadwalWisata(Request $request)
    {
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan Anda
        ]);

        // Simpan data jadwal pariwisata ke database
        SchedulePariwisata::create([
            'id_booking_transaction' => $request->input('id_booking_transaction'),
            'date_departure' => $request->input('date_departure'),
            'date_return' => $request->input('date_return'),
            'bus_type' => $request->input('bus_type'),
            'id_armada' => $request->input('id_armada'),
            'id_pick_point' => $request->input('id_pick_point'),
            'id_destination_wisata' => $request->input('id_destination_wisata'),
            'id_employee' => $request->input('id_employee'),
            'total_days' => $request->input('total_days'),
            'bus_price' => $request->input('bus_price'),
            'driver' => $request->input('driver'),
            'conductor' => $request->input('conductor'),
            'notes' => $request->input('notes'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('schedule_pariwisatas.index')->with('success', 'Jadwal pariwisata berhasil disimpan.');

    }


    public function create()
    {
        $data = DB::select("SELECT sp.id, sp.date_departure , sp.date_return , c.customer_name , ( SELECT p2.state_name FROM provinces p2 WHERE bt.booking_transactions_province_to = p2.id ) AS destination, a.armada_type , (SELECT e2.employee_name FROM employees e2 WHERE e2.id = sp.driver ) AS driver, (SELECT e2.employee_name FROM employees e2 WHERE e2.id = sp.conductor ) AS conductor, s.status_name FROM schedule_pariwisatas sp INNER JOIN armadas a ON a.id = sp.id_armada INNER JOIN booking_transactions bt ON bt.id = sp.id_booking_transaction INNER JOIN customers c ON c.id = bt.booking_transactions_customer_code INNER JOIN STATUS s ON s.id  = bt.booking_transactions_status");
        return view('admin.transaction.pariwisata.schedule.display', ["data" => $data]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
