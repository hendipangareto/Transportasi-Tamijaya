<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BengkelLuarController extends Controller
{
    public function getBengkelLuar()
    {
        return view('admin.master-logistik.bengkel-luar.list-bengkel-luar');
    }
}
