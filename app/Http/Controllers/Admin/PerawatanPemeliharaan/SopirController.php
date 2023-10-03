<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Armada;
use App\Models\MasterDataLogistik\Bagian;
use App\Models\MasterDataLogistik\Sopir;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    public function listCheckFisik()
    {
        $armada = Armada::get();
        $bagian = Bagian::get();
        $sopir = Sopir::select("check_fisik_layanan.*", 'bagians.nama_bagian as bagian', 'armadas.armada_merk as merk')
            ->join('bagians', 'bagians.id', '=', 'check_fisik_layanan.bagian_id')
            ->join('armadas', 'armadas.id', '=', 'check_fisik_layanan.id_armada')
            ->orderBy('bagians.id')
            ->get();
        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan', compact('armada','bagian','sopir'));
    }


    public function SumpanCheckList(Request $request)
    {

    }

    public function ReportPerjalanan()
    {
        return view('admin.perawatan-pemeliharaan.sopir.report-perjalanan');
    }



}
