<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

class RekapPembelianController
{
    public function getPembelian()
    {
        return view('admin.master-logistik.pembelian.index');
    }
}
