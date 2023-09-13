<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;

class SupervisorCuciController extends Controller
{
    public function listApproval()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-cuci-mobil.list-approval-laporan');
    }

    public function ReportCuci()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-cuci-mobil.report-cuci');
    }
}
