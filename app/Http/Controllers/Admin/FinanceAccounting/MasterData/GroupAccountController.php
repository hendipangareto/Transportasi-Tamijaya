<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\GroupAccount;
use App\Models\MasterData\Account;
use Illuminate\Support\Facades\DB;

class GroupAccountController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.master-data.group-account.index');
    }

    public function create()
    {
        $data = GroupAccount::orderBy('id', 'ASC')->get();
        return view('admin.finance-accounting.master-data.group-account.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // $this->_validation($request);
        $data = GroupAccount::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->group_account_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $all_data_account = Account::select('*', DB::raw('group_accounts.id AS group_id, group_accounts.group_account_name AS group_name'))->leftJoin('group_accounts', function($join) {
        //                         $join->on('accounts.id_group_account', '=', 'group_accounts.id');
        //                     })->get();

        $all_data_account = DB::select('SELECT A.*, G.`id` group_id, G.`group_account_name` group_name FROM accounts A LEFT JOIN group_accounts G ON A.id_group_account = G.id');

        // echo '<pre>',print_r($all_data_account,1),'</pre>';
        // die;
        $selected_data_by_id = Account::orderBy('account_name', 'ASC')
            ->where('id_group_account', $id)
            ->get();
        $selected_all_data = Account::select('id')
            ->whereNotNull('id_group_account')
            ->get();

        $selected_account = [];

        foreach ($selected_data_by_id as $e) {
            array_push($selected_account, $e->id);
        }

        $html = view('admin.finance-accounting.master-data.group-account.display-account', [
            'account_group' => $selected_data_by_id,
            'not_account_group' => $all_data_account,
            'all_data_account' => $all_data_account,
            'selected_all_data' => $selected_all_data,
            'selected_data_by_id' => $selected_data_by_id,
        ])->render();

        return response()->json([
            'html' => $html,
            'all_data_account' => $all_data_account,
            'selected_all_data' => $selected_all_data,
            'selected_account' => $selected_account,
            'status' => 200,
        ]);

        // return response()-> view('admin.finance-accounting.master-data.group-account.display-account', [
        //     "account_group" => $data_selected,
        //     "not_account_group" => $data_not_selected
        // ]);

        // $data = [
        //     "account_group" => $data_selected,
        //     "not_account_group" => $data_not_selected
        // ];
        // return response()->json([
        //     'data' => $data,
        //     'message' => 'Berhasil mendapatkan data Aktiva',
        //     'status' => 200,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = GroupAccount::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
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
        $data = GroupAccount::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->account_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = GroupAccount::findOrFail($id);
    }

    public function updateGroupAccount(Request $request)
    {
        try {
            $group_account_id = $request->group_account_id;
            $submission_account = $request->submission_account;
            if( $group_account_id && $submission_account){
                $updateNull = DB::update("UPDATE ACCOUNTS SET id_group_account = NULL WHERE id_group_account = $group_account_id");
            
                $updateGroupID = DB::update("UPDATE ACCOUNTS SET id_group_account = $group_account_id WHERE id IN ($submission_account)");
            }
            return response()->json([
                'status' => 200,
                'message' => "Success add " . $updateGroupID . " account(s)."
            ]);
            // echo "UPDATE ACCOUNTS SET id_group_account = NULL WHERE id_group_account = $group_account_id";
            // echo "\r\n";
            // echo "UPDATE ACCOUNTS SET id_group_account = $group_account_id WHERE id IN ($submission_account)";
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => $th
            ]);
        }
    }
}
