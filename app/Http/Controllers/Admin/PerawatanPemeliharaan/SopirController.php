<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class SopirController extends Controller
{
    public function listCheckFisik()
    {
        return view('admin.perawatan-pemeliharaan.sopir.check-fisik-layanan');
    }

    public function ReportPerjalanan()
    {
        return view('admin.perawatan-pemeliharaan.sopir.report-perjalanan');
    }



}
