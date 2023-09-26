<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Absensi;
use App\Models\HumanResource\Employee;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class DataAbsensiController extends Controller
{
    public function getDataAbsensi()
    {
        $employee = Employee::get();

        $absensi_month = "";
        if (isset($request->param_month)) {
            $absensi_month = $request->param_month;
        }

        $employee_name = "";
        if (isset($request->employee_name)) {
            $employee_name = $request->employee_name;
        }

        $absensi = DB::table('absensis')
            ->select(
                'absensis.*',
                'employees.employee_name',
                'employees.employee_id',
                'employees.employee_status',
                'employees.id_fingerprint',
                'employees.departemen_id',
                'employees.position_id',
                'departments.department_name',
                'positions.position_name')
            ->join('employees', 'absensis.id', 'employees.id')
            ->leftJoin('departments', 'employees.departemen_id', 'departments.id')
            ->leftJoin('positions', 'employees.position_id', 'positions.id')
            ->when(!empty($employee_name), function ($query) use ($employee_name) {
                $query->where('absensis.id', $employee_name);
            })
            ->when(!empty($absensi_month), function ($query) use ($absensi_month) {
                $query->whereMonth('tanggal', $absensi_month);
            })
            ->get();


        $params = array(
            'param_month' => $absensi_month,
            'employee_name' => $employee_name,
        );

//        dd($absensi);

        return view('admin.human-resource.pegawai.data-absensi.list-absensi', compact('absensi','params'));
    }

    public function UploadAbsensi(Request $request)
    {
        $file = $request->file('form_upload_presensi');

        $array = Excel::toArray(new AbsensiImport, $file);
        $output = $array[0];

        $absensiToInsert = [];

        foreach ($output as $key => $val) {
            if ($key > 1) {
                $tanggalAbsen = $val[6];
                $tanggal = substr($tanggalAbsen, 0, 2);
                $bulan = substr($tanggalAbsen, 3, 2);
                $tahun = substr($tanggalAbsen, 6, 4);

                // Buat kunci unik berdasarkan fingerprint_id dan tanggal
                $uniqueKey = $val[1] . '-' . $tahun . '-' . $bulan . '-' . $tanggal;

                // Periksa apakah data sudah ada di database
                $existingData = Absensi::where('fingerprint_id', $val[1])
                    ->where('tanggal', $tahun . '-' . $bulan . '-' . $tanggal)
                    ->first();

                if (!$existingData) {
                    // Jika data belum ada, tambahkan ke array untuk diinsert
                    $absensiToInsert[] = [
                        'fingerprint_id' => $val[1],
                        'tanggal' => $tahun . '-' . $bulan . '-' . $tanggal,
                        'scan_satu' => $val[7],
                        'scan_dua' => $val[8],
                        'scan_tiga' => $val[9],
                        'scan_empat' => $val[10],
                        'status_absensi' => $val[11]
                    ];
                }
            }
        }
        if (!empty($absensiToInsert)) {
            Absensi::insert($absensiToInsert);
            Session::flash('message', ['Berhasil upload data absensi', 'success']);
        } else {
            Session::flash('message', ['Data sudah ada, silahkan upload data lain', 'error']);
        }

    }
}
