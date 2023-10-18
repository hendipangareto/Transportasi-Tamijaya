<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Models\MasterDataLogistik\QsActual;

class RekapPengajuanPembelianController
{
    public function getRekapPengajuanPembelian()
    {
        $terpilih =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 2)
            ->get();
        return view('admin.master-logistik.pengajuan-pembelian.rekap-pengajuan.index', compact('terpilih'));
    }
}
