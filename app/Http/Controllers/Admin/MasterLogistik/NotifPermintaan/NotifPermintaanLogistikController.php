<?php

namespace App\Http\Controllers\Admin\MasterLogistik\NotifPermintaan;

use App\Http\Controllers\Controller;

class NotifPermintaanLogistikController extends Controller
{
    public function index()
    {

        return view('admin.master-logistik.notif-permintaan-logistik.index');
    }
}
