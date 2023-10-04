<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;

class RekapPembelianController extends Controller
{
    public function RekapPembelian()
    {
        return view('admin.master-logistik.rekap-pembelian.index');
    }
}
