<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\KeluargaEmployee;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\HumanResource\Employee;
use App\Models\MasterData\Position;
use App\Models\MasterData\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Session;
class EmployeeController extends Controller
{

    public function listData(Request $request)
    {
        $departemen = Department::get();
        $position = Position::get();
        $keluargaEmployees = KeluargaEmployee::get();

        $departemen_id = "";
        if (isset($request->departemen_id)) {
            $departemen_id = $request->departemen_id;
        }

        $position_id = "";
        if (isset($request->postionfilter)) {
            $position_id = $request->postionfilter;
        }
        $employee_status = "";
        if (isset($request->employee_status)) {
            $employee_status = $request->employee_status;
        }

        $start = $request->filled('start_date') ? Carbon::parse($request->input('start_date')) : null;
        $end = $request->filled('end_date') ? Carbon::parse($request->input('end_date')) : null;

        if (isset($request->start_date) && isset($request->end_date)) {
            $start = $request->start_date;
            $end = $request->end_date;
        }

        $employee = DB::table('employees')
            ->select('employees.*', 'departments.department_name', 'positions.position_name')
            ->join('departments', 'employees.departemen_id', 'departments.id')
            ->join('positions', 'employees.position_id', 'positions.id')
            ->when(!empty($departemen_id), function ($query) use ($departemen_id) {
                $query->where('employees.departemen_id', $departemen_id);
            })
            ->when(!empty($position_id), function ($query) use ($position_id) {
                $query->where('employees.position_id', $position_id);
            })
            ->when(!empty($employee_status), function ($query) use ($employee_status) {
                $query->where('employees.employee_status', $employee_status);
            })
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereDate('employees.awal_kontrak', '<=', $end)
                    ->whereDate('employees.selesai_kontak', '>=', $start);
            })
            ->get();

        $params = array(
            'departemen_id' => $departemen_id,
            'position_id' => $position_id,
            'employee_status' => $employee_status,
        );

        return view('admin.human-resource.master-employee.index', [
            'params' => $params,
            'departemen' => $departemen,
            'employee' => $employee,
            'position' => $position,
            'keluargaEmployees ' => $keluargaEmployees
        ]);

    }

    public function formAdd()
    {
        $departemen = Department::get();
        $jabatan = Position::get();
        $keluargaEmployees = KeluargaEmployee::get();
        $employee = Employee::get();

        return view('admin.human-resource.master-employee.form-tambah', compact('departemen', 'jabatan', 'employee', 'keluargaEmployees'));
    }

    public function storeData(Request $request)
    {

        if (!isset($request->keluarga['namaAnggotaKeluarga'])) {
            Session::flash('message', ['Data keluarga tidak boleh kosong', 'error']);
            return redirect()->route('human-resource-master-employee-form-add');
        }

        DB::beginTransaction();
        try {


            $employee = new Employee();

            $lastNomor = Employee::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->employee_id, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noEmployee = '2023-EM-' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $employee->employee_id = $noEmployee;
            $employee->employee_name = $request->namaPegawai;
            $employee->departemen_id = $request->idDepartemen;
            $employee->position_id = $request->jabatanPegawai;
            $employee->employee_status = $request->statusPegawai;
            $employee->awal_kontrak = $request->awalKontrakPegawai;
            $employee->selesai_kontrak = $request->selesaiKontrakPegawai;
            $employee->jenis_kelamin = $request->jkPegawai;
            $employee->tanggal_lahir = $request->tglLahirPegawai;
            $employee->status_perkawinan = $request->statusPernikahan;
            $employee->alamat = $request->alamatKtpPegawai;
            $employee->alamat_domisili = $request->alamatDomisiliPegawai;
            $employee->nik = $request->nikPegawai;
            $employee->npwp = $request->npwpPegawai;
            $employee->bpjs_kesehatan = $request->bpjsKesehatanPegawai;
            $employee->bpjs_ketenagakerjaan = $request->bpjsKetenagakerjaanPegawai;
            $employee->telepon = $request->noTeleponPegawai;
            $employee->email = $request->emailPegawai;
            $employee->rekening_name = $request->namaRekening;
            $employee->no_rekening = $request->noRekPegawai;

//            dd($employee);
            $employee->save();

            $idEmployee = $employee->id;

            $datanamaAnggotaKeluarga = $request->keluarga['namaAnggotaKeluarga'];
            $datajkAnggotaKeluarga = $request->keluarga['jkAnggotaKeluarga'];
            $datatglLahirAnggotaKeluarga = $request->keluarga['tglLahirAnggotaKeluarga'];
            $datastatusAnggotaKeluarga = $request->keluarga['statusAnggotaKeluarga'];
            $dataalamatKTPAnggotaKeluarga = $request->keluarga['alamatKTPAnggotaKeluarga'];
            $dataalamatDomisiliAnggotaKeluarga = $request->keluarga['alamatDomisiliAnggotaKeluarga'];
            $datanikAnggotaKeluarga = $request->keluarga['nikAnggotaKeluarga'];
            $datanpwpAnggotaKeluarga = $request->keluarga['npwpAnggotaKeluarga'];
            $databpjsKesehatanAnggotaKeluarga = $request->keluarga['bpjsKesehatanAnggotaKeluarga'];
            $datanoTeleponAnggotaKeluarga = $request->keluarga['noTeleponAnggotaKeluarga'];
            $dataemailAnggotaKeluarga = $request->keluarga['emailAnggotaKeluarga'];
            $datakontakDaruratAnggotaKeluarga = $request->keluarga['kontakDaruratAnggotaKeluarga'];


            for ($i = 0; $i < count($datanamaAnggotaKeluarga); $i++) {

                $namaAnggotaKeluarga = $datanamaAnggotaKeluarga[$i];
                $jkAnggotaKeluarga = $datajkAnggotaKeluarga[$i];
                $tglLahirAnggotaKeluarga = $datatglLahirAnggotaKeluarga[$i];
                $statusAnggotaKeluarga = $datastatusAnggotaKeluarga[$i];
                $alamatKTPAnggotaKeluarga = $dataalamatKTPAnggotaKeluarga[$i];
                $alamatDomisiliAnggotaKeluarga = $dataalamatDomisiliAnggotaKeluarga[$i];
                $nikAnggotaKeluarga = $datanikAnggotaKeluarga[$i];
                $npwpAnggotaKeluarga = $datanpwpAnggotaKeluarga[$i];
                $bpjsKesehatanAnggotaKeluarga = $databpjsKesehatanAnggotaKeluarga[$i];
                $noTeleponAnggotaKeluarga = $datanoTeleponAnggotaKeluarga[$i];
                $emailAnggotaKeluarga = $dataemailAnggotaKeluarga[$i];
                $kontakDaruratAnggotaKeluarga = $datakontakDaruratAnggotaKeluarga[$i];

                $keluargaEmployee = new KeluargaEmployee();
                $keluargaEmployee->nama_keluarga = $namaAnggotaKeluarga;
                $keluargaEmployee->jenis_kelamin = $jkAnggotaKeluarga;
                $keluargaEmployee->tanggal_lahir = $tglLahirAnggotaKeluarga;
                $keluargaEmployee->status_keluarga = $statusAnggotaKeluarga;
                $keluargaEmployee->alamat_ktp = $alamatKTPAnggotaKeluarga;
                $keluargaEmployee->alamat_domisili = $alamatDomisiliAnggotaKeluarga;
                $keluargaEmployee->nik = $nikAnggotaKeluarga;
                $keluargaEmployee->npwp = $npwpAnggotaKeluarga;
                $keluargaEmployee->bpjs_kesehatan = $bpjsKesehatanAnggotaKeluarga;
                $keluargaEmployee->telepon = $noTeleponAnggotaKeluarga;
                $keluargaEmployee->email = $emailAnggotaKeluarga;
                $keluargaEmployee->kontak_darurat = $kontakDaruratAnggotaKeluarga;
                $keluargaEmployee->employee_id = $idEmployee;

                $keluargaEmployee->save();
            }

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data karyawan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data karyawan', 'error']);
        }

        return redirect()->route('human-resource-master-employee-list-data');
    }

    public function formDetail(Request $request, $id)
    {
        $employee = Employee::select('employees.*', 'departments.department_name', 'positions.position_name')
            ->join('departments', 'employees.departemen_id', '=', 'departments.id')
            ->join('positions', 'employees.position_id', '=', 'positions.id')
            ->where('employees.id', $id)
            ->first();
        $keluargaEmployee = KeluargaEmployee::where('employee_id', '=', $employee->id)->get();

        if (!$employee) {
            return redirect()->route('employee.index')->with('error', 'Employee not found');
        }

        $departemen = Department::get();
        $position = Position::get();

        return view('admin.human-resource.master-employee.form-detail', [
            'keluargaEmployee' => $keluargaEmployee,
            'departemen' => $departemen,
            'jabatan' => $position,
            'employee' => $employee
        ]);
    }

}
