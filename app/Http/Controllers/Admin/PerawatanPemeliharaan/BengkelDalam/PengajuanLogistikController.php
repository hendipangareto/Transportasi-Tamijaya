<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\BengkelDalam;

use App\Http\Controllers\Controller;

class PengajuanLogistikController extends Controller
{
    public function PengajuanLogistikDalam()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-dalam.pengajuan-logistik');
    }
}
