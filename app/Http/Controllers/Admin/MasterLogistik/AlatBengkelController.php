<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlatBengkelController extends Controller
{
    public function getAlatBengkel(){
        return view('admin.master-logistik.alat-kerja-bengkel.list-alat');
    }
}
