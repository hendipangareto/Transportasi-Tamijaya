<?php

namespace App\Http\Controllers\Admin\MarketingTicketing\PemanduPerjalanan\ChecklistPenumpang;

use App\Http\Controllers\Controller;

class ExecutiveController extends Controller
{
    public function index()
    {
        return view('admin.marketing-ticketing.pemandu-perjalanan.checklist-penumpang.executive.index');
    }
}
