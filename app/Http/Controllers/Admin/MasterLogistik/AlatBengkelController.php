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
}
