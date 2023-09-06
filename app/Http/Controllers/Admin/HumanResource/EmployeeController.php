<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HumanResource\Employee;
use App\Models\MasterData\Position;
use App\Models\MasterData\Department;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'employee_code' => 'required|max:10|min:1|unique:employees',
                'employee_name' => 'required|max:255|min:1',
            ],
            [
                'employee_code.required' => 'Silahkan mengisi data kode',
                'employee_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'employee_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'employee_code.unique' => 'Kode kategori telah digunakan',
                'employee_name.required' => 'Silahkan mengisi data nama',
                'employee_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'employee_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        $deparments = Department::orderBy('department_name', 'ASC')->get();
        $positions = Position::orderBy('id', 'ASC')->get();
        return view('admin.human-resource.master-employee.index', ['deparments' => $deparments, 'positions' => $positions]);
    }

    public function create()
    {
        
        $data = DB::table('employees')->join('departments', 'departments.id', 'employees.id_department')
        ->join('positions', 'positions.id', 'employees.id_position')
        ->select('employees.*','positions.position_name','departments.department_name')->get();
        return view('admin.human-resource.master-employee.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // $this->_validation($request);
        $data = Employee::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->employee_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Employee::count();
        if ($count > 0) {
            $last_data =  Employee::latest('id')->first();
            $last_data_code = substr($last_data->data_code, -3);
            if (str_contains($last_data_code, "00")) {
                $sequence = substr($last_data_code, -1) + 1;
            } else if (str_contains($last_data_code, "0")) {
                $sequence = substr($last_data_code, -2) + 1;
            } else {
                $sequence =  $last_data->id + 1;
            }
        } else {
            $sequence =  1;
        }

        $output = '';
        if ($sequence == 1) {
            $sequence = 1;
        }
        if (strlen($sequence) == 1) {
            $output = '00' . $sequence;
        } else if (strlen($sequence) == 2) {
            $output = '0' . $sequence;
        } else {
            $output = $sequence;
        }
        $code_data = "EMP-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Employee::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->employee_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Karyawan',
            'status' => 200,
        ]);
    }
}
