<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\BengkelDalam;

use App\Http\Controllers\Controller;

class BengkelDalamController extends Controller
{
    public function PengajuanLogistikDalam()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-dalam.list');
    }


}
