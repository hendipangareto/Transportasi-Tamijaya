<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;

class CheckRutinController extends Controller
{
    public function listCheckArmada()
    {
        return view('admin.perawatan-pemeliharaan.petugas-check-rutin.list-check-armada');
    }
}
