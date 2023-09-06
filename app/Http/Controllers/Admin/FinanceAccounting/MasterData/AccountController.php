<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Account;

class AccountController extends Controller
// 
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'account_code' => 'required|max:10|min:1|unique:accounts',
                'account_name' => 'required|max:255|min:1',
            ],
            [
                'account_code.required' => 'Silahkan mengisi data kode',
                'account_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'account_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'account_code.unique' => 'Kode kategori telah digunakan',
                'account_name.required' => 'Silahkan mengisi data nama',
                'account_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'account_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.finance-accounting.master-data.account.index');
    }

    public function create()
    {
        $data = Account::orderBy('id', 'ASC')->get();
        return view('admin.finance-accounting.master-data.account.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Account::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->account_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function show($type)
    {
    }

    public function edit($id)
    {
        $data = Account::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Account::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->account_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Account::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Kode Perkiraan',
            'status' => 200,
        ]);
    }
}
