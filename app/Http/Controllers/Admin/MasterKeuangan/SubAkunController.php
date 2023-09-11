<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;

class SubAkunController extends Controller
{
    public function getListAkun()
    {
        return view('admin.master-keuangan.sub-akun.list');
    }
}
