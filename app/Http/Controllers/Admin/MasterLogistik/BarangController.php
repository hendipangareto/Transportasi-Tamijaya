<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

class BarangController
{
    public function getListBarang()
    {
        return view('admin.master-logistik.barang.index');
    }
}
