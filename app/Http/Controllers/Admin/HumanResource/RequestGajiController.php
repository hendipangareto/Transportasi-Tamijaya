<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\GajiEmployee;
use App\Models\HumanResource\RequestGaji;
use App\Models\HumanResource\RequestKasbon;
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
        return view('admin.human-resource.pegawai.request-gaji.list-gaji', compact('departemen', 'position', 'employee', 'requestGaji'));
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

            $employeeId = $request->employee_id;
            $gajiEmployee = GajiEmployee::where('employee_id', '=', $employeeId)->first();


            $gaji = $gajiEmployee->g_pokok +
                $gajiEmployee->t_masa_kerja +
                $gajiEmployee->t_transport +
                $gajiEmployee->t_kapasitas +
                $gajiEmployee->t_akademik +
                $gajiEmployee->t_struktur +
                $gajiEmployee->bpjs_kesehatan +
                $gajiEmployee->bpjs_ketenagakerjaan;

            // Simpan data pengajuan gaji
            $requestGaji = new RequestGaji();

            $requestGaji->gaji_employee_id = $employeeId;
//            $requestGaji->gaji_employee_id = $request->employee_id;
            $requestGaji->tanggal = now();
            $requestGaji->nominal = $gaji;
            $requestGaji->cek_pegajuan = '0';
            $requestGaji->status_bayar = 'Berhasil';
            $requestGaji->cara_bayar = 'cash';

//            dd($requestGaji);
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

        $employee = DB::table('gaji_employees')
            ->select('gaji_employees.*', 'departments.department_name', 'positions.position_name', 'employees.employee_name', 'employees.employee_id as kode_employee')
            ->join('departments', 'gaji_employees.departemen_id', 'departments.id')
            ->join('positions', 'gaji_employees.position_id', 'positions.id')
            ->join('employees', 'gaji_employees.employee_id', 'employees.id')
            ->where('gaji_employees.employee_id', '=', $employeeId)->first();


        return response()->json($employee);
    }


    public function RequestKasbon(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = new RequestKasbon();

            $employee = Employee::find($request->employee_id);

            if ($employee) {
                // Employee ditemukan, maka akses properti departemen_id dan position_id
                $data->employee_id = $request->employee_id;
                $data->kode_employee = $request->kode_employee;
                $data->departemen_id = $employee->departemen_id;
                $data->position_id = $employee->position_id;
                $data->employee_status = $request->employee_status;
                $data->tanggal = $request->tanggal;
                $data->nominal = str_replace('.', '', $request->nominal);
                $data->keterangan_kasbon = $request->keterangan_kasbon;

//                dd($data);
                $data->save();

                DB::commit();
                Session::flash('message', ['Berhasil menyimpan daftar kasbon karyawan', 'success']);
            } else {

                Session::flash('message', ['Gagal menyimpan daftar kasbon karyawan. Employee tidak ditemukan.', 'error']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan daftar kasbon karyawan', 'error']);
        }

        return redirect()->route('human-resource.pegawai.request-gaji.list-gaji');
    }

    public function getFormEdit(Request $request)
    {
        return view('admin.human-resource.pegawai.request-gaji.form-edit');
    }
}
