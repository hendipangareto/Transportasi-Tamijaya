<?php

namespace App\Http\Controllers\Admin\FinanceAccounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterData\Account;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\BalancePasiva;

class FilterAccountingController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.filter-accounting.index');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        echo json_encode($request->all());
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function getAllDataFinance()
    {
        $account = Account::orderBy('id', 'ASC')->get();
        $aktiva = BalanceAktiva::orderBy('id', 'ASC')->get();
        $pasiva = BalancePasiva::orderBy('id', 'ASC')->get();
        $data = [
            "account" => $account,
            "aktiva" => $aktiva,
            "pasiva" => $pasiva,
        ];
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mendapatkan data master',
            'status' => 200,
        ]);
    }

    public function getFilteredDataJournal(Request $request){
        extract($request->all());

        $LIST_TYPE_JOURNAL = '';
        $LIST_BALANCE_NAME = '';
        $LIST_ACCOUNT_NAME = '';

        foreach ($type_transaction as $type_journal) {
            if($LIST_TYPE_JOURNAL == ""){
                $LIST_TYPE_JOURNAL .= "'" . $type_journal . "'";
            } else {
                $LIST_TYPE_JOURNAL .= ",'" . $type_journal . "'";
            }
        }

        foreach ($group_transaction as $balance_name) {
            if($LIST_BALANCE_NAME == ""){
                $LIST_BALANCE_NAME .= "'" . $balance_name . "'";
            } else {
                $LIST_BALANCE_NAME .= ",'" . $balance_name . "'";
            }
        }

        foreach ($account_transaction as $account_name) {
            if($LIST_ACCOUNT_NAME == ""){
                $LIST_ACCOUNT_NAME .= "'" . $account_name . "'";
            } else {
                $LIST_ACCOUNT_NAME .= ",'" . $account_name . "'";
            }
        }

        $START_DATE_PERIODE = $start_date_periode;
        $END_DATE_PERIODE = $end_date_periode;

        $SQL = "SELECT * FROM (
            SELECT JOUR.id ID_JOURNAL_DETAIL, ACC.ACCOUNT_NAME, ACC.ACCOUNT_CODE,
                CASE
                WHEN account_type = 'AKTIVA' THEN BAKT.balance_aktiva_name
                WHEN account_type = 'PASIVA' THEN BPAS.balance_pasiva_name
                END BALANCE_NAME,
                DETJOUR.JOURNAL_AMOUNT, DETJOUR.TYPE_JOURNAL, DETJOUR.JOURNAL_NOTES, DATE_FORMAT(JOUR.JOURNAL_DATE,'%d %M %Y') JOURNAL_DATE
            FROM accounts ACC
            INNER JOIN balance_aktivas BAKT ON ACC.ID_TYPE = BAKT.id
            INNER JOIN balance_pasivas BPAS ON ACC.ID_TYPE = BPAS.id
            INNER JOIN journal_details DETJOUR ON ACC.id = DETJOUR.id_account
            INNER JOIN journals JOUR ON DETJOUR.id_journal = JOUR.id
            WHERE JOURNAL_DATE BETWEEN '$START_DATE_PERIODE' AND '$END_DATE_PERIODE'
        ) X WHERE TYPE_JOURNAL IN ($LIST_TYPE_JOURNAL) AND BALANCE_NAME IN ($LIST_BALANCE_NAME) AND ACCOUNT_NAME IN ($LIST_ACCOUNT_NAME)";

        // echo $SQL;
        $RESULT_FILTERED = DB::select($SQL);

        return response()->json([
            'data' => $RESULT_FILTERED,
            'message' => 'Berhasil mendapatkan data jurnal',
            'status' => 200,
        ]);
    }
}
