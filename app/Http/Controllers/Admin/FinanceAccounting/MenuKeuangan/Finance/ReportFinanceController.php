<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Finance;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class ReportFinanceController extends Controller
{
    public function index()
    {
        return view('admin.finance-accounting.menu-keuangan.finance.report-finance.index');
    }

    public function reportPdfJurnalUmum()
    {
        $filename = 'jurnal-umum' . "_" . Carbon::create(now())->format('Y_m_d_H_i_s') . '.pdf';
        $pdf = PDF::loadView('admin.finance-accounting.menu-keuangan.finance.report-finance.pdf.jurnal-umum.pdf');
        $pdf->setPaper('A4', 'portrait');

        #Set Page Number
        $canvas = $pdf->getDomPDF()->get_canvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);
        $canvas->page_text(550 / 2, 820, date('d-m-Y'), null, 8);
        return $pdf->stream($filename);
    }
}
