<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;

class RequestGajiController extends Controller
{
    public function getRequestGaji()
    {
        return view('admin.human-resource.pegawai.request-gaji.list-gaji');
    }
}
