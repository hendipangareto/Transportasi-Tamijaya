<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.master-data.city.index');
    }
    public function create()
    {
        $cities = DB::table('cities')->join('provinces', 'provinces.id', 'cities.id_state')->select('cities.*','provinces.state_name','provinces.state_code')->get();
        return view('admin.master-data.city.display', ['cities' => $cities]);
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
}
