<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;

class KategoriAsetController extends Controller
{
    public function getKategoriAset()
    {
        return view('admin.master-keuangan.aset.kategori-aset.list-kategori-aset');
    }
}
