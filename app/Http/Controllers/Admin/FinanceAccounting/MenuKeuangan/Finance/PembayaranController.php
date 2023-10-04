<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\Pembayaran;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\Penerimaan;
use App\Models\MasterData\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PembayaranController extends Controller
{
    public function index()
    {
        $bank = Bank::get();

        $data = DB::table('pembayaran')
            ->select('pembayaran.*', 'banks.bank_name', 'banks.bank_code')
            ->join('banks', 'pembayaran.bank_id', 'banks.id')
            ->get();

        return view('admin.finance-accounting.menu-keuangan.finance.pembayaran.index', ['data' => $data, 'bank' => $bank]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = new Pembayaran();

            $lastRegistrasi = Pembayaran::orderBy('id', 'desc')->first();
            $lastNumber = $lastRegistrasi ? intval(substr($lastRegistrasi->pengajuan_no, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noPengajuan = 'PG-00-' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $data->pengajuan_no = $noPengajuan;
            $data->bank_id = $request->bank_id;
            $data->tanggal_pengajuan = $request->tanggal_pengajuan;
            $data->nominal_pengajuan = $request->nominal_pengajuan;
            $data->pic_pembayaran = $request->pic_pembayaran;
            $data->description_pembayaran = $request->description_pembayaran;
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil Menambahkan pembayaran', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menambahkan pembayaran', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-pembayaran-index');
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

            $data = Pembayaran::findOrFail($id);

            $data->bank_id = $request->edit_bank_id;
            $data->tanggal_pengajuan = $request->edit_tanggal_pengajuan;
            $data->nominal_pengajuan = $request->edit_nominal_pengajuan;
            $data->pic_pembayaran = $request->edit_pic_pembayaran;
            $data->description_pembayaran = $request->edit_description_pembayaran;
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil update pembayaran', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal update pembayaran', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-finance-pembayaran-index');
    }

    public function delete(Request $request)
    {
        $pembayaranId = $request->input('id');
        $data = Pembayaran::find($pembayaranId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data pembayaran',
            'status' => 200,
        ]);
    }
}
