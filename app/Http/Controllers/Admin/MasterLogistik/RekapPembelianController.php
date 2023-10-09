<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use Illuminate\Http\Request;

class RekapPembelianController extends Controller
{
    public function RekapPembelian()
    {
        $RekapPembelian =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();
//        dd($RekapPembelian);
        return view('admin.master-logistik.rekap-pembelian.index', compact('RekapPembelian'));
    }

    public function DetailRekapPembelian(Request $request, $id)
    {
        $detail = PengajuanPembelian::findOrFail($id);
        $data =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();

//        dd($RekapPembelian);
        return view('admin.master-logistik.rekap-pembelian.detail', compact('detail','data'));
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
