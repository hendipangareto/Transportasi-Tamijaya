<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanDanaUserController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.user.pengajuan-dana-user.index');
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
