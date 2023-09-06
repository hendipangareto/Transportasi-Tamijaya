<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\DestinationWisata;
use App\Models\MasterData\Province;
use Illuminate\Support\Facades\DB;


class DestinationWisataController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'destination_wisata_code' => 'required|max:10|min:1|unique:destination_wisatas',
                'destination_wisata_name' => 'required|max:255|min:1',
            ],
            [
                'destination_wisata_code.required' => 'Silahkan mengisi data kode',
                'destination_wisata_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'destination_wisata_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'destination_wisata_code.unique' => 'Kode kategori telah digunakan',
                'destination_wisata_name.required' => 'Silahkan mengisi data nama',
                'destination_wisata_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'destination_wisata_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        // $data = DestinationWisata::orderBy('id', 'ASC')->get();
        $provinces = Province::orderBy('state_name', 'ASC')->whereIn('id', array(1, 2, 3, 16, 17, 18, 31, 32, 33, 34, 35, 36, 51, 52, 53))->get();
        return view('admin.master-data.destination-wisata.index', ['provinces' => $provinces]);
    }
    public function create()
    {
        $data = DB::table('destination_wisatas')
        ->join('provinces', 'destination_wisatas.destination_wisata_province', 'provinces.id')
        ->select('destination_wisatas.*', 'provinces.state_name')
        ->get();
        return view('admin.master-data.destination-wisata.display', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = DestinationWisata::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->destination_wisata_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
        $count = DestinationWisata::count();
        if ($count > 0) {
            $last_data =  DestinationWisata::latest('id')->first();
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
        $code_data = "DST-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }
    public function edit($id)
    {
        $data = DestinationWisata::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = DestinationWisata::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->destionation_wisata_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        DestinationWisata::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Destinasi Wisata',
            'status' => 200,
        ]);
    }
}
