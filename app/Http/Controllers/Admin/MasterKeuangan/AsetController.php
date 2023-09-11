<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;

class AsetController extends Controller
{
    public function getListAset()
    {
        return view('admin.master-keuangan.aset.data-aset');
    }

    public function getTambahDataAset()
    {
        return view('admin.master-keuangan.aset.tambah-data-aset');
    }


    //Tipe Asset
    public function getTipeAset()
    {
        return view('admin.master-keuangan.aset.tipe-aset');
    }
}
