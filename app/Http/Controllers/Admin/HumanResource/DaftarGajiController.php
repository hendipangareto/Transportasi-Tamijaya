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

use Barryvdh\DomPDF\Facade as PDF;
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

        $position_id = "";
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

            if ($employee) {
                // Employee ditemukan, maka akses properti departemen_id dan position_id
                $data->employee_id = $request->employee_id;
                $data->employee_status = $request->employee_status;
                $data->departemen_id = $employee->departemen_id;
                $data->position_id = $employee->position_id;

                // Ubah format nilai Rupiah yang dimasukkan oleh pengguna
                $data->g_pokok = str_replace('.', '', $request->g_pokok);
                $data->t_masa_kerja = str_replace('.', '', $request->t_masa_kerja);
                $data->t_transport = str_replace('.', '', $request->t_transport);
                $data->t_kapasitas = str_replace('.', '', $request->t_kapasitas);
                $data->t_akademik = str_replace('.', '', $request->t_akademik);
                $data->t_struktur = str_replace('.', '', $request->t_struktur);
                $data->bpjs_kesehatan = str_replace('.', '', $request->bpjs_kesehatan);
                $data->bpjs_ketenagakerjaan = str_replace('.', '', $request->bpjs_ketenagakerjaan);
                $data->tanggal = $request->tanggal_gaji;
                $data->keterangan = $request->keterangan;

//                dd($data);
                $data->save();

                DB::commit();
                Session::flash('message', ['Berhasil menyimpan daftar gaji karyawan', 'success']);
            } else {
                // Employee tidak ditemukan, lakukan penanganan kesalahan di sini
                Session::flash('message', ['Gagal menyimpan daftar gaji karyawan. Employee tidak ditemukan.', 'error']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan daftar gaji karyawan', 'error']);
        }

        return redirect()->route('data-gaji-pegawai.human-resource-pegawai-list-data');
    }


    public function formUpdate(Request $request,$id)
    {
        DB::beginTransaction();
        try {

            $data = GajiEmployee::find($id);

            $employee = Employee::find($request->employee_id);
            $data->employee_id = $request->edit_employee_id;
            $data->employee_status = $request->edit_employee_status;
            $data->departemen_id = $employee->edit_departemen_id;
            $data->position_id = $employee->edit_position_id;
            $data->g_pokok = $request->edit_g_pokok;
            $data->t_masa_kerja = $request->edit_t_masa_kerja;
            $data->t_transport = $request->edit_t_transport;
            $data->t_kapasitas = $request->edit_t_kapasitas;
            $data->t_akademik = $request->edit_t_akademik;
            $data->t_struktur = $request->edit_t_struktur;
            $data->bpjs_kesehatan = $request->edit_bpjs_kesehatan;
            $data->bpjs_ketenagakerjaan = $request->edit_bpjs_ketenagakerjaan;
            $data->tanggal = $request->edit_tanggal;
            $data->keterangan = $request->edit_keterangan;

//            dd($data);

            $data->save();


            DB::commit();
            Session::flash('message', ['Berhasil menyimpan daftar gaji karyawan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan daftar gaji karyawan', 'error']);
        }

        return redirect()->route('data-gaji-pegawai.human-resource-pegawai-list-data');
    }

    public function formDelete($id)
    {
        DB::beginTransaction();
        try {

            $data = GajiEmployee::find($id);

            $data->delete();


            DB::commit();
            Session::flash('message', ['Berhasil menyimpan daftar gaji karyawan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan daftar gaji karyawan', 'error']);
        }

        return redirect()->route('data-gaji-pegawai.human-resource-pegawai-list-data');
    }

    public function cetakPDF()
    {


//        $data = DB::table('gaji_employees')
//            ->select('gaji_employees.*', 'departments.department_name', 'positions.position_name', 'employees.employee_name')
//            ->join('departments', 'gaji_employees.departemen_id', 'departments.id')
//            ->join('positions', 'gaji_employees.position_id', 'positions.id')
//            ->join('employees', 'gaji_employees.employee_id', 'employees.id')->get();

        $filename = 'SubBagian' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.master-logistik.sub-bagian.cetak-pdf' );

        $pdf->setPaper('A4', 'portrait');

        // Set Page Number
        $canvas = $pdf->getDomPDF()->getCanvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);


        $canvas->page_text(550 / 2, 820, now()->format('d-m-Y'), null, 8);
        $canvas->page_text(550 / 16, 820,  'PT Anugerah Karya Utami Gemilang', null, 8);
        return $pdf->stream($filename);
    }
}
