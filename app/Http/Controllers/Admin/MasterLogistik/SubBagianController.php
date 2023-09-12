<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubBagianController extends Controller
{
    public function getSubBagian(){
        return view('admin.master-logistik.sub-bagian.list-bagian');
    }
}
