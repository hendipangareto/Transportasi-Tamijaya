<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Models\MasterDataLogistik\Kategori;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KategoriBarangController
{
    public function getKategoriBarang()
    {
        $kategori = Kategori::get();
        return view('admin.master-logistik.kategori-barang.index', compact('kategori'));
    }

    public function postKategoriBarang(Request $request)
    {
        DB::beginTransaction();
        try {
            $kategori = new Kategori();

            // Mengambil kode kategori terbaru
            $lastNomor = Kategori::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_kategori, -2)) : 0;
            $newNumber = $lastNumber + 1;

            // Membuat kode kategori baru dengan format 'BRG-001'
            $nokategori = 'BRG-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            $kategori->kode_kategori = $nokategori;
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->deskripsi_kategori = $request->deskripsi_kategori;

            $kategori->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data kategori barang', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data kategori barang', 'error']);
        }

        return redirect()->route('master-logistik-list-kategori-barang');
    }



    public function EditKategoriBarang(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.master-logistik.kategori-barang.index', compact('kategori'));
    }

    public function UpdateKategoriBarang(Request $request, $id)
    {


        DB::beginTransaction();
        try {
            $kategori = Kategori::find($id);
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->deskripsi_kategori = $request->deskripsi_kategori;

            $kategori->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data kategori barang', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data kategori barang', 'error']);
        }

        return redirect()->route('master-logistik-list-kategori-barang');
    }

    public function DeleteKategoriBarang(Request $request)
    {

        $kategoriId = $request->input('employee_id');
        $data = Kategori::find($kategoriId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data gaji karyawan',
            'status' => 200,
        ]);

    }

    public function CetakPDF()
    {
        $Kategori = Kategori::get();

        $filename = 'Kategori' . "_" . now()->format('Y_m_d_H_i_s') . '.pdf';

        $pdf = PDF::loadView('admin.master-logistik.kategori-barang.cetak-pdf', ['Kategori' => $Kategori]);

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
