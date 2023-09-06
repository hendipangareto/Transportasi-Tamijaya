<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Province;
use App\Models\MasterData\City;

class ProvinceController extends Controller
{
    public function index()
    {
        return view('admin.master-data.province.index');
    }
    public function create()
    {
        $provinces = Province::orderBy('id', 'ASC')->get();
        return view('admin.master-data.province.display', ['provinces'=> $provinces]);
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function getCityByProvince($id){

        $data = City::orderBy('city_name', 'ASC')->where('id_state', $id)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus mendapatkan data Kota',
            'status' => 200,
        ]);
    }
}
