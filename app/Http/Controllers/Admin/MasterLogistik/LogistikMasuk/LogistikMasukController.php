<?php

namespace App\Http\Controllers\Admin\MasterLogistik\LogistikMasuk;

use App\Http\Controllers\Controller;

class LogistikMasukController extends Controller
{
    public  function index()
    {
        return view('admin.master-logistik.logistik-masuk.index');
    }
}
