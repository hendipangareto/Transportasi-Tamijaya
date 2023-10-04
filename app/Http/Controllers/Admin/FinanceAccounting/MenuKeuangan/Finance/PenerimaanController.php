<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\Penerimaan;
use App\Models\MasterData\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PenerimaanController extends Controller
{
    public function index()
    {
        $bank = Bank::get();

        $data = DB::table('penerimaan')
            ->select('penerimaan.*', 'banks.bank_name', 'banks.bank_code')
            ->join('banks', 'penerimaan.bank_id', 'banks.id')
            ->get();

        return view('admin.finance-accounting.menu-keuangan.finance.penerimaan.index', ['data' => $data, 'bank' => $bank]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = new Penerimaan();

            $data->bank_id = $request->bank_id;
            $data->tanggal_penerimaan = $request->tanggal_penerimaan;
            $data->nominal = $request->nominal;
            $data->pic_name = $request->pic_name;
            $data->description = $request->description;
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil Menambahkan penerimaan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menambahkan penerimaan', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-penerimaan-index');
    }

    public function getBankCode(Request $request)
    {
        $bankCode = $request->input('bank_code');
        $data = DB::table('banks')
            ->select('banks.bank_code')
            ->where('banks.id', '=', $bankCode)
            ->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $data = Penerimaan::findOrFail($id);

            $data->bank_id = $request->edit_bank_id;
            $data->tanggal_penerimaan = $request->edit_tanggal_penerimaan;
            $data->nominal = $request->edit_nominal;
            $data->pic_name = $request->edit_pic_name;
            $data->description = $request->edit_description;
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil update penerimaan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal update penerimaan', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-penerimaan-index');
    }

    public function delete(Request $request)
    {
        $penerimaanId = $request->input('id');
        $data = Penerimaan::find($penerimaanId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data penerimaan',
            'status' => 200,
        ]);
    }
}
