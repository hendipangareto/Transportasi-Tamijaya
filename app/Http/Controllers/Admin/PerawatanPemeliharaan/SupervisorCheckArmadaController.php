<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;

class SupervisorCheckArmadaController extends Controller
{
    public  function listApprovalSparepart()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.approval-sparepart.list');
    }

    public function listApprovalLogistik ()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.approval-logistik-perjalanan.list');
    }

    public function listPenentuanBengkel()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.penentuan-bengkel-luar-dalam.list');
    }

}
