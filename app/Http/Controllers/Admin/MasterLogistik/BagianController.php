<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function getListBagian(){
        return view('admin.master-logistik.bagian.list-bagian');
    }
}
