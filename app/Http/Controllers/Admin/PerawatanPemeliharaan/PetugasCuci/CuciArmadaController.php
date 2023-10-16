<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\PetugasCuci;

use App\Http\Controllers\Controller;
use App\Models\PerawatanPemeliharaan\CekLayananFisik;
use App\Models\PerawatanPemeliharaan\PetugasCuci\CuciArmada;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CuciArmadaController extends Controller
{
    public function  listNotifikasi()
    {
        $currentDate = Carbon::now()->toDateString();
        $CuciArmada = CuciArmada::select("cuci_armadas.*", 'check_fisik_layanan.*', 'armadas.*', 'bagians.*')
            ->join('check_fisik_layanan', 'cuci_armadas.check_fisik_layanan_id', '=', 'check_fisik_layanan.id')
        ->Leftjoin('armadas', 'check_fisik_layanan.id_armada', '=', 'check_fisik_layanan.id')
        ->Leftjoin('bagians', 'check_fisik_layanan.bagian_id', '=', 'bagians.id')
            ->get();

//        $CuciArmada =   DB::table('cuci_armadas')
//            ->join('check_fisik_layanan', 'cuci_armadas.check_fisik_layanan_id', '=', 'check_fisik_layanan.id')
//            ->Leftjoin('armadas', 'check_fisik_layanan.id_armada', '=', 'check_fisik_layanan.id')
//            ->Leftjoin('bagians', 'check_fisik_layanan.bagian_id', '=', 'bagians.id')
//            ->select('cuci_armadas.*', 'armadas.*', 'bagians.*', 'check_fisik_layanan.*')
//            ->get();
        dd($CuciArmada);
        return view('admin.perawatan-pemeliharaan.petugas-cuci.list-notifikasi', compact('CuciArmada','currentDate'));
    }



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
