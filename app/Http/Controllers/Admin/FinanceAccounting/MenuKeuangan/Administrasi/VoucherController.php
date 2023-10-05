<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\BalancePasiva;

class VoucherController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.administrasi.voucher.index');
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
