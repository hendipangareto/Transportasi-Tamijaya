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

        $id_department = "";
        if (isset($request->id_department)) {
            $id_department = $request->id_department;
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
            ->join('departments', 'employees.id_department', 'departments.id')
            ->join('positions', 'employees.position_id', 'positions.id')
            ->when(!empty($departemen_id), function ($query) use ($id_department) {
                $query->where('employees.departemen_id', $id_department);
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
            'id_department' => $id_department,
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
            $employee->id_department = $request->idDepartemen;
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
            $employee->id_fingerprint = $request->id_fingerprint;

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
            ->join('departments', 'employees.id_department', '=', 'departments.id')
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

    public function formEdit(Request $request, $id)
    {
        $departemen = Department::get();
        $position = Position::get();
        $employee = Employee::find($id);
        $keluargaEmployees = KeluargaEmployee::where('employee_id', '=', $employee->id)->get();

        return view('admin.human-resource.master-employee.form-edit', [
            'departemen' => $departemen,
            'jabatan' => $position,
            'employee' => $employee,
            'keluargaEmployees' => $keluargaEmployees]);
    }

    public function formUpdate(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $employee = Employee::findOrFail($id);

            $employee->employee_name = $request->edit_nama_pegawai;
            $employee->departemen_id = $request->edit_departemen;
            $employee->position_id = $request->edit_jabatan;
            $employee->employee_status = $request->edit_status_pegawai_id;
            $employee->awal_kontrak = $request->edit_tgl_awal_kontrak;
            $employee->jenis_kelamin = $request->edit_jk_pegawai_id;
            $employee->tanggal_lahir = $request->edit_tgl_lahir_id;
            $employee->status_perkawinan = $request->edit_status_nikah;
            $employee->selesai_kontrak = $request->selesai_kontak_pegawai;
            $employee->alamat = $request->edit_alamat_pegawai;
            $employee->alamat_domisili = $request->edit_domisili_pegawai;
            $employee->nik = $request->edit_nik_pegawai;
            $employee->npwp = $request->edit_npwp_pegawai;
            $employee->bpjs_kesehatan = $request->edit_bpjs_kesehatan_pegawai;
            $employee->bpjs_ketenagakerjaan = $request->edit_bpjs_ketenagakerjaan;
            $employee->telepon = $request->edit_hp_pegawai;
            $employee->email = $request->edit_email_pegawai;
            $employee->rekening_name = $request->edit_nama_rekening;
            $employee->no_rekening = $request->edit_rekening_pegawai;

            $employee->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data karyawan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data karyawan', 'error']);
        }
//        dd($employee);
        return redirect()->route('human-resource-master-employee-list-data');
    }

    public function formUpdatekeluarga(Request $request, $id)
    {

        DB::beginTransaction();
        $keluargaEmployee = KeluargaEmployee::findOrFail($request->id_keluarga_employees);

        try {
            $keluargaEmployee->nama_keluarga = $request->nama_keluarga_edit;
            $keluargaEmployee->jenis_kelamin = $request->jk_keluarga_edit;
            $keluargaEmployee->tanggal_lahir = $request->tgl_lahir_edit;
            $keluargaEmployee->status_keluarga = $request->status_keluarga_edit;
            $keluargaEmployee->alamat_ktp = $request->ktp_kelaurga_edit;
            $keluargaEmployee->alamat_domisili = $request->alamat_domisili_edit;
            $keluargaEmployee->nik = $request->nik_keluarga_edit;
            $keluargaEmployee->npwp = $request->npwp_keluarga_edit;
            $keluargaEmployee->bpjs_kesehatan = $request->bpjs_kesehatan_keluarga_edit;
            $keluargaEmployee->telepon = $request->hp_keluarga_edit;
            $keluargaEmployee->email = $request->email_keluarga_edit;
            $keluargaEmployee->kontak_darurat = $request->kontak_darurat_keluarga_edit;
            $keluargaEmployee->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data keluarga', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data keluarga', 'error']);
        }
        return redirect()->route('human-resource-master-employee-form-edit', $keluargaEmployee->employee_id);
    }
    public function cetakPDF()
    {
        $departemen = request()->departemen;
        $position = request()->position;
        $status = request()->status;

        $employee = DB::table('employees')
            ->select('employees.*', 'departments.department_name', 'positions.position_name')
            ->join('departments', 'employees.departemen_id', 'departments.id')
            ->join('positions', 'employees.position_id', 'positions.id')
            ->when(!empty($departemen), function ($query) use ($departemen) {
                $query->where('employees.departemen_id', $departemen);
            })
            ->when(!empty($position), function ($query) use ($position) {
                $query->where('employees.position_id', $position);
            })
            ->when(!empty($status), function ($query) use ($status) {
                $query->where('employees.employee_status', $status);
            })
            ->get();

        $filename = 'employee' . "_" . Carbon::create(now())->format('Y_m_d_H_i_s') . '.pdf';
        $pdf = PDF::loadView('admin.human-resource.master-employee.cetak-pdf', ['employee' => $employee]);
        $pdf->setPaper('A4', 'portrait');

        #Set Page Number
        $canvas = $pdf->getDomPDF()->get_canvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);
        $canvas->page_text(550 / 2, 820, date('d-m-Y'), null, 8);
        return $pdf->stream($filename);
    }


    public function Deletekeluarga(Request $request)
    {
        $EmployeeId = $request->input('employee_id');
        $data = Employee::find($EmployeeId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data gaji karyawan',
            'status' => 200,
        ]);
    }

}
