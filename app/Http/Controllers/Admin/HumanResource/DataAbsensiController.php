<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;

class DataAbsensiController extends Controller
{
    public function getDataAbsensi()
    {
        return view('admin.human-resource.pegawai.data-absensi.list-absensi');
    }
}
