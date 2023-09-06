<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\BalancePasiva;
use App\Models\MasterData\Account;

class BalancePasivaController extends Controller
{

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'balance_pasiva_code' => 'required|max:10|min:1|unique:balance_pasivas',
                'balance_pasiva_name' => 'required|max:255|min:1',
            ],
            [
                'balance_pasiva_code.required' => 'Silahkan mengisi data kode',
                'balance_pasiva_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'balance_pasiva_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'balance_pasiva_code.unique' => 'Kode kategori telah digunakan',
                'balance_pasiva_name.required' => 'Silahkan mengisi data nama',
                'balance_pasiva_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'balance_pasiva_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.finance-accounting.master-data.balance-pasiva.index');
    }

    public function create()
    {
        $data = BalancePasiva::orderBy('id', 'ASC')->get();
        return view('admin.finance-accounting.master-data.balance-pasiva.display', ['data' => $data]);
        //
    }
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = BalancePasiva::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->balance_pasiva_name,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function show($type, $id = null)
    {
        $data = Account::where('account_type', null)->get();
        if ($type == "account") {
            return view('admin.finance-accounting.master-data.balance-pasiva.display-account', ['data' => $data]);
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
        $data = BalancePasiva::findOrFail($id);
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
        BalancePasiva::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Neraca Pasiva',
            'status' => 200,
        ]);
    }

    // TAMBAHAN

    public function getAccountByPasiva($id)
    {
        $data = Account::orderBy('account_name', 'ASC')->where('id_type', $id)->where('account_type', 'PASIVA')->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mendapatkan data Pasiva',
            'status' => 200,
        ]);
    }

    public function removePasiva($id)
    {
        $data = Account::orderBy('account_name', 'ASC')->where('id_type', $id)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus mendapatkan data Aktiva',
            'status' => 200,
        ]);
    }

    public function submitAccountPasiva(Request $request, $id_pasiva)
    {
        $array_target = $request->submission_target;
        foreach ($array_target as $id) {
            $data = Account::findOrFail($id);
            $data->update(['account_type' => 'PASIVA', 'id_type' => $id_pasiva]);
        }
    }
}
