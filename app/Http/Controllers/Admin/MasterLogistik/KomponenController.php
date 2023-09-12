<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomponenController extends Controller
{
    public function getKomponen(){
        return view('admin.master-logistik.komponen.list-komponen');
    }
}
