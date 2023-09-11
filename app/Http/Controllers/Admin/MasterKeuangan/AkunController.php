<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;

class AkunController extends Controller
{
    public function getListAkun()
    {
        return view('admin.master-keuangan.akun.list');
    }
}
