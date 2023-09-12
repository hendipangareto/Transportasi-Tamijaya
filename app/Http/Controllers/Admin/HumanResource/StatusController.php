<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function getListStatus()
    {
        return view('admin.human-resource.status.list-status');
    }
}
