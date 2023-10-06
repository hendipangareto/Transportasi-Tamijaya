<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\BalancePasiva;

class DaftarTransaksiController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.kasir.daftar-transaksi.index');
    }

    public function formKwitansi()
    {
        return view('admin.finance-accounting.menu-keuangan.kasir.daftar-transaksi.form-kwitansi');
    }
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
