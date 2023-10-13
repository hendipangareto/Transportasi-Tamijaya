<?php

namespace App\Http\Controllers\Admin\MasterLogistik\NotifPerbaikanBengkel;

use App\Http\Controllers\Controller;

class NotifPerbaikanBengkelLuarController extends Controller
{
    public function index()
    {

        return view('admin.master-logistik.notif-perbaikan-bengkel-luar.index');
    }
}
