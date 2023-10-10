<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\SubBagian;
use App\Models\MasterKeuangan\Akun;
use App\Models\MasterKeuangan\SubAkun;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubAkunController extends Controller
{
    public function getListSubAkun(Request $request)
    {
        $akun = Akun::get();

        $id_akun= "";
        if (isset($request->id_akun)) {
            $id_akun = $request->id_akun;
        }

        // Define $params here
        $params = [
            'id_akun' => $id_akun,
        ];

        $SubAkun = SubAkun::select("sub_akuns.*", 'akuns.nama_akun as akun')
            ->join('akuns', 'akuns.id', '=', 'sub_akuns.id_akun')
            ->orderBy('akuns.id')
            ->when(!empty($id_akun), function ($query) use ($id_akun) {
                $query->where('sub_akuns.id_akun', $id_akun);
            })
            ->get();



        return view('admin.master-keuangan.sub-akun.list', compact('akun', 'SubAkun', 'params'));
    }

    public function TambahSubAkun(Request $request)
    {
        DB::beginTransaction();
        try {
        $SubAkun = new SubAkun();
        $lastNomor = SubAkun::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_sub_akun, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noSubAkun = 'SBAKN-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $SubAkun->kode_sub_akun = $noSubAkun;
        $SubAkun->nama_sub_akun = $request->nama_sub_akun;
        $SubAkun->id_akun = $request->id_akun;
        $SubAkun->deskripsi_sub_akun = $request->deskripsi_sub_akun;


            $SubAkun->save();


            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data sub akun', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data sub akun', 'error']);
        }

        return redirect()->route('master-keuangan.sub-akun.list-sub-akun');

    }

    public function UpdateSubAkun(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $SubAkun =  SubAkun::findOrFail($id);


            $SubAkun->nama_sub_akun = $request->nama_sub_akun;
            $SubAkun->id_akun = $request->id_akun;
            $SubAkun->deskripsi_sub_akun = $request->deskripsi_sub_akun;


            $SubAkun->save();


            DB::commit();
            Session::flash('message', ['Berhasil mengubah data sub akun', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data sub akun', 'error']);
        }

        return redirect()->route('master-keuangan.sub-akun.list-sub-akun');
    }
    public function cetakPDF()
    {
        $id_akun = request()->akun;

        $SubAkun = SubAkun::select("sub_akuns.*", 'akuns.nama_akun as akun')
            ->join('akuns', 'akuns.id', '=', 'sub_akuns.id_akun')
            ->orderBy('akuns.id')
            ->when(!empty($id_akun), function ($query) use ($id_akun) {
                $query->where('sub_akuns.id_akun', $id_akun);
            })
            ->get();
        $filename = 'SubBagian' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.master-keuangan.sub-akun.cetak-pdf', compact('SubAkun') );

        $pdf->setPaper('A4', 'portrait');

        // Set Page Number
        $canvas = $pdf->getDomPDF()->getCanvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);


        $canvas->page_text(550 / 2, 820, now()->format('d-m-Y'), null, 8);
        $canvas->page_text(550 / 16, 820,  'PT Anugerah Karya Utami Gemilang', null, 8);
        return $pdf->stream($filename);
    }

    public function DeleteSubAkun(Request $request)
    {
        try {
            $subakunId = $request->input('sub_akun_id');
            $SubAkun = SubAkun::findOrFail($subakunId);
            $SubAkun->delete();

            return response()->json([
                'data' => $SubAkun,
                'message' => 'Berhasil menghapus data sub akun',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus data sub akun',
                'status' => 500,
            ]);
        }
    }

}
