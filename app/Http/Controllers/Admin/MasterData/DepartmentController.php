<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Department;
use App\Models\MasterData\Position;

class DepartmentController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'department_code' => 'required|max:10|min:1|unique:departments',
                'department_name' => 'required|max:255|min:1',
            ],
            [
                'department_code.required' => 'Silahkan mengisi data kode',
                'department_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'department_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'department_code.unique' => 'Kode kategori telah digunakan',
                'department_name.required' => 'Silahkan mengisi data nama',
                'department_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'department_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.department.index');
    }

    public function create()
    {
        $data = Department::orderBy('id', 'ASC')->get();
        return view('admin.master-data.department.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Department::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->department_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Department::count();
        if ($count > 0) {
            $last_data =  Department::latest('id')->first();
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
        $code_data = "DPT-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Department::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Department::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->department_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Department::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Department',
            'status' => 200,
        ]);
    }

    public function getPositionByDepartment($id){

        $data = Position::orderBy('position_name', 'ASC')->where('id_department', $id)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus mendapatkan data Jabatan',
            'status' => 200,
        ]);
    }
}
