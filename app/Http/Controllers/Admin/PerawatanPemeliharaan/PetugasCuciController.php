<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;
use App\Models\PerawatanPemeliharaan\CekLayananFisik;
use App\Models\PerawatanPemeliharaan\PetugasCuci\CuciArmada;

class PetugasCuciController extends Controller
{
//    public function  listNotifikasi()
//    {
////        $sopir = CekLayananFisik::select("check_fisik_layanan.*", 'bagians.nama_bagian as bagian', 'armadas.armada_merk as merk')
////            ->join('bagians', 'bagians.id', '=', 'check_fisik_layanan.bagian_id')
////            ->join('armadas', 'armadas.id', '=', 'check_fisik_layanan.id_armada')
////            ->orderBy('bagians.id')
////            ->get();
//        $CuciArmada = CuciArmada::select("cuci_armadas.*", 'check_fisik_layanan.*')
//            ->join('check_fisik_layanan', 'cuci_armadas.check_fisik_layanan_id', '=', 'check_fisik_layanan.id')
//            ->get();
//        return view('admin.perawatan-pemeliharaan.petugas-cuci.list-notifikasi', compact('CuciArmada'));
//    }

    public function setujuiCuci($id)
    {
        CekLayananFisik::where('id', $id)->update(['status' => 1]);
        return redirect()->route('perawatan-pemeliharaan.petugas-cuci.list-notifikasi-cuci');
    }

    public function TolakCuci($id)
    {
        CekLayananFisik::where('id', $id)->update(['status' => 2]);
        return redirect()->route('perawatan-pemeliharaan.petugas-cuci.list-notifikasi-cuci');
    }



}
