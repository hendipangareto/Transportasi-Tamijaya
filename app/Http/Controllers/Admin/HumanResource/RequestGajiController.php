<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestGajiController extends Controller
{
    public function getRequestGaji()
    {
        return view('admin.human-resource.pegawai.request-gaji.list-gaji');
    }

    public function getFormTambah()
    {
        return view('admin.human-resource.pegawai.request-gaji.form-tambah');
    }
    public function getFormEdit(Request $request)
    {
        return view('admin.human-resource.pegawai.request-gaji.form-edit');
    }
}
