<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;

class KategoriPajakController extends Controller
{
    public function getKategoriPajak()
    {
        return view('admin.master-keuangan.kategori-pajak.list-kategori-pajak');
    }
}
