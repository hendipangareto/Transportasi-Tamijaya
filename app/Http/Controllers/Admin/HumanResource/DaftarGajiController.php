<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\GajiEmployee;
use App\Models\HumanResource\KeluargaEmployee;
use App\Models\MasterData\Department;
use App\Models\MasterData\Position;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DaftarGajiController extends Controller
{

    public function listData()
    {
        $departemen = Department::get();
        $position = Position::get();
        $employee = Employee::get();
        $keluargaEmployee = KeluargaEmployee::get();

        $departemen_id = "";
        if (isset($request->filter_departemen_id)) {
            $departemen_id = $request->filter_departemen_id;
        }

        $position_id = ""; // Ubah variabel $jabatan_id menjadi $position_id
        if (isset($request->filter_jabatan_id)) {
            $position_id = $request->filter_jabatan_id;
        }

        $employee_status = "";
        if (isset($request->filter_employee_status)) {
            $employee_status = $request->filter_employee_status;
        }

        $data = DB::table('gaji_employees')
            ->select('gaji_employees.*', 'departments.department_name', 'positions.position_name', 'employees.employee_name')
            ->join('departments', 'gaji_employees.departemen_id', 'departments.id')
            ->join('positions', 'gaji_employees.position_id', 'positions.id')
            ->join('employees', 'gaji_employees.employee_id', 'employees.id')
            ->when(!empty($departemen_id), function ($query) use ($departemen_id) {
                $query->where('gaji_employees.departemen_id', $departemen_id);
            })
            ->when(!empty($position_id), function ($query) use ($position_id) {
                $query->where('gaji_employees.position_id', $position_id);
            })
            ->when(!empty($employee_status), function ($query) use ($employee_status) {
                $query->where('gaji_employees.employee_status', $employee_status);
            })
            ->get();

        $params = array(
            'departemen_id' => $departemen_id,
            'position_id' => $position_id,
            'employee_status' => $employee_status,
        );

        return view('admin.human-resource.pegawai.daftar-gaji', [
            'data' => $data,
            'departemen' => $departemen,
            'position' => $position,
            'employee' => $employee,
            'params' => $params,
            'keluargaEmployee' => $keluargaEmployee
        ]);

    }

    public function getEmployee(Request $request)
    {
        $employeeId = $request->input('employee_id');

        $employee = DB::table('employees')
            ->select('departments.department_name', 'positions.position_name', 'employees.employee_name', 'employees.employee_id as kode_employee', 'employees.employee_status')
            ->join('departments', 'employees.departemen_id', 'departments.id')
            ->join('positions', 'employees.position_id', 'positions.id')
            ->where('employees.id', '=', $employeeId)->first();


        return response()->json($employee);
    }


    public function formSimpan(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = new GajiEmployee();

            $employee = Employee::find($request->employee_id);
            $data->employee_id = $request->employee_id;
            $data->employee_status = $request->employee_status;
            $data->departemen_id = $employee->departemen_id;
            $data->position_id = $employee->position_id;
            $data->g_pokok = $request->g_pokok;
            $data->t_masa_kerja = $request->t_masa_kerja;
            $data->t_transport = $request->t_transport;
            $data->t_kapasitas = $request->t_kapasitas;
            $data->t_akademik = $request->t_akademik;
            $data->t_struktur = $request->t_struktur;
            $data->bpjs_kesehatan = $request->bpjs_kesehatan;
            $data->bpjs_ketenagakerjaan = $request->bpjs_ketenagakerjaan;
            $data->tanggal = $request->tanggal_gaji;
            $data->keterangan = $request->keterangan;

//                dd($data);

            $data->save();


            DB::commit();
            Session::flash('message', ['Berhasil menyimpan daftar gaji karyawan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan daftar gaji karyawan', 'error']);
        }

        return redirect()->route('human-resource-pegawai-list-data');

    }
}
