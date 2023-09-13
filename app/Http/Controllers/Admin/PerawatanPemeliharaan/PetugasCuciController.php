<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;

class PetugasCuciController extends Controller
{
    public function  listNotifikasi()
    {
        return view('admin.perawatan-pemeliharaan.petugas-cuci.list-notifikasi');
    }

    public function FormCuci()
    {
        return view('admin.perawatan-pemeliharaan.petugas-cuci.form-cuci');
    }
}
