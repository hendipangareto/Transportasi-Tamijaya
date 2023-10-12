<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Administrasi\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $nilai_v = "";
        if (isset($request->nilai_v)) {
            $nilai_v = $request->nilai_v;
        }
        $pic_make = "";
        if (isset($request->pic_make)) {
            $pic_make = $request->pic_make;
        }
        $pic_pengeluar = "";
        if (isset($request->pic_pengeluar)) {
            $pic_pengeluar = $request->pic_pengeluar;
        }
        $date_make = "";
        if (isset($request->date_make)) {
            $date_make = $request->date_make;
        }
        $date_keluar = "";
        if (isset($request->date_keluar)) {
            $date_keluar = $request->date_keluar;
        }

        $voucher = DB::table('voucher')
            ->select('voucher.*')
            ->when(!empty($nilai_v), function ($query) use ($nilai_v) {
                $query->where('voucher.nilai_voucher', $nilai_v);
            })
            ->when(!empty($pic_make), function ($query) use ($pic_make) {
                $query->where('voucher.pic_pembuat', $pic_make);
            })
            ->when(!empty($pic_pengeluar), function ($query) use ($pic_pengeluar) {
                $query->where('voucher.pic_pengeluar_voucher', $pic_pengeluar);
            })
            ->when($request->date_make, function ($query) use ($request) {
                $query->where('tanggal_buat_voucher', $request->date_make);
            })
            ->when($request->date_keluar, function ($query) use ($request) {
                $query->where('tanggal_keluar_voucher', $request->date_keluar);
            })
            ->get();

        $params = array(
            'nilai_v' => $nilai_v,
            'pic_make' => $pic_make,
            'pic_pengeluar' => $pic_pengeluar,
            'date_make' => $request->date_make,
            'date_keluar' => $request->date_keluar,
        );

        return view('admin.finance-accounting.menu-keuangan.administrasi.voucher.index', ['voucher' => $voucher, 'params' => $params]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $voucher = new Voucher();

            $lastRegistrasi = Voucher::orderBy('id', 'desc')->first();
            $lastNumber = $lastRegistrasi ? intval(substr($lastRegistrasi->kode_voucher, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $codeVoucher = 'VCH-' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $voucher->kode_voucher = $codeVoucher;
            $voucher->nilai_voucher = $request->nilai_voucher;
            $voucher->tanggal_buat_voucher = $request->tanggal_buat_voucher;
            $voucher->pic_pembuat = $request->pic_pembuat;
            $voucher->Jumlah_voucher_dibuat = $request->Jumlah_voucher_dibuat;
            $voucher->tanggal_keluar_voucher = $request->tanggal_keluar_voucher;
            $voucher->pic_pengeluar_voucher = $request->pic_pengeluar_voucher;
            $voucher->jumlah_voucher_keluar = $request->jumlah_voucher_keluar;
//            dd($voucher);
            $voucher->save();

            DB::commit();
            Session::flash('message', ['Berhasil menambah voucher', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menambah voucher', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-administrasi-voucher-index');
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $voucher = Voucher::findOrFail($id);

            $voucher->nilai_voucher = $request->edit_nilai_voucher;
            $voucher->tanggal_buat_voucher = $request->edit_tanggal_buat_voucher;
            $voucher->pic_pembuat = $request->edit_pic_pembuat;
            $voucher->Jumlah_voucher_dibuat = $request->edit_Jumlah_voucher_dibuat;
            $voucher->tanggal_keluar_voucher = $request->edit_tanggal_keluar_voucher;
            $voucher->pic_pengeluar_voucher = $request->edit_pic_pengeluar_voucher;
            $voucher->jumlah_voucher_keluar = $request->edit_jumlah_voucher_keluar;
            $voucher->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah voucher', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal meengubah voucher', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-administrasi-voucher-index');
    }

    public function delete(Request $request)
    {
        $voucherId = $request->input('id');
        $data = Voucher::find($voucherId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data voucher',
            'status' => 200,
        ]);
    }
}
