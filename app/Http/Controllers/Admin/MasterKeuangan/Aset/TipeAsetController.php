<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipeAsetController extends Controller
{
    public function getTipeAset()
    {
        return view('admin.master-keuangan.aset.tipe-aset.list-tipe-aset');
    }

    public function TambahTipeAset(Request $request)
    {

    }
}
