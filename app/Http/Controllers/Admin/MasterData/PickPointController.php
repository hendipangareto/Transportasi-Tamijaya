<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\PickPoint;

class PickPointController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'pick_point_code' => 'required|max:10|min:1|unique:pick_points',
                'pick_point_name' => 'required|max:255|min:1',
            ],
            [
                'pick_point_code.required' => 'Silahkan mengisi data kode',
                'pick_point_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'pick_point_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'pick_point_code.unique' => 'Kode kategori telah digunakan',
                'pick_point_name.required' => 'Silahkan mengisi data nama',
                'pick_point_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'pick_point_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.pick-point.index');
    }

    public function create()
    {
        $data = PickPoint::orderBy('id', 'ASC')->get();
        return view('admin.master-data.pick-point.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = PickPoint::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->pick_point_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = PickPoint::count();
        if ($count > 0) {
            $last_data =  PickPoint::latest('id')->first();
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
        $code_data = "PCK-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = PickPoint::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = PickPoint::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->pick_point_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        PickPoint::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Jabatan',
            'status' => 200,
        ]);
    }
    public function getPickByDestination($code){
        $data = PickPoint::orderBy('pick_point_name', 'ASC')->where('pick_point_alias', $code)->get();
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Berhasil mendapatkan data titik penjemputan',
            'status' => 200,
        ]);
    }
}
