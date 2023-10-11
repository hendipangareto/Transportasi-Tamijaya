<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\Sopir;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Armada;
use App\Models\MasterDataLogistik\Bagian;
use App\Models\PerawatanPemeliharaan\CekLayananFisik;
use App\Models\TataKelola\DokumenFinal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan', compact('armada', 'bagian', 'sopir'));
    }


//        public function getArmada(Request $request)
//        {
//            $armadaId = $request->input('id_armada');
//
//            $armada = DB::table('armadas')
//                ->select('pick_points.pick_point_name')
//                ->join('pick_points', 'armadas.id_pick_point', 'pick_points.id')
//
//                ->where('armadas.id', '=', $armadaId)->first();
//
//            return response()->json($armada);
//
//        }

    public function getArmada(Request $request)
    {
        $armadaId = $request->input('id_armada');

        $armada = Armada::with('pickPoint')->find($armadaId);

        if ($armada) {
            $data = [
                'pick_point_name' => $armada->pickPoint->pick_point_name,
                'destination_wisata_name' => $armada->destinationWisata->destination_wisata_name,
                'armada_category' => $armada->armada_category,
                'armada_type' => $armada->armada_type,
                'armada_capacity' => $armada->armada_capacity, // Tambahkan ini
                'armada_no_police' => $armada->armada_no_police,
            ];

            return response()->json($data);
        }

        return response()->json(['error' => 'Data not found'], 404);
    }


    public function TambahArmada(Request $request)
    {
        DB::beginTransaction();
        try {

            $sopir = new CekLayananFisik();

            $sopir->id_armada = $request->id_armada;
            $sopir->bagian_id = $request->bagian_id;
//            $sopir->id_pick_point = $request->id_pick_point;
//            $sopir->id_destination_wisata = $request->id_destination_wisata;
            $sopir->keluhan = $request->keluhan;

//             dd($sopir);
            $sopir->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data check fisik layanan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data check fisik layanan', 'error']);
        }

        return redirect()->route('perawatan-pemeliharaan.sopir.check-fisik-layanan');
    }


    public function ReportPerjalanan()
    {
        return view('admin.perawatan-pemeliharaan.sopir.report-perjalanan');
    }



}
