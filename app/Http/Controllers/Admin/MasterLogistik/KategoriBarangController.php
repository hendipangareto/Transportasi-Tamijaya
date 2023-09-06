<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

class KategoriBarangController
{
    public function getKategoriBarang()
    {
        return view('admin.master-logistik.kategori-barang.index');
    }
}
