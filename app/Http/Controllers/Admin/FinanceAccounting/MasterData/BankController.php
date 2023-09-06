<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Bank;

class BankController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'bank_code' => 'required|max:10|min:1|unique:banks',
                'bank_name' => 'required|max:255|min:1',
            ],
            [
                'bank_code.required' => 'Silahkan mengisi data kode',
                'bank_code.min' => 'Kode minimal 1 karakter alfanumerik',
                'bank_code.max' => 'Kode maksimal 10 karakter alfanumerik',
                'bank_code.unique' => 'Kode kategori telah digunakan',
                'bank_name.required' => 'Silahkan mengisi data nama',
                'bank_name.min' => 'Nama minimal 1 karakter alfanumerik',
                'bank_name.max' => 'Nama maksimal 255 karakter alfanumerik'
            ]
        );
    }

    public function index()
    {
        return view('admin.finance-accounting.master-data.bank.index');
    }

    public function create()
    {
        $data = Bank::orderBy('id', 'ASC')->get();
        return view('admin.finance-accounting.master-data.bank.display', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Bank::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menambahkan data ' . $data->bank_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    
    public function show($type)
    {
        $count = Bank::count();
        if ($count > 0) {
            $last_data =  Bank::latest('id')->first();
            $last_data_code = substr($last_data->data_code, -3);
            if (str_contains($last_data_code, "00")) {
                $sequence = substr($last_data_code, -1) + 1;
            } else if (str_contains($last_data_code, "0")) {
                $sequence = substr($last_data_code, -2) + 1;
            } else {
                $sequence =  $last_data->id + 1;
            }
        } else {
            $sequence =  1;
        }

        $output = '';
        if ($sequence == 1) {
            $sequence = 1;
        }
        if (strlen($sequence) == 1) {
            $output = '00' . $sequence;
        } else if (strlen($sequence) == 2) {
            $output = '0' . $sequence;
        } else {
            $output = $sequence;
        }
        $code_data = "BNK-" . $output;
        return response()->json([
            'data' => $code_data,
            'status' => 200,
        ]);
    }

    public function edit($id)
    {
        $data = Bank::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = Bank::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Berhasil mengubah data ' . $data->bank_name,
            'status' => $data ? 200 : 400,
        ]);
    }
    public function destroy($id)
    {
        Bank::destroy($id);
        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data Bank',
            'status' => 200,
        ]);
    }
}
