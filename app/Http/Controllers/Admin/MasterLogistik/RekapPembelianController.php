<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use App\Models\MasterDataLogistik\QsActual;
use Illuminate\Http\Request;

class RekapPembelianController extends Controller
{
    public function RekapPembelian()
    {

        $terpilih =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 3)
            ->get();
//        dd($RekapPembelian);
        return view('admin.master-logistik.rekap-pembelian.index', compact('terpilih'));
    }

    public function DetailRekapPembelian(Request $request, $id)
    {
        $terpilih = QsActual::findOrFail($id);
        $detail =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 3)
            ->get();

//        dd($terpilih);
        return view('admin.master-logistik.rekap-pembelian.detail', compact('detail','terpilih'));
    }

    public function setujuiPengajuanPembelian($id)
    {
        PengajuanPembelian::where('id',$id)->update(['status'=>1]);
        return redirect()->route('master-logistik-list-rekap-pembelian');
    }

    public function TolakPengajuanPembelian($id)
    {
        PengajuanPembelian::where('id',$id)->update(['status'=>2]);
        return redirect()->route('master-logistik-list-rekap-pembelian');
    }
}
