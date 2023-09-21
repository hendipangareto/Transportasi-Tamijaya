<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\KategoriPajak;
use Illuminate\Http\Request;
class KategoriPajakController extends Controller
{
    public function getKategoriPajak()
    {
        $kategoripajak = KategoriPajak::all();
        dd($kategoripajak);
        return view('admin.master-keuangan.kategori-pajak.list-kategori-pajak', 'kategoripajak');
    }


}
