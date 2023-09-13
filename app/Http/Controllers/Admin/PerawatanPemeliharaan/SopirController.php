<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;

class SopirController extends Controller
{
    public function listCheckFisik()
    {
        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan');
    }
}
