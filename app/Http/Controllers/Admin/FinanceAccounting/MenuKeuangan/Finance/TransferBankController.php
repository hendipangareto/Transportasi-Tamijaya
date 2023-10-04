<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\JurnalUmum;
use App\Models\MasterData\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransferBankController extends Controller
{
    public function index()
    {
        $bank = Bank::get();

        return view('admin.finance-accounting.menu-keuangan.finance.transfer-bank.index', ['bank' => $bank]);
    }

    public function approved(Request $request)
    {
        DB::beginTransaction();
        try {

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-transfer-bank-index');
    }
}
