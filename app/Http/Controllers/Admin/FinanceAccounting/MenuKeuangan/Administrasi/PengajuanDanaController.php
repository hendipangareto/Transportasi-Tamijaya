<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\BalancePasiva;

class PengajuanDanaController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.index');
    }
    public function detailPengajuan()
    {
        return view('admin.finance-accounting.menu-keuangan.administrasi.pengajuan-dana.detail-pengajuan');
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
