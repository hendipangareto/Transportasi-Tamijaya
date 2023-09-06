<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\DayOff;

class DayOffController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'day_off_code' => 'required|max:10|min:1|unique:day_offs',
                'day_off_name' => 'required|max:255|min:1',
            ],
            [
                'day_off_code.required' => 'Silahkan mengisi data kode',
                'day_off_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'day_off_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'day_off_code.unique' => 'Kode kategori telah digunakan',
                'day_off_name.required' => 'Silahkan mengisi data nama',
                'day_off_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'day_off_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.day-off.index');
    }

    public function create()
    {
        $data = DayOff::orderBy('id', 'ASC')->get();

        return view('admin.master-data.day-off.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = DayOff::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->day_off_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = DayOff::count();
        if ($count > 0) {
            $last_data =  DayOff::latest('id')->first();
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
        $code_data = "DOF-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = DayOff::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = DayOff::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->day_off_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        DayOff::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Hari Libur',
            'status' => 200,
        ]);
    }
}
