<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function getToko (){
        return view('admin.master-logistik.toko.list-toko');
    }
}
