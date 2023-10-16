<?php

namespace App\Http\Controllers\Admin\MarketingTicketing\PetugasPenagihan;

use App\Http\Controllers\Controller;

class LaporanAgentController extends Controller
{
    public function index()
    {

        return view('admin.marketing-ticketing.petugas-penagihan.laporan.index');
    }
}
