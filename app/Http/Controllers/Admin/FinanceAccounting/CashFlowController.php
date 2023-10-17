<?php

namespace App\Http\Controllers\Admin\FinanceAccounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FinanceAccounting\CashFlow;
use App\Models\MasterData\Account;

class CashFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::get();
//        dd($accounts);
        return view('admin.finance-accounting.cash-flow.index', ["accounts" => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =  DB::table('cash_flows')
            ->select('cash_flows.*', 'accounts.account_name')
            ->join('accounts', 'cash_flows.id_account', 'accounts.id')
            ->get();
        $query = "SELECT  SUM(COALESCE(CASE WHEN `type_cf` = 'DEBIT' THEN amount END,0)) TOTAL_DEBIT , SUM(COALESCE(CASE WHEN `type_cf` = 'KREDIT' THEN amount END,0)) TOTAL_KREDIT , SUM(COALESCE(CASE WHEN `type_cf` = 'DEBIT' THEN amount END,0)) - SUM(COALESCE(CASE WHEN `type_cf` = 'KREDIT' THEN amount END,0)) BALANCE FROM cash_flows HAVING BALANCE <> 0";
        $data_result = DB::select($query);
        $data_result = $data_result[0];
        return view('admin.finance-accounting.cash-flow.display', ["data" => $data, "data_result" => $data_result]);
    }

    public function store(Request $request)
    {
        $account = Account::findOrFail($request->id_account);
        $data_cf = $request->all();
        if ($account->account_type == "AKTIVA") {
            $data_cf['type_cf'] = "DEBIT";
        } else {
            $data_cf['type_cf'] = "KREDIT";
        }
        CashFlow::create($data_cf);
        return response()->json([
            'data' => $data_cf,
            'message' => 'Berhasil menambahkan Cash Flow',
            'status' => $data_cf ? 200 : 400,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($month)
    {
        $data =  DB::table('cash_flows')
            ->select('cash_flows.*', 'accounts.account_name')
            ->join('accounts', 'cash_flows.id_account', 'accounts.id')
            ->whereMonth('cash_flows.created_at', $month)
            ->get();
        $query = "SELECT  SUM(COALESCE(CASE WHEN `type_cf` = 'DEBIT' THEN amount END,0)) TOTAL_DEBIT , SUM(COALESCE(CASE WHEN `type_cf` = 'KREDIT' THEN amount END,0)) TOTAL_KREDIT , SUM(COALESCE(CASE WHEN `type_cf` = 'DEBIT' THEN amount END,0)) - SUM(COALESCE(CASE WHEN `type_cf` = 'KREDIT' THEN amount END,0)) BALANCE FROM cash_flows
        where month(created_at) =  $month HAVING BALANCE <> 0";
        $data_result = DB::select($query);
        if ($data_result) {
            $data_result = $data_result[0];
        } else {
            $data_result = [];
        }
        return view('admin.finance-accounting.cash-flow.display', ["data" => $data, "data_result" => $data_result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
