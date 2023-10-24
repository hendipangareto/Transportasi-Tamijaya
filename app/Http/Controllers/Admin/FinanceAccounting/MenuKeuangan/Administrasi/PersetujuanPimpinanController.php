<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\QsActual;
use Illuminate\Support\Facades\Request;


class PersetujuanPimpinanController extends Controller
{
    public function DiSetujuiPimpinan(Request $request)
    {
        $danaDisetujui =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 5)
            ->get();
//        dd($danaDisetujui);
        return view('admin.finance-accounting.menu-keuangan.administrasi.persetujuan-pimpinan.index', compact('danaDisetujui'));
    }


    public function DanaDitransfer(Request $request, $id)
    {
        QsActual::where('id', $id)->update(['status_keuangan' => 3]);
        return redirect()->route('finance-accounting-menu-keuangan-administrasi-disetujui-pimpinan');
    }

    public function DanaChas(Request $request, $id)
    {
        QsActual::where('id', $id)->update(['status_keuangan' => 4]);
        return redirect()->route('finance-accounting-menu-keuangan-administrasi-disetujui-pimpinan');
    }



}
