<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\JurnalUmum;
use App\Models\MasterData\GroupAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $groupAccount = GroupAccount::get();

        $data = DB::table('jurnal_umum')
            ->select('jurnal_umum.*', 'group_accounts.group_account_name', 'group_accounts.group_account_code')
            ->join('group_accounts', 'jurnal_umum.group_account_id', 'group_accounts.id')
            ->get();

        return view('admin.finance-accounting.menu-keuangan.finance.jurnal-umum.index', ['data' => $data, 'groupAccount' => $groupAccount]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'document' => 'required|mimes:pdf,doc,docx,xlsx|max:2048',
            ]);

            $data = new JurnalUmum();

            $data->tanggal = $request->tanggal_jurnal;
            $data->tipe_transaksi = $request->tipe_jurnal;
            $data->group_account_id = $request->group_akun_name;
            $data->jenis_debit_credit = $request->jenis_debit_credit;
            $data->nilai_debit_credit = $request->nilai_debit_credit;
            $data->description = $request->description_jurnal;

            $request->file('document')->store('public');
            $dokNames = $request->file('document')->hashName();
            $data->document = $dokNames;

            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil Menambahkan jurnal', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menambahkan jurnal', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-jurnal-umum-index');
    }

    public function getCodeGroupAccount(Request $request)
    {
        $groupAkunCode = $request->input('group_account_code');
        $data = DB::table('group_accounts')
            ->select('group_accounts.group_account_code')
            ->where('group_accounts.id', '=', $groupAkunCode)
            ->first();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $data = JurnalUmum::findOrFail($id);

            $data->tanggal = $request->edit_tanggal_jurnal;
            $data->tipe_transaksi = $request->edit_tipe_jurnal;
            $data->group_account_id = $request->edit_group_akun_name;
            $data->jenis_debit_credit = $request->edit_jenis_debit_credit;
            $data->nilai_debit_credit = $request->edit_nilai_debit_credit;
            $data->description = $request->edit_description_jurnal;
            $data->document = $request->edit_dokumen;
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah jurnal', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah jurnal', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-jurnal-umum-index');
    }

    public function delete(Request $request)
    {
        $jurnalId = $request->input('id');
        $data = JurnalUmum::find($jurnalId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data jurnal',
            'status' => 200,
        ]);
    }
}
