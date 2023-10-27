<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\Sopir;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Armada;
use App\Models\MasterDataLogistik\Bagian;
use App\Models\PerawatanPemeliharaan\CekLayananFisik;
use App\Models\PerawatanPemeliharaan\PetugasCuci\CuciArmada;
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
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan', compact('armada', 'bagian', 'sopir'));

//        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan', compact('armada', 'bagian', 'sopir'));
    }


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
            $validatedData = $request->validate([
                'id_armada' => 'required|numeric',
                'bagian_id' => 'required|numeric',
                'keluhan' => 'required|string',
            ]);

            // Buat instance model CekLayananFisik
            $sopir = new CekLayananFisik();
            $sopir->id_armada = $validatedData['id_armada'];
            $sopir->bagian_id = $validatedData['bagian_id'];
            $sopir->keluhan = $validatedData['keluhan'];
            $sopir->save();

            DB::commit();
            session()->flash('message', ['Berhasil menyimpan data check fisik layanan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('message', ['Gagal menyimpan data check fisik layanan', 'error']);
        }

        return redirect()->route('perawatan-pemeliharaan.sopir.check-fisik-layanan');
    }


    public function AjukanCuciArmada (Request $request)
    {
        DB::beginTransaction();

        try {
            foreach ($request->check_fisik_layanan_id as $check_fisik_layanan_id) {
                $sopir = new CuciArmada();
                $sopir->check_fisik_layanan_id = $check_fisik_layanan_id;

//                dd($sopir);
                $sopir->save();
            }

            DB::commit();
            Session::flash('message', ['Berhasil mengajukan pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengajukan pengajuan pembelian', 'error']);
        }

        return redirect()->route('perawatan-pemeliharaan.sopir.check-fisik-layanan');
    }

    public function ReportPerjalanan()
    {
        return view('admin.perawatan-pemeliharaan.sopir.report-perjalanan');
    }



}
