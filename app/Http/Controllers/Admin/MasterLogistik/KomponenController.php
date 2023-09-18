<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterDataLogistik\Komponen;
use App\Models\MasterDataLogistik\SubBagian;
class KomponenController extends Controller
{
    public function getKomponen(){

        $komponen = Komponen::select("komponens.*", 'sub_bagians.nama_sub_bagian as sub_bagian')
            ->join('sub_bagians', 'sub_bagians.id', '=', 'komponens.sub_bagian_id')
            ->join('bagians', 'bagians.id', '=', 'sub_bagians.bagian_id') // Join dengan tabel 'bagians'
            ->orderBy('sub_bagians.id')
            ->get();
        $SubBagian = SubBagian::all();

        return view('admin.master-logistik.komponen.list-komponen', compact('komponen','SubBagian'));
    }

    public function SimpanKomponen(Request $request)
    {
        $komponen = new Komponen();
        $lastNomor = Komponen::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_komponen, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $nokomponen = 'KMP-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $komponen->kode_komponen = $nokomponen;
        $komponen->nama_komponen = $request->nama_komponen;
        $komponen->sub_bagian_id = $request->sub_bagian_id;
        $komponen->deskripsi_komponen = $request->deskripsi_komponen;

//           dd($komponen);
        try {
            $komponen->save();
            // Tampilkan pesan SweetAlert2 berhasil
            return redirect(route('admin.master-logistik.komponen.list-komponen'))->with('pesan-berhasil','Anda berhasil menambah data komponen');
        } catch (\Exception $e) {
            // Tampilkan pesan SweetAlert2 gagal
            return redirect(route('admin.master-logistik.komponen.list-komponen'))->with('pesan-gagal','Anda gagal menambah data komponen');
        }
    }

    public function EditKomponen(Request $request, $id)
    {
        $komponen = Komponen::findOrFail($id);

        $komponen->nama_komponen = $request->nama_komponen;
        $komponen->sub_bagian_id = $request->sub_bagian_id;
        $komponen->deskripsi_komponen = $request->deskripsi_komponen;

//        dd($komponen);

        try{
            $komponen->save();
            return redirect(route('admin.master-logistik.komponen.list-komponen'))->with('pesan-berhasil','Anda berhasil mengubah data komponen');

        }catch (\Exception $e){
            return redirect(route('admin.master-logistik.komponen.list-komponen'))->with('pesan-gagal','Anda gagal mengubah data komponen');
        }
    }

    public function DeleteKomponen($id)
    {
        $komponen = Komponen::findOrFail($id);

        try{
            $komponen->delete();
            return redirect(route('admin.master-logistik.komponen.list-komponen'))->with('pesan-berhasil','Anda berhasil mengubah data komponen');

        }catch (\Exception $e){
            return redirect(route('admin.master-logistik.komponen.list-komponen'))->with('pesan-gagal','Anda gagal mengubah data komponen');
        }
    }

    public function DetailKomponen(Request $request,$id)
    {
        $komponen = Komponen::findOrFail($id);

        return view('admin.master-logistik.komponen.list-komponen', compact('komponen'));
    }
}
