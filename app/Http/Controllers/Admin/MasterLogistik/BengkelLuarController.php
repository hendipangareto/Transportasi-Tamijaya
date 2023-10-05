<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterDataLogistik\BengkelLuar;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BengkelLuarController extends Controller
{
    public function getBengkelLuar()
    {

        $BengkelLuar = BengkelLuar::select('bengkel_luars.*', 'cities.city_name as city', 'provinces.state_name as province')
            ->join('provinces', 'provinces.id', '=', 'bengkel_luars.id_province')
            ->join('cities', 'cities.id', '=', 'bengkel_luars.id_city')->get();

        // dd($BengkelLuar);
        $city = City::all();
        $provinces = Province::all();
        return view('admin.master-logistik.bengkel-luar.list-bengkel-luar', compact('BengkelLuar','city','provinces'));
    }

    public function SimpanBengkelLuar(Request $request)
    {
        DB::beginTransaction();
        try {
        $BengkelLuar = new BengkelLuar();
        $lastNomor = BengkelLuar::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_bengkel_luar, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noBengkelLuar = 'BKL-0' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $BengkelLuar->kode_bengkel_luar = $noBengkelLuar;
        $BengkelLuar->nama_bengkel_luar = $request->nama_bengkel_luar;
        $BengkelLuar->hp_bengkel_luar = $request->hp_bengkel_luar;
        $BengkelLuar->tlp_bengkel_luar = $request->tlp_bengkel_luar;

        $BengkelLuar->pic_bengkel_luar = $request->pic_bengkel_luar;
        $BengkelLuar->alamat_bengkel_luar = $request->alamat_bengkel_luar;
        $BengkelLuar->id_city = $request->id_city;
        $BengkelLuar->id_province = $request->id_province;
        $BengkelLuar->deskripsi_bengkel_luar = $request->deskripsi_bengkel_luar;

            $BengkelLuar->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data toko', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data toko', 'error']);
        }

        return redirect()->route('admin.master-logistik.bengkel-luar.list-bengkel-luar');
        //   dd($BengkelLuar);

    }

    public function EditBengkelLuar(Request $request, $id)
    {
        $BengkelLuar = BengkelLuar::findOrFail($id);
        $BengkelLuar->nama_bengkel_luar = $request->nama_bengkel_luar;
        $BengkelLuar->hp_bengkel_luar = $request->hp_bengkel_luar;
        $BengkelLuar->tlp_bengkel_luar = $request->tlp_bengkel_luar;

        $BengkelLuar->pic_bengkel_luar = $request->pic_bengkel_luar;
        $BengkelLuar->alamat_bengkel_luar = $request->alamat_bengkel_luar;
        $BengkelLuar->id_city = $request->id_city;
        $BengkelLuar->id_province = $request->id_province;
        $BengkelLuar->deskripsi_bengkel_luar = $request->deskripsi_bengkel_luar;

//        dd($BengkelLuar);
        try {
            $BengkelLuar->update();

            return redirect(route('admin.master-logistik.bengkel-luar.list-bengkel-luar'))->with('pesan-berhasil','Anda berhasil mengubah data bengkel luar');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.bengkel-luar.list-bengkel-luar'))->with('pesan-gagal','Anda gagal mengubah data bengkel luar');
        }
    }

    public function DeleteBengkelLuar($id)
    {
        $BengkelLuar = BengkelLuar::findOrFail($id);

        try {
            $BengkelLuar->delete();

            return redirect(route('admin.master-logistik.bengkel-luar.list-bengkel-luar'))->with('pesan-berhasil','Anda berhasil menghapus data bengkel luar');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.bengkel-luar.list-bengkel-luar'))->with('pesan-gagal','Anda gagal menghapus data bengkel luar');
        }
    }
}
