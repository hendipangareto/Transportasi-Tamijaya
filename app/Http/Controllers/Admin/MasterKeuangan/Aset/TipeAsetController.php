<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterKeuangan\TipeAset;
class TipeAsetController extends Controller
{
    public function getTipeAset()
    {
        $TipeAset = TipeAset::all();
        return view('admin.master-keuangan.aset.tipe-aset.list-tipe-aset', compact('TipeAset'));
    }

    public function TambahTipeAset(Request $request)
    {
        $TipeAset = new TipeAset();
        $lastNomor = TipeAset::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_tipe_aset, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noTipeAset = 'TA-01' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $TipeAset->kode_tipe_aset = $noTipeAset;
        $TipeAset->nama_tipe_aset = $request->nama_tipe_aset;
        $TipeAset->deskripsi_tipe_aset = $request->deskripsi_tipe_aset;

//        dd($TipeAset);
        try {
            $TipeAset->save();
            return redirect(route('master-keuangan.aset.tipe-aset'))->with('pesan-berhasil', 'Anda berhasil menambah data tipe aset');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.tipe-aset'))->with('pesan-gagal', 'Anda gagal menambah data tipe aset');
        }
    }
    public function UpdateTipeAset(Request $request,$id)
    {
        $TipeAset = TipeAset::findOrFail($id);

        $TipeAset->nama_tipe_aset = $request->nama_tipe_aset;
        $TipeAset->deskripsi_tipe_aset = $request->deskripsi_tipe_aset;

//        dd($TipeAset);
        try {
            $TipeAset->save();
            return redirect(route('master-keuangan.aset.tipe-aset'))->with('pesan-berhasil', 'Anda berhasil mengubah data tipe aset');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.tipe-aset'))->with('pesan-gagal', 'Anda gagal mengubah data tipe aset');
        }
    }
}
