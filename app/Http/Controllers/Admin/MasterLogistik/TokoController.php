<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterDataLogistik\Toko;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TokoController extends Controller
{
    public function getToko (){
        $Toko = Toko::select('tokos.*', 'cities.city_name as city', 'provinces.state_name as province')
            ->join('provinces', 'provinces.id', '=', 'tokos.id_province')
            ->join('cities', 'cities.id', '=', 'tokos.id_city')->get();

//         dd($Toko);
        $city = City::all();
        $provinces = Province::all();
        return view('admin.master-logistik.toko.list-toko', compact('Toko', 'city', 'provinces'));
    }

    public function SimpanToko(Request $request)
    {
        DB::beginTransaction();
        try {
        $Toko = new Toko();
        $lastNomor = Toko::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_toko, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noToko = 'TK-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $Toko->kode_toko = $noToko;
        $Toko->nama_toko = $request->nama_toko;
        $Toko->hp_toko = $request->hp_toko;
        $Toko->tlp_toko = $request->tlp_toko;
        $Toko->pic_toko = $request->pic_toko;
        $Toko->alamat_toko = $request->alamat_toko;
        $Toko->id_city = $request->id_city;
        $Toko->id_province = $request->id_province;
        $Toko->deskripsi_toko = $request->deskripsi_toko;

            $Toko->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data toko', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data toko', 'error']);
        }

        return redirect()->route('admin.master-logistik.toko.list-toko');

    }

    public function UpdateToko(Request $request, $id)
    {
        $Toko = Toko::findOrFail($id);
        $Toko->nama_toko = $request->nama_toko;
        $Toko->hp_toko = $request->hp_toko;
        $Toko->tlp_toko = $request->tlp_toko;
        $Toko->pic_toko = $request->pic_toko;
        $Toko->alamat_toko = $request->alamat_toko;
        $Toko->id_city = $request->id_city;
        $Toko->id_province = $request->id_province;
        $Toko->deskripsi_toko = $request->deskripsi_toko;

//        dd($Toko);
        try {
            $Toko->update();
            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-berhasil','Anda berhasil mengubah data toko');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.toko.list-toko'))->with('pesan-gagal','Anda gagal mengubah data toko');
        }

    }

    public function DeleteToko($id)
    {
        Toko::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Kode Perkiraan',
            'status' => 200,
        ]);
    }

    public function TokoPDF()
    {
        $toko = Toko::select('tokos.*', 'cities.city_name as city', 'provinces.state_name as province')
            ->join('provinces', 'provinces.id', '=', 'tokos.id_province')
            ->join('cities', 'cities.id', '=', 'tokos.id_city')->get();

        $filename = 'Toko' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.master-logistik.toko.cetak-pdf', ['toko' => $toko]);

        $pdf->setPaper('A4', 'portrait');

        // Set Page Number
        $canvas = $pdf->getDomPDF()->getCanvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);


        $canvas->page_text(550 / 2, 820, now()->format('d-m-Y'), null, 8);
        $canvas->page_text(550 / 16, 820, 'PT Anugerah Karya Utami Gemilang', null, 8);
        return $pdf->stream($filename);
    }
}
