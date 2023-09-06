<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Office;

class OfficeController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'office_code' => 'required|max:10|min:1|unique:offices',
                'office_name' => 'required|max:255|min:1',
            ],
            [
                'office_code.required' => 'Silahkan mengisi data kode',
                'office_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'office_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'office_code.unique' => 'Kode kategori telah digunakan',
                'office_name.required' => 'Silahkan mengisi data nama',
                'office_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'office_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.office.index');
    }

    public function create()
    {
        $data = Office::orderBy('id', 'ASC')->get();
        return view('admin.master-data.office.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Office::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->office_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Office::count();
        if ($count > 0) {
            $last_data =  Office::latest('id')->first();
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
        $code_data = "OFC-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Office::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Office::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->office_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Office::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Kantor',
            'status' => 200,
        ]);
    }
}
