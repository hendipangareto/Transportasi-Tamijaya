<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Kasir;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanDanaDariPemanduController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.kasir.laporan-dana-dari-pemandu.index');
    }

    public function printLaporanPemanduById()
    {
        $filename = 'laporan-dana-dari-pemandu' . "_" . Carbon::create(now())->format('Y_m_d_H_i_s') . '.pdf';
        $pdf = PDF::loadView('admin.finance-accounting.menu-keuangan.kasir.laporan-dana-dari-pemandu.print-pdf');
        $pdf->setPaper('A4', 'portrait');

        #Set Page Number
        $canvas = $pdf->getDomPDF()->get_canvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);
        $canvas->page_text(550 / 2, 820, date('d-m-Y'), null, 8);
        return $pdf->stream($filename);
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
