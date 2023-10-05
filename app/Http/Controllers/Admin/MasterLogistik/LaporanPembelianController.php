<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Models\MasterDataLogistik\LaporanPembelian;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use Illuminate\Http\Request;

class LaporanPembelianController
{
    public function getLaporanPembelian()
    {
//        $detail = LaporanPembelian::select("laporan_pembelian.*", 'banks.bank_name as bank', 'satuans.nama_satuan as satuan', 'laporan_pembelian.*')
//            ->join('banks', 'banks.id', '=', 'laporan_pembelian.bank_id')
//            ->join('satuans', 'satuans.id', '=', 'laporan_pembelian.satuan_id')
//            ->join('pengajuan_pembelian', 'laporan_pembelian.id', '=', 'laporan_pembelian.pengajuan_pembelian_id')
//            ->get();
        $detail =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();
//        dd($detail);
        return view('admin.master-logistik.laporan-pembelian.index', compact('detail'));
    }

    public function DetailLaporanPembelian(Request $request, $id)
    {

        $detail = PengajuanPembelian::findOrFail($id);
        $data =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();

        return view('admin.master-logistik.laporan-pembelian.detail-pembelian', compact('detail','data'));
    }
}
