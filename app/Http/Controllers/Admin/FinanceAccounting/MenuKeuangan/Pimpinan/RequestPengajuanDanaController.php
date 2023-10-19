<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\Finance\Pimpinan;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use App\Models\MasterDataLogistik\QsActual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RequestPengajuanDanaController extends Controller
{
    public function index()
    {
//        $dataPengajuanPembelian = Pimpinan::select("pimpinan.*", 'pengajuan_pembelian.*')
//            ->join('pengajuan_pembelian', 'pimpinan.pengajuan_pembelian_id', '=', 'pengajuan_pembelian.id')
//            ->get();
        $terpilih =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 2)
            ->get();
//        dd($terpilih);
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.index', compact('terpilih'));
    }

    public function detail(Request $request, $id)
    {
//        $terpilih = QsActual::findOrFail($id);
        $terpilih =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 2)
            ->get();

//        dd($terpilih);
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.approval-pengajuan', compact('terpilih'));
    }

//    public function DisetujuiPengajuanPembelian($id)
//    {
//        PengajuanPembelian::where('id',$id)->update(['status'=>3]);
//        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
//    }
//
//    public function DitolakPengajuanPembelian($id)
//    {
//        PengajuanPembelian::where('id',$id)->update(['status'=>4]);
//        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
//    }

    public function DisetujuiPengajuanPembelian($id)
    {
        $pengajuan = PengajuanPembelian::find($id);
        if($pengajuan){
            $pengajuan->update(['status' => 3]);
        }
        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
    }

    public function DitolakPengajuanPembelian($id)
    {
        $pengajuan = PengajuanPembelian::find($id);
        if($pengajuan){
            $pengajuan->update(['status' => 4]);
        }
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
