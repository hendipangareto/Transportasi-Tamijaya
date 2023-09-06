<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Position;
use App\Models\MasterData\Department;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'position_code' => 'required|max:10|min:1|unique:positions',
                'position_name' => 'required|max:255|min:1',
            ],
            [
                'position_code.required' => 'Silahkan mengisi data kode',
                'position_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'position_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'position_code.unique' => 'Kode kategori telah digunakan',
                'position_name.required' => 'Silahkan mengisi data nama',
                'position_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'position_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        $departments = Department::orderBy('id', 'ASC')->get();
        return view('admin.master-data.position.index', ['departments' => $departments]);
    }

    public function create()
    {
        
        $data = DB::table('positions')->join('departments', 'departments.id', 'positions.id_department')->select('positions.*','departments.department_name')->get();
       
        return view('admin.master-data.position.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Position::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->position_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Position::count();
        if ($count > 0) {
            $last_data =  Position::latest('id')->first();
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
        $code_data = "PST-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Position::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Position::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->position_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Position::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Jabatan',
            'status' => 200,
        ]);
    }
}
