<?php

namespace App\Http\Controllers\Admin\MarketingTicketing\PemanduPerjalanan\Laporan;

use App\Http\Controllers\Controller;

class RekapLaporanDanaController extends Controller
{
    public function index()
    {

        return view('admin.marketing-ticketing.pemandu-perjalanan.laporan.rekap-laporan-dana.index');
    }
}
