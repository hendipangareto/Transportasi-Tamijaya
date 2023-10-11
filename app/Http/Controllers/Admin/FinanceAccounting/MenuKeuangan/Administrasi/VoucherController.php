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
        $make_date = "";
        if (isset($request->date_make)) {
            $make_date = $request->date_make;
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
            ->when(!empty($make_date), function ($query) use ($make_date) {
                $query->where('voucher.tanggal_buat_voucher', $make_date);
            })
            ->get();

        $params = array(
            'nilai_v' => $nilai_v,
            'pic_make' => $pic_make,
            'pic_pengeluar' => $pic_pengeluar,
            'date_make' => $make_date,
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
        //
    }

    public function delete($id)
    {
        //
    }
}
