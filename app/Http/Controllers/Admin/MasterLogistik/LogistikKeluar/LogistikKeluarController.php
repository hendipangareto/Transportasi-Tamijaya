<?php

namespace App\Http\Controllers\Admin\MasterLogistik\LogistikKeluar;

use App\Http\Controllers\Controller;

class LogistikKeluarController extends Controller
{
    public  function index()
    {
        return view('admin.master-logistik.logistik-keluar.index');
    }
}
