<?php

namespace App\Http\Controllers\Admin\MarketingTicketing\PemanduPerjalanan;

use App\Http\Controllers\Controller;

class PerjalananBusRegulerController extends Controller
{
    public function index()
    {

        return view('admin.marketing-ticketing.pemandu-perjalanan.perjalanan-bus-reguler.index');
    }
}
