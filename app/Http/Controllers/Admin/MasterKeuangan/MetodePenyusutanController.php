<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\MetodePenyusutan;
use Illuminate\Http\Request;;
use Barryvdh\DomPDF\Facade as PDF;
class MetodePenyusutanController extends Controller
{
    public function getMetodePenyusutan ()
    {
        $MetodePenyusutan = MetodePenyusutan::get();
//        dd($MetodePenyusutan);
        return view('admin.master-keuangan.metode-penyusutan.list-metode-penyusutan', compact('MetodePenyusutan'));
    }

    public function TambahMetodePenyusutan(Request $request)
    {
        $MetodePenyusutan = new MetodePenyusutan();
        $lastNomor = MetodePenyusutan::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_metode_penyusutan, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $nokategori = 'MP-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);


        $MetodePenyusutan->kode_metode_penyusutan = $nokategori;
        $MetodePenyusutan->nama_metode_penyusutan = $request->nama_metode_penyusutan;
        $MetodePenyusutan->keterangan_metode_penyusutan = $request->keterangan_metode_penyusutan;

//        dd($MetodePenyusutan);
        try {
            $MetodePenyusutan->save();
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-berhasil', 'Anda berhasil menambah data metode penyusutan');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-gagal', 'Anda gagal menambah data metode penyusutan');
        }
    }

    public function UpdateMetodePenyusutan(Request $request, $id)
    {
        $MetodePenyusutan = MetodePenyusutan::findOrFail($id);

        $MetodePenyusutan->nama_metode_penyusutan = $request->nama_metode_penyusutan;
        $MetodePenyusutan->keterangan_metode_penyusutan = $request->keterangan_metode_penyusutan;

//        dd($MetodePenyusutan);
        try {
            $MetodePenyusutan->save();
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-berhasil', 'Anda berhasil mengubah data metode penyusutan');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-gagal', 'Anda gagal mengubah data metode penyusutan');
        }
    }

    public function DeleteMetodePenyusutan($id)
    {
        $MetodePenyusutan = MetodePenyusutan::findOrFail($id);

        try {
            $MetodePenyusutan->delete();
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-berhasil', 'Anda berhasil menghapus data metode penyusutan');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.metode-penyusutan.list-metode-penyusutan'))->with('pesan-gagal', 'Anda gagal menghapus data metode penyusutan');
        }
    }


    public function PenyusutanPDF()
    {
        $MetodePenyusutan = MetodePenyusutan::get();

        $filename = 'Kategori' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.master-keuangan.metode-penyusutan.cetak-pdf', ['MetodePenyusutan' => $MetodePenyusutan]);

        $pdf->setPaper('A4', 'portrait');

        // Set Page Number
        $canvas = $pdf->getDomPDF()->getCanvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);


        $canvas->page_text(550 / 2, 820, now()->format('d-m-Y'), null, 8);
        $canvas->page_text(550 / 16, 820, 'PT Anugerah Karya Utami Gemilang', null, 8);
        return $pdf->stream($filename);
    }

}





