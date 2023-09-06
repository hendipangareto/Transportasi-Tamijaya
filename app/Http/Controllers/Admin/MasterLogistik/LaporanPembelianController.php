<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

class LaporanPembelianController
{
    public function getLaporanPembelian()
    {
        return view('admin.master-logistik.laporan-pembelian.index');
    }
}
