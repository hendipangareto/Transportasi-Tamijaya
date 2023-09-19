<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterDataLogistik\AlatKerjaBengkel;
use App\Models\MasterData\Satuan;

class AlatBengkelController extends Controller
{
    public function getAlatBengkel(){
        $AlatKerjaBengkel = AlatKerjaBengkel::select("alat_kerja_bengkels.*", 'satuans.nama_satuan as satuan')
            ->join('satuans', 'satuans.id', '=', 'alat_kerja_bengkels.satuan_id')
            ->orderBy('satuans.id')
            ->get();

        $satuan = Satuan::all();
        //        dd($AlatKerjaBengkel);
        return view('admin.master-logistik.alat-kerja-bengkel.list-alat', compact('AlatKerjaBengkel', 'satuan'));
    }

    public function SimpanAlatBengkel(Request $request)
    {
        $AlatKerjaBengkel = new AlatKerjaBengkel();
        $lastNomor = AlatKerjaBengkel::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_alat_kerja_bengkel, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noAlatKerjaBengkel = 'AKB-1' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $AlatKerjaBengkel->kode_alat_kerja_bengkel= $noAlatKerjaBengkel;
        $AlatKerjaBengkel->nama_alat_kerja_bengkel = $request->nama_alat_kerja_bengkel;
        $AlatKerjaBengkel->satuan_id = $request->satuan_id;
        $AlatKerjaBengkel->kuantitas_alat_kerja_bengkel = $request->kuantitas_alat_kerja_bengkel;

//        dd($AlatKerjaBengkel);
        try {
            $AlatKerjaBengkel->save();

            return redirect(route('admin.master-logistik.alat-kerja-bengkel.list-alat-kerja-bengkel'))->with('pesan-berhasil','Anda berhasil menambah data alat kerja bengkel');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.alat-kerja-bengkel.list-alat-kerja-bengkel'))->with('pesan-gagal','Anda gagal menambah data alat kerja bengkel');
        }
    }

    public function UpdateAlatBengkel(Request $request, $id)
    {
        $AlatKerjaBengkel = AlatKerjaBengkel::findOrFail($id);

        $AlatKerjaBengkel->nama_alat_kerja_bengkel = $request->nama_alat_kerja_bengkel;
        $AlatKerjaBengkel->satuan_id = $request->satuan_id;
        $AlatKerjaBengkel->kuantitas_alat_kerja_bengkel = $request->kuantitas_alat_kerja_bengkel;

//        dd($AlatKerjaBengkel);
        try {
            $AlatKerjaBengkel->save();

            return redirect(route('admin.master-logistik.alat-kerja-bengkel.list-alat-kerja-bengkel'))->with('pesan-berhasil','Anda berhasil mengubah data alat kerja bengkel');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.alat-kerja-bengkel.list-alat-kerja-bengkel'))->with('pesan-gagal','Anda gagal mengubah data alat kerja bengkel');
        }
    }
}
