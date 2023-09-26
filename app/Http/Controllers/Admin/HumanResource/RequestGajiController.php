<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Employee;
use App\Models\MasterData\Department;
use App\Models\MasterData\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestGajiController extends Controller
{
    public function getRequestGaji()
    {
        $departemen = Department::get();
        $position = Position::get();
        $employee = Employee::get();

        $requestGaji = DB::table('request_gaji_employees')
            ->select('request_gaji_employees.*', 'gaji_employees.*', 'departments.department_name', 'positions.position_name', 'employees.*')
            ->join('gaji_employees', 'request_gaji_employees.gaji_employee_id', '=', 'gaji_employees.id')
            ->join('departments', 'request_gaji_employees.gaji_employee_id', 'departments.id')
            ->join('positions', 'request_gaji_employees.gaji_employee_id', 'positions.id')
            ->join('employees', 'request_gaji_employees.gaji_employee_id', 'employees.id')
            ->get();
        return view('admin.human-resource.pegawai.request-gaji.list-gaji', compact('departemen','position','employee'));
    }

    public function getFormTambah()
    {
        return view('admin.human-resource.pegawai.request-gaji.form-tambah');
    }



    public function getFormEdit(Request $request)
    {
        return view('admin.human-resource.pegawai.request-gaji.form-edit');
    }
}
