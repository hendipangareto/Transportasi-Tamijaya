<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\Sopir;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Armada;
use App\Models\MasterDataLogistik\Bagian;
use App\Models\PerawatanPemeliharaan\CekLayananFisik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CekFisikLayananController extends Controller
{
    public function listCheckFisik()
    {
        $armada = Armada::get();
        $bagian = Bagian::get();
        $sopir = CekLayananFisik::select("check_fisik_layanan.*", 'bagians.nama_bagian as bagian', 'armadas.armada_merk as merk')
            ->join('bagians', 'bagians.id', '=', 'check_fisik_layanan.bagian_id')
            ->join('armadas', 'armadas.id', '=', 'check_fisik_layanan.id_armada')
            ->orderBy('bagians.id')
            ->get();
        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan', compact('armada','bagian','sopir'));
    }


    public function getArmada(Request $request)
    {
        $armadaId = $request->input('id_armada');

        $armada = DB::table('armadas')
            ->select(  'bagians.nama_bagian',  'pick_points.pick_point_name')
            ->join('bagians', 'armadas.bagian_id', 'bagians.id')

            ->join('pick_points', 'armadas.id_pick_point', 'pick_points.id')

            ->where('armadas.id', '=', $armadaId)
            ->first();

        return response()->json($armada);


    }

    public function SumpanCheckList(Request $request)
    {

    }

    public function ReportPerjalanan()
    {
        return view('admin.perawatan-pemeliharaan.sopir.report-perjalanan');
    }
}
