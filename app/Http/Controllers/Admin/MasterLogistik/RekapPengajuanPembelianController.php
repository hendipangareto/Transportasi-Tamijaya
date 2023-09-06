<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

class RekapPengajuanPembelianController
{
    public function getRekapPengajuanPembelian()
    {
        return view('admin.master-logistik.pengajuan-pembelian.rekap-pengajuan.index');
    }
}
