<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\MetodePenyusutan;
use Illuminate\Http\Request;;

class MetodePenyusutanController extends Controller
{
    public function getMetodePenyusutan ()
    {
        $MetodePenyusutan = MetodePenyusutan::get();
//        dd($MetodePenyusutan);
        return view('admin.master-keuangan.metode-penyusutan.list-metode-penyusutan', compact('MetodePenyusutan'));
    }

    public function TambahMetodePenyusutan(Request $request)
    {
        $MetodePenyusutan = new MetodePenyusutan();
        $lastNomor = MetodePenyusutan::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_metode_penyusutan, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $nokategori = 'MP-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);


        $MetodePenyusutan->kode_metode_penyusutan = $nokategori;
        $MetodePenyusutan->nama_metode_penyusutan = $request->nama_metode_penyusutan;
        $MetodePenyusutan->keterangan_metode_penyusutan = $request->keterangan_metode_penyusutan;

//        dd($MetodePenyusutan);
        try {
            $MetodePenyusutan->save();
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-berhasil', 'Anda berhasil menambah data metode penyusutan');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-gagal', 'Anda gagal menambah data metode penyusutan');
        }
    }

    public function UpdateMetodePenyusutan(Request $request, $id)
    {
        $MetodePenyusutan = MetodePenyusutan::findOrFail($id);

        $MetodePenyusutan->nama_metode_penyusutan = $request->nama_metode_penyusutan;
        $MetodePenyusutan->keterangan_metode_penyusutan = $request->keterangan_metode_penyusutan;

//        dd($MetodePenyusutan);
        try {
            $MetodePenyusutan->save();
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-berhasil', 'Anda berhasil mengubah data metode penyusutan');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-gagal', 'Anda gagal mengubah data metode penyusutan');
        }
    }

    public function DeleteMetodePenyusutan($id)
    {
        $MetodePenyusutan = MetodePenyusutan::findOrFail($id);

        try {
            $MetodePenyusutan->delete();
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-berhasil', 'Anda berhasil menghapus data metode penyusutan');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-gagal', 'Anda gagal menghapus data metode penyusutan');
        }
    }

}





