<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function getListSatuan()
    {
        $satuan = Satuan::all();
        // dd($satuan);
        return view('admin.human-resource.satuan.list-satuan', compact('satuan'));
    }

    public function SimpanSatuan(Request $request)
    {
        $satuan = new Satuan();
        $lastNomor = Satuan::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_sub_bagian, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $nosatuan = 'STN-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $satuan->kode_satuan = $nosatuan;
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->deskripsi_satuan = $request->deskripsi_satuan;


        //   dd($satuan);
        try {
            $satuan->save();
            // Tampilkan pesan SweetAlert2 berhasil
            return redirect(route('human-resource.status.list-satuan'))->with('pesan-berhasil','Anda berhasil menambah data satuan');
        } catch (\Exception $e) {
            // Tampilkan pesan SweetAlert2 gagal
            return redirect(route('human-resource.status.list-satuan'))->with('pesan-gagal','Anda gagal menambah data satuan');
        }
    }

}
