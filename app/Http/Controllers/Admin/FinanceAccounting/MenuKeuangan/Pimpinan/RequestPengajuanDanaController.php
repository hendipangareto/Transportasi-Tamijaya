<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\Pimpinan;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RequestPengajuanDanaController extends Controller
{
    public function index()
    {
        $dataPengajuanPembelian = Pimpinan::select("pimpinan.*", 'pengajuan_pembelian.*')
            ->join('pengajuan_pembelian', 'pimpinan.pengajuan_pembelian_id', '=', 'pengajuan_pembelian.id')
            ->get();
//        dd($dataPengajuanPembelian);
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.index', compact('dataPengajuanPembelian'));
    }

    public function DisetujuiPengajuanPembelian($id)
    {
        PengajuanPembelian::where('id',$id)->update(['status'=>1]);
        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
    }

    public function DitolakPengajuanPembelian($id)
    {
        PengajuanPembelian::where('id',$id)->update(['status'=>2]);
        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
    }
    public function approvalPengajuan()
    {
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.approval-pengajuan');
    }

    public function store(Request $request)
    {
        //
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
