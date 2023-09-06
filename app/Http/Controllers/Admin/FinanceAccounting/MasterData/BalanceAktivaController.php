<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\BalanceAktiva;
use App\Models\MasterData\Account;

class BalanceAktivaController extends Controller
{

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'balance_aktiva_code' => 'required|max:10|min:1|unique:balance_aktivas',
                'balance_aktiva_name' => 'required|max:255|min:1',
            ],
            [
                'balance_aktiva_code.required' => 'Silahkan mengisi data kode',
                'balance_aktiva_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'balance_aktiva_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'balance_aktiva_code.unique' => 'Kode kategori telah digunakan',
                'balance_aktiva_name.required' => 'Silahkan mengisi data nama',
                'balance_aktiva_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'balance_aktiva_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.finance-accounting.master-data.balance-aktiva.index');
    }

    public function create()
    {
        $data = BalanceAktiva::orderBy('id', 'ASC')->get();
        return view('admin.finance-accounting.master-data.balance-aktiva.display', ['data' => $data]);
        //
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = BalanceAktiva::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->balance_aktiva_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function show($type, $id = null)
    {
        $data = Account::where('account_type', null)->get();
        if ($type == "account") {
            return view('admin.finance-accounting.master-data.balance-aktiva.display-account', ['data' => $data]);
        } else if (str_contains($type, 'remove')) {
            $arr_ex = explode("-", $type);
            $id = $arr_ex[1];
            $data = Account::findOrFail($id);
            $data->update(['account_type' => null, 'id_type' => null]);
            echo json_encode($data);
        }
    }

    public function edit($id)
    {
        $data = BalanceAktiva::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function update(Request $request, $type)
    {
    }

    public function destroy($id)
    {
        BalanceAktiva::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Neraca Aktiva',
            'status' => 200,
        ]);
    }

    // TAMBAHAN

    public function getAccountByAktiva($id)
    {
        
        $data = Account::orderBy('account_name', 'ASC')->where('id_type', $id)->where('account_type', 'AKTIVA')->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mendapatkan data Aktiva',
            'status' => 200,
        ]);
    }

    public function removeAktiva($id)
    {
        $data = Account::orderBy('account_name', 'ASC')->where('id_type', $id)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus mendapatkan data Aktiva',
            'status' => 200,
        ]);
    }

    public function submitAccountAktiva(Request $request, $id_aktiva)
    {
        $array_target = $request->submission_target;
        foreach ($array_target as $id) {
            $data = Account::findOrFail($id);
            $data->update(['account_type' => 'AKTIVA', 'id_type' => $id_aktiva]);
        }
    }
}
