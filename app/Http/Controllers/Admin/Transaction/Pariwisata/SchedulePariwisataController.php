<?php

namespace App\Http\Controllers\Admin\Transaction\Pariwisata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HumanResource\Employee;
use App\Models\MasterData\Armada;
use App\Models\Transaction\SchedulePariwisata;

class SchedulePariwisataController extends Controller
{
    public function index()
    {
        $armadas =  Armada::where('armada_category', 'PARIWISATA')->orderBy('id', 'ASC')->get();
        $drivers =   Employee::where('id_department', 5)->orderBy('id', 'ASC')->get();
        $conductors =  Employee::where('id_department', 6)->orderBy('id', 'ASC')->get();
        return view('admin.transaction.pariwisata.schedule.index', ["drivers" => $drivers, "conductors" => $conductors, "armadas" => $armadas]);
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
