<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\MetodePenyusutan;

class MetodePenyusutanController extends Controller
{
    public function getMetodePenyusutan ()
    {
        $MetodePenyusutan = MetodePenyusutan::all();
        return view('admin.master-keuangan.metode-penyusutan.list-metode-penyusutan');
    }
}


