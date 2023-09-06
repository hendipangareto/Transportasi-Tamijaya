<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Bus;
use App\Models\MasterData\Facility;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'bus_code' => 'required|max:10|min:1|unique:bus',
                'bus_name' => 'required|max:255|min:1',
            ],
            [
                'bus_code.required' => 'Silahkan mengisi data kode',
                'bus_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'bus_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'bus_code.unique' => 'Kode kategori telah digunakan',
                'bus_name.required' => 'Silahkan mengisi data nama',
                'bus_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'bus_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        $facilities = Facility::get();
        return view('admin.master-data.bus.index', ["faciltiies" => $facilities]);
    }

    public function create()
    {
        $data = Bus::orderBy('id', 'ASC')->get();
        return view('admin.master-data.bus.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // $this->_validation($request);
        $data = $request->all();

        $facility_bus = '';
        foreach ($request->bus_facilities as $key => $facility_id) {
            $facility = Facility::findOrFail($facility_id);
            $facility_bus .= $facility->facility_name . ', ';
        }
        $facility_bus = substr($facility_bus, 0, -2);

        if ($request->file('bus_image') != '') {
            $img = $data['bus_image'] = $request->file('bus_image')->store(
                'assets/bus',
                'public'
            );
        } else {
            $img = '';
        }

        $data['bus_facility'] = $facility_bus;
        $data['bus_image'] = $img;
        $bus = Bus::create($data);

        foreach ($request->bus_facilities as $facility_id) {
            DB::table('bus_facilities')->insert(
                [
                    'id_bus' => $bus->id,
                    'id_facility' => $facility_id
                ]
            );
        }

        // Gallery Bus
        $bus_gallery = $request->file();

        foreach ($bus_gallery['bus_gallery_image'] as $value) {

            $bus_photo = $value->store(
                'assets/bus',
                'public'
            );

            DB::table('bus_photos')->insert(
                [
                    'id_bus' => $bus->id,
                    'bus_photo' => $bus_photo
                ]
            );
        }

        return response()->json([
            'data' => $bus,
            'message' => 'Berhasil menambahkan data ' . $bus->bus_name,
            'status' => $bus ? 200 : 400,
        ]);
    }

    public function show($type)
    {
        $count = Bus::count();
        if ($count > 0) {
            $last_data =  Bus::latest('id')->first();
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
        $code_data = "BUS-" . $output;

        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }

    public function edit($id)
    {
        $data = Bus::findOrFail($id);
        $gallery = DB::select('SELECT * FROM bus_photos WHERE id_bus = ' . $id);

        $data['gallery'] = $gallery;

        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Bus::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->bus_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function destroy($id)
    {
        Bus::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Bus',
            'status' => 200,
        ]);
    }

    public function getDetailBus($id)
    {
        $data = Bus::findOrFail($id);
        $gallery = DB::select('SELECT * FROM bus_photos WHERE id_bus = ' . $id);

        $data['gallery'] = $gallery;

        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
}
