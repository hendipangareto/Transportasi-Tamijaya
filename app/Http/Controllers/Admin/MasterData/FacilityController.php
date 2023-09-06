<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Facility;

class FacilityController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'facility_code' => 'required|max:10|min:1|unique:facilities',
                'facility_name' => 'required|max:255|min:1',
            ],
            [
                'facility_code.required' => 'Silahkan mengisi data kode',
                'facility_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'facility_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'facility_code.unique' => 'Kode kategori telah digunakan',
                'facility_name.required' => 'Silahkan mengisi data nama',
                'facility_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'facility_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.facility.index');
    }

    public function create()
    {
        $data = Facility::orderBy('id', 'ASC')->get();
        return view('admin.master-data.facility.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Facility::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->facility_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Facility::count();
        if ($count > 0) {
            $last_data =  Facility::latest('id')->first();
            $last_facility_code = substr($last_data->facility_code, -3);
            if (str_contains($last_facility_code, "00")) {
                $sequence = substr($last_facility_code, -1) + 1;
            } else if (str_contains($last_facility_code, "0")) {
                $sequence = substr($last_facility_code, -2) + 1;
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
        $code_status = "FCL-" . $output;
        return response()->json([
            'data' => $code_status,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Facility::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Facility::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->facility_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Facility::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data facility',
            'status' => 200,
        ]);
    }
}
