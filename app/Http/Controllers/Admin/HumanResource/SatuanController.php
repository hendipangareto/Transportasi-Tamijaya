<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;

class SatuanController extends Controller
{
    public function getListSatuan()
    {
        return view('admin.human-resource.satuan.list-satuan');
    }

}
