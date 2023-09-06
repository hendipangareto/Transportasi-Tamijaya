<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\RouteWisata;
use App\Models\MasterData\DestinationWisata;
use App\Models\MasterData\Province;
use Illuminate\Support\Facades\DB;

class RouteWisataController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'route_wisata_code' => 'required|max:10|min:1|unique:route_wisatas',
                'route_wisata_name' => 'required|max:255|min:1',
            ],
            [
                'route_wisata_code.required' => 'Silahkan mengisi data kode',
                'route_wisata_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'route_wisata_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'route_wisata_code.unique' => 'Kode kategori telah digunakan',
                'route_wisata_name.required' => 'Silahkan mengisi data nama',
                'route_wisata_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'route_wisata_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        $provinces = Province::orderBy('state_name', 'ASC')->whereIn('id', array(1, 2, 3, 16, 17, 18, 31, 32, 33, 34, 35, 36, 51, 52, 53))->get();
        $destinations = DestinationWisata::orderBy('id', 'ASC')->get();
        return view('admin.master-data.route-wisata.index', ['destinations' => $destinations]);
    }
    public function create()
    {
        $data = collect(DB::select("SELECT rw.*, (SELECT dw.destination_wisata_name FROM destination_wisatas dw WHERE rw.route_wisata_from = dw.id) AS destination_from, (SELECT dw.destination_wisata_name FROM destination_wisatas dw WHERE rw.route_wisata_target = dw.id) AS destination_target FROM route_wisatas rw"));
        return view('admin.master-data.route-wisata.display', ['data' => $data]);
    }
    public function store(Request $request)
    {
        // $this->_validation($request);
        $data = RouteWisata::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->route_wisata_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = RouteWisata::count();
        if ($count > 0) {
            $last_data =  RouteWisata::latest('id')->first();
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
        $code_data = "RTW-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = RouteWisata::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = RouteWisata::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->destionation_wisata_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        RouteWisata::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Destinasi Wisata',
            'status' => 200,
        ]);
    }
}
