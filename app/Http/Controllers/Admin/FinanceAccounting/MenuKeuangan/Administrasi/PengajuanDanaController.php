<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\QsActual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\BalancePasiva;
use Illuminate\Support\Facades\Session;

class PengajuanDanaController extends Controller
{
    public function index()
    {
        $danaUser = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 2)
            ->get();

        $terpilih =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 4)
            ->get();

        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.index', compact('danaUser', 'terpilih'));

    }
    public function detailPengajuan(Request $request, $id)
    {
        $danaUser = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 2)
            ->where('qs_actuals.id', '=', $id)
            ->get();

//        $terpilih =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
//            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
//            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
//            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
//            ->where('qs_actuals.status', '=', 4)
//            ->get();

        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.detail-pengajuan', compact('danaUser'));
    }


    public function rekap()
    {
        $detail =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 3)
            ->get();
//        dd($detail);
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.rekap', compact('detail'));
    }

    public function rekapDetail()
    {
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.rekap-detail');
    }
}
