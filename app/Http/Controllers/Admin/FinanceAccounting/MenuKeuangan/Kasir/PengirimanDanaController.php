<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Kasir;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\QsActual;
use App\Models\MasterDataLogistik\SubBagian;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PengirimanDanaController extends Controller
{
    public function index()
    {
        $dataIndex = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 5)
            ->get();

        return view('admin.finance-accounting.menu-keuangan.kasir.pengiriman-dana.index', compact('dataIndex'));
    }

//    public function DanaDikirim(Request $request)
//    {
//        try {
//            DB::beginTransaction();
//            if (is_array($request->id_qs) && count($request->id_qs) > 0) {
//                foreach ($request->id_qs as $key => $val) {
//                    $dataIndex = QsActual::find($val);
//                    if ($dataIndex) {
//                        $dataIndex->status = 7;
//                        $dataIndex->save();
//                    }
//                }
//            }
//            DB::commit();
//            Session::flash('message', ['Berhasil mengajukan mengirimkan dana, akan masuk dalam rekap pengiriman dana!', 'success']);
//        } catch (\Exception $e) {
//            DB::rollback();
//            Session::flash('message', ['Gagal mengajukan dana', 'error']);
//        }
//        return redirect()->route('finance-accounting-menu-keuangan-kasir-pengiriman-dana-index');
//    }

    public function cetakKwitansi(Request $request)
    {

        $bagian_id = request()->bagian;

        $dataIndex = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 5)
            ->get();
//        dd($dataIndex);
        $filename = 'QsActual' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.finance-accounting.menu-keuangan.kasir.pengiriman-dana.kwitansi-pengajuan-dana', compact('dataIndex'));

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
