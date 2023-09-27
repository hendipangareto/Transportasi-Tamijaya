<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\GajiEmployee;
use App\Models\HumanResource\RequestGaji;
use App\Models\MasterData\Department;
use App\Models\MasterData\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $departemen = Department::get();
        $position = Position::get();
        $employee = Employee::get();
        return view('admin.human-resource.pegawai.request-gaji.form-tambah', compact('employee', 'position', 'departemen'));
    }


    public function SimpanRequest(Request $request)
    {
        DB::beginTransaction();
        try {

            $id_pegawai = $request->pegawai_name;

            $gajiEmployee = GajiEmployee::where('employee_id','=',$id_pegawai)->first();

            $gaji = $gajiEmployee->g_pokok +
                $gajiEmployee->t_masa_kerja +
                $gajiEmployee->t_transport +
                $gajiEmployee->t_kapasitas +
                $gajiEmployee->t_akademik +
                $gajiEmployee->t_struktur +
                $gajiEmployee->bpjs_kesehatan +
                $gajiEmployee->bpjs_ketenagakerjaan;


            $requestGaji = new RequestGaji();

            $requestGaji->gaji_employee_id = $id_pegawai;
            $requestGaji->tanggal = now();
            $requestGaji->nominal = $gaji;
            $requestGaji->cek_pegajuan = '0';
            $requestGaji->status_bayar = 'Berhasil';
            $requestGaji->cara_bayar = 'cash';

            $requestGaji->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan pengajuan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan pengajuan', 'error']);
        }
        return redirect()->route('human-resource.pegawai.request-gaji.list-gaji');
    }

    public function getEmployee(Request $request)
    {

        $employeeId = $request->input('employee_id');

//        $employee = GajiEmployee::where('employee_id','=',$employeeId)->first();

        $employee = DB::table('gaji_employees')
            ->select('gaji_employees.*', 'departments.departemen_name', 'positions.position_name', 'employees.employee_name', 'employees.employee_id as kode_employee')
            ->join('departments', 'gaji_employees.departemen_id', 'departments.id')
            ->join('positions', 'gaji_employees.position_id', 'positions.id')
            ->join('employees', 'gaji_employees.employee_id', 'employees.id')
            ->where('gaji_employees.employee_id', '=', $employeeId)->first();


        return response()->json($employee);
    }
    public function getFormEdit(Request $request)
    {
        return view('admin.human-resource.pegawai.request-gaji.form-edit');
    }
}
