<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Status;

class StatusController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'status_code' => 'required|max:10|min:1|unique:status',
                'status_name' => 'required|max:255|min:1',
            ],
            [
                'status_code.required' => 'Silahkan mengisi data kode',
                'status_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'status_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'status_code.unique' => 'Kode kategori telah digunakan',
                'status_name.required' => 'Silahkan mengisi data nama',
                'status_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'status_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.status.index');
    }

    public function create()
    {
        $status = Status::orderBy('id', 'ASC')->get();
        return view('admin.master-data.status.display', ['status' => $status]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $status = Status::create($request->all());
        return response()->json([
            'data' => $status,
            'message' => 'Berhasil menambahkan data ' . $status->status_name,
            'status' => $status ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Status::count();
        if ($count > 0) {
            $last_data =  Status::latest('id')->first();
            $last_status_code = substr($last_data->status_code, -3);
            if (str_contains($last_status_code, "00")) {
                $sequence = substr($last_status_code, -1) + 1;
            } else if (str_contains($last_status_code, "0")) {
                $sequence = substr($last_status_code, -2) + 1;
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
        $code_status = "STS-" . $output;
        return response()->json([
            'data' => $code_status,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return response()->json([
            'data' => $status,
            'status' => $status ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);
        $status->update($request->all());
        return response()->json([
            'data' => $status,
            'message' => 'Berhasil mengubah data ' . $status->status_name,
            'status' => $status ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Status::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data status',
            'status' => 200,
        ]);
    }
}
