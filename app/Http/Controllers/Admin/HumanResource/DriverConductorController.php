<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HumanResource\Employee;
use Illuminate\Support\Facades\DB;

class DriverConductorController extends Controller
{
    public function index()
    {
        return view('admin.human-resource.driver-conductor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function show($type)
    {

        if ($type == 'driver') {
            $data = DB::table('employees')->join('departments', 'departments.id', 'employees.id_department')
                ->join('positions', 'positions.id', 'employees.id_position')
                ->where('employees.id_position', 16)
                ->select('employees.*', 'positions.position_name', 'departments.department_name')->get();
        } else {
            $data = DB::table('employees')->join('departments', 'departments.id', 'employees.id_department')
                ->join('positions', 'positions.id', 'employees.id_position')
                ->whereIn('employees.id_position', [17, 18])
                ->select('employees.*', 'positions.position_name', 'departments.department_name')->get();
        }

        return view('admin.human-resource.master-employee.display', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
