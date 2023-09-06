<?php

namespace App\Http\Controllers\Admin\MasterLogistik\RekapKeluarMasuk\Masuk;

class LogistikController
{
    public  function getLogistikMasuk()
    {
        return view('admin.master-logistik.rekap-logistik-masuk.logistik-masuk.index');
    }
}
