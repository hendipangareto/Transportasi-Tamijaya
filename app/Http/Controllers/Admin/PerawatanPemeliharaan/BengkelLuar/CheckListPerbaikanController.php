<?php

namespace App\Http\Controllers\Admin\PerawatanPemeliharaan\BengkelLuar;

use App\Http\Controllers\Controller;

class CheckListPerbaikanController extends Controller
{
    public function checklistPerbaikan()
    {
        return view('admin.perawatan-pemeliharaan.supervisor-check-armada.bengkel-luar.list-perbaikan');
    }
}
