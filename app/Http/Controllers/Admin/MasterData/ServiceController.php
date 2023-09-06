<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Service;

class ServiceController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'service_code' => 'required|max:10|min:1|unique:services',
                'service_name' => 'required|max:255|min:1',
            ],
            [
                'service_code.required' => 'Silahkan mengisi data kode',
                'service_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'service_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'service_code.unique' => 'Kode kategori telah digunakan',
                'service_name.required' => 'Silahkan mengisi data nama',
                'service_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'service_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.master-data.service.index');
    }

    public function create()
    {
        $data = Service::orderBy('id', 'ASC')->get();
        return view('admin.master-data.service.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Service::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->service_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = Service::count();
        if ($count > 0) {
            $last_data =  Service::latest('id')->first();
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
        $code_data = "SRV-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Service::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->service_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Service::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Layanan',
            'status' => 200,
        ]);
    }

}
