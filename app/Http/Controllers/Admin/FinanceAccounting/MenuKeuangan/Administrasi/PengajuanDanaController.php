<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\QsActual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\BalancePasiva;

class PengajuanDanaController extends Controller
{
    public function index()
    {
        $danaUser = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 4)
            ->get();
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.index', compact('danaUser'));
    }
    public function detailPengajuan(Request $request, $id)
    {
        $danaUser = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 4)
            ->where('qs_actuals.id', '=', $id)
            ->get();
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.detail-pengajuan', compact('danaUser'));
    }
    public function rekap()
    {
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.rekap');
    }

    public function rekapDetail()
    {
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.rekap-detail');
    }
}
