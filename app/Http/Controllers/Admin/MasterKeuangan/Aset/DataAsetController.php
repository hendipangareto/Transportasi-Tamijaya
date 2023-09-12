<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;

class DataAsetController extends Controller
{
    public function getListAset()
    {
        return view('admin.master-keuangan.aset.data-aset.list-data-aset');
    }

    public function getTambahDataAset()
    {
        return view('admin.master-keuangan.aset.data-aset.tambah');
    }


    //Tipe Asset
    public function getTipeAset()
    {
        return view('admin.master-keuangan.aset.tipe-aset');
    }
}
