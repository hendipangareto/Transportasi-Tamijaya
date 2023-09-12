<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;

class MetodePenyusutanController extends Controller
{
    public function getMetodePenyusutan ()
    {
        return view('admin.master-keuangan.metode-penyusutan.list-metode-penyusutan');
    }
}


