<?php

namespace App\Http\Controllers\Admin\TataKelola;

use App\Http\Controllers\Controller;

class DokumenFinalController extends Controller
{
    public function getDokumen()
    {
        return view('admin.tata-kelola.surat-menyurat.dokumen-final.list');
    }
}
