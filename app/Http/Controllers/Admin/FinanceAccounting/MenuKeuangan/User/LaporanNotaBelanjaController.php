<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanNotaBelanjaController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.user.laporan-nota-belanja.index');
    }

    public function detailNota()
    {
        return view('admin.finance-accounting.menu-keuangan.user.laporan-nota-belanja.detail-nota');
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
