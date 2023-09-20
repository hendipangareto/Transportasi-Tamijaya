<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterDataLogistik\Toko;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;

class TokoController extends Controller
{
    public function getToko (){
        $Toko = Toko::select('tokos.*', 'cities.city_name as city', 'provinces.state_name as province')
            ->join('provinces', 'provinces.id', '=', 'tokos.id_province')
            ->join('cities', 'cities.id', '=', 'tokos.id_city')->get();

        // dd($Toko);
        $city = City::all();
        $provinces = Province::all();
        return view('admin.master-logistik.toko.list-toko', compact('Toko', 'city', 'provinces'));
    }

    public function SimpanToko(Request $request)
    {
        $Toko = new Toko();
        $lastNomor = Toko::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_toko, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noToko = 'TK-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $Toko->kode_toko = $noToko;
        $Toko->nama_toko = $request->nama_toko;
        $Toko->hp_toko = $request->hp_toko;
        $Toko->tlp_toko = $request->tlp_toko;
        $Toko->pic_toko = $request->pic_toko;
        $Toko->alamat_toko = $request->alamat_toko;
        $Toko->id_city = $request->id_city;
        $Toko->id_province = $request->id_province;
        $Toko->deskripsi_toko = $request->deskripsi_toko;


        //   dd($Toko);
        try {
            $Toko->save();

            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-berhasil','Anda berhasil menambah data toko');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-gagal','Anda gagal menambah data toko');
        }
    }

    public function UpdateToko(Request $request, $id)
    {
        $Toko = Toko::findOrFail($id);
        $Toko->nama_toko = $request->nama_toko;
        $Toko->hp_toko = $request->hp_toko;
        $Toko->tlp_toko = $request->tlp_toko;
        $Toko->pic_toko = $request->pic_toko;
        $Toko->alamat_toko = $request->alamat_toko;
        $Toko->id_city = $request->id_city;
        $Toko->id_province = $request->id_province;
        $Toko->deskripsi_toko = $request->deskripsi_toko;

//        dd($Toko);
        try {
            $Toko->update();
            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-berhasil','Anda berhasil mengubah data toko');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-gagal','Anda gagal mengubah data toko');
        }

    }

    public function DeleteToko($id)
    {
        $Toko = Toko::findOrFail($id);

        try {
            $Toko->delete();

            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-berhasil','Anda berhasil menghapus data toko');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-gagal','Anda gagal menghapus data toko');
        }
    }
}
