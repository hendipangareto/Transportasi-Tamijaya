<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\BengkelLuar;

use App\Http\Controllers\Controller;

class LaporanPerbaikanController extends Controller
{
    public function LaporanPerbaikan ()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-luar.laporan-perbaikan');
    }


}
