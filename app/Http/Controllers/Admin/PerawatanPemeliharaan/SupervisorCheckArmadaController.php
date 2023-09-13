<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;

class SupervisorCheckArmadaController extends Controller
{

    public  function listApprovalSparepart()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.list-approval-sparepart');
    }

}
