<?php

namespace App\Http\Controllers\Admin\MarketingTicketing\PetugasPenagihan;

use App\Http\Controllers\Controller;

class TagihanAgentController extends Controller
{
    public function index()
    {

        return view('admin.marketing-ticketing.petugas-penagihan.tagihan-agent.index');
    }

    public function hutangAgent()
    {

        return view('admin.marketing-ticketing.petugas-penagihan.tagihan-agent.hutang-agent');
    }
}
