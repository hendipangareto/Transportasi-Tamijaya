<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\KategoriPajak;
use App\Models\MasterKeuangan\MetodePenyusutan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class KategoriPajakController extends Controller
{
    public function getKategoriPajak(Request $request)
    {
        $MetodePenyusutan = MetodePenyusutan::get();

        $id_metode_penyusutan = "";
        if (isset($request->id_metode_penyusutan)) {
            $id_metode_penyusutan = $request->id_metode_penyusutan;
        }

        $params = [
            'id_metode_penyusutan' => $id_metode_penyusutan,
        ];


        $KategoriPajak= KategoriPajak::select("kategori_pajaks.*", 'metode_penyusutans.nama_metode_penyusutan as metode_penyusutan')
            ->join('metode_penyusutans', 'metode_penyusutans.id', '=', 'kategori_pajaks.id_metode_penyusutan')
            ->orderBy('metode_penyusutans.id')
            ->when(!empty($id_metode_penyusutan), function ($query) use ($id_metode_penyusutan) {
                $query->where('kategori_pajaks.id_metode_penyusutan', $id_metode_penyusutan);
            })
            ->get();
//        dd($KategoriPajak);

        return view('admin.master-keuangan.kategori-pajak.list-kategori-pajak', compact('KategoriPajak', 'MetodePenyusutan', 'params'));
    }

    public function TambahKategoriPajak(Request $request)
    {
        $kategoripajak = new KategoriPajak();
        $lastNomor = KategoriPajak::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_kategori_pajak, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noKategoriPajak = 'KPJ-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);


        $kategoripajak->kode_kategori_pajak = $noKategoriPajak;
        $kategoripajak->nama_kategori_pajak = $request->nama_kategori_pajak;
        $kategoripajak->id_metode_penyusutan = $request->id_metode_penyusutan;
        $kategoripajak->tahun_pajak = $request->tahun_pajak;
        $kategoripajak->tarif_pajak = $request->tarif_pajak;
        $kategoripajak->deskripsi_pajak = $request->deskripsi_pajak;

//        dd($kategoripajak);
        try {
            $kategoripajak->save();
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-berhasil', 'Anda berhasil menambah data kategori pajak');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-gagal', 'Anda gagal menambah data kategori pajak');
        }
    }

    public function UpdateKategoriPajak(Request $request, $id)
    {
        $kategoripajak = KategoriPajak::findOrFail($id);

        $kategoripajak->nama_kategori_pajak = $request->nama_kategori_pajak;
        $kategoripajak->id_metode_penyusutan = $request->id_metode_penyusutan;
        $kategoripajak->tahun_pajak = $request->tahun_pajak;
        $kategoripajak->tarif_pajak = $request->tarif_pajak;
        $kategoripajak->deskripsi_pajak = $request->deskripsi_pajak;

//        dd($kategoripajak);
        try {
            $kategoripajak->update();
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-berhasil', 'Anda berhasil mengubah data kategori pajak');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-gagal', 'Anda gagal mengubah data kategori pajak');
        }
    }

    public function DeleteKategoriPajak($id)
    {
        $kategoripajak = KategoriPajak::findOrFail($id);

        try {
            $kategoripajak->delete();
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-berhasil', 'Anda berhasil menghapus data kategori pajak');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-gagal', 'Anda gagal menghapus data kategori pajak');
        }
    }


    public function PdfPajak()
    {
        $id_metode_penyusutan = request()->metode_penyusutan;

        $KategoriPajak= KategoriPajak::select("kategori_pajaks.*", 'metode_penyusutans.nama_metode_penyusutan as metode_penyusutan')
            ->join('metode_penyusutans', 'metode_penyusutans.id', '=', 'kategori_pajaks.id_metode_penyusutan')
            ->orderBy('metode_penyusutans.id')
            ->when(!empty($id_metode_penyusutan), function ($query) use ($id_metode_penyusutan) {
                $query->where('kategori_pajaks.id_metode_penyusutan', $id_metode_penyusutan);
            })
            ->get();
        $filename = 'KategoriPajak' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.master-keuangan.kategori-pajak.cetak-pdf', compact('KategoriPajak') );

        $pdf->setPaper('A4', 'portrait');

        // Set Page Number
        $canvas = $pdf->getDomPDF()->getCanvas();
        $pdf->getDomPDF()->set_option('isPhpEnabled', true);
        $canvas->page_text(550, 820, "Page {PAGE_NUM}", null, 8);


        $canvas->page_text(550 / 2, 820, now()->format('d-m-Y'), null, 8);
        $canvas->page_text(550 / 16, 820,  'PT Anugerah Karya Utami Gemilang', null, 8);
        return $pdf->stream($filename);
    }
}
