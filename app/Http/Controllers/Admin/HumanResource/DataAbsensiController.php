<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Absensi;
use App\Models\HumanResource\Employee;
use App\Imports\AbsensiImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

// Added Session facade
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

// Added Validator facade

use Carbon\Carbon;

class DataAbsensiController extends Controller
{
    public function getDataAbsensi(Request $request) // Added Request parameter
    {
        $employee = Employee::get();

//        $absensi_month = "";
//        if (isset($request->param_month)) {
//            $absensi_month = $request->param_month;
//        }
//
//        $employee_name = "";
//        if (isset($request->employee_name)) {
//            $employee_name = $request->employee_name;
//        }


        $absensi = DB::table('absensis')
            ->select('absensis.*',
                'employees.employee_name',
                'employees.employee_id',
                'employees.employee_status',
                'employees.id_fingerprint',
                'employees.departemen_id',
                'employees.position_id',
                'departments.department_name',
                'positions.position_name')
            ->join('employees', 'absensis.id_fingerprint', 'employees.id')
            ->leftJoin('departments', 'employees.departemen_id', 'departments.id')
            ->leftJoin('positions', 'employees.position_id', 'positions.id')
            ->get();


//            ->when(!empty($employee_name), function ($query) use ($employee_name) {
//                $query->where('absensis.id', $employee_name);
//            })
//            ->when(!empty($absensi_month), function ($query) use ($absensi_month) {
//                $query->whereMonth('tanggal', $absensi_month);
//            })



//        $params = array(
//            'param_month' => $absensi_month,
//            'employee_name' => $employee_name,
//        );

        dd($absensi);
        return view('admin.human-resource.pegawai.data-absensi.list-absensi', ['absensi' => $absensi, 'employee' => $employee]);
    }


    public function uploadAbsensi(Request $request)
    {
        $file = $request->file('form_upload_presensi');

        $array = Excel::toArray(new AbsensiImport, $file);
        $output = $array[0];

        $absensi = [];

        foreach ($output as $key => $val) {
            if ($key > 1) {
                $tanggalAbsen = $val[6];
                $tanggal = substr($tanggalAbsen, 0, 2);
                $bulan = substr($tanggalAbsen, 3, 2);
                $tahun = substr($tanggalAbsen, 6, 4);

                // Format time values (scan_satu, scan_dua, scan_tiga, scan_empat)
                $scanSatu = date('H:i:s', strtotime($val[7]));
                $scanDua = date('H:i:s', strtotime($val[8]));
                $scanTiga = date('H:i:s', strtotime($val[9]));
                $scanEmpat = date('H:i:s', strtotime($val[10]));

                $absensi[] = [
                    'id_fingerprint' => $val[1],
                    'tanggal' => $tahun . '-' . $bulan . '-' . $tanggal,
                    'scan_satu' => $scanSatu,
                    'scan_dua' => $scanDua,
                    'scan_tiga' => $scanTiga,
                    'scan_empat' => $scanEmpat,
                    'status_absensi' => $val[11]
                ];
            }
        }

        if (!empty($absensi)) {
            Absensi::insert($absensi);
            Session::flash('message', ['Berhasil upload data absensi', 'success']);
        } else {
            Session::flash('message', ['Data sudah ada, silahkan upload data lain', 'error']);
        }

        return redirect(route('human-resource.pegawai.kinerja-karyawan.list-data-absensi'));
    }


}
