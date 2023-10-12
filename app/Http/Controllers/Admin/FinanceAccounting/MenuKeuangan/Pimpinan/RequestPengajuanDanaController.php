<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestPengajuanDanaController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.index');
    }

    public function approvalPengajuan()
    {
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.approval-pengajuan');
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
