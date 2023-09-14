<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\BengkelLuar;

use App\Http\Controllers\Controller;

class BengkelLuarController extends Controller
{
    public function listBengkelLuar()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-luar.list');
    }
}
