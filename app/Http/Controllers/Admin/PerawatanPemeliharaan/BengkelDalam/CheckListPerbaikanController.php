<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\BengkelDalam;

use App\Http\Controllers\Controller;

class CheckListPerbaikanController extends Controller
{
    public function checklistPerbaikan()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-dalam.checklist-perbaikan-bengkel');
    }
}
