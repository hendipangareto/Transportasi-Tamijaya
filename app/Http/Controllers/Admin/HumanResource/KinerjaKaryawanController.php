<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;

class KinerjaKaryawanController extends Controller
{
    public function getKinerjaKaryawan()
    {
        return view('admin.human-resource.pegawai.kinerja-karyawan.list-kinerja');
    }

}
