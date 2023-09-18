<?php

namespace App\Http\Controllers\Admin\MasterLogistik;
use App\Models\MasterDataLogistik\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class KategoriBarangController
{
    public function getKategoriBarang()
    {
        $kategori = Kategori::all();
        return view('admin.master-logistik.kategori-barang.index', compact('kategori'));
    }
    public function postKategoriBarang(Request $request)
    {

        // Membuat objek kategori
        $kategori = new Kategori();

        // Mendapatkan nomor kategori terakhir
        $lastNomor = Kategori::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_kategori, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $nokategori = 'BRG-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        // Mengisi atribut-atribut kategori
        $kategori->kode_kategori = $nokategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi_kategori = $request->deskripsi_kategori;

        try{
            $kategori->save();
            return redirect(route('master-logistik-list-kategori-barang'))->with('pesan-berhasil','Anda berhasil menambah data kategori');

        }catch (\Exception $e){
            return redirect(route('master-logistik-list-kategori-barang'))->with('pesan-gagal','Anda gagal menambah data kategori');
        }


    }

    public function EditKategoriBarang(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.master-logistik.kategori-barang.index', compact('kategori'));
    }

    public function UpdateKategoriBarang(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi_kategori = $request->deskripsi_kategori;


        try{
            $kategori->save();
            return redirect(route('master-logistik-list-kategori-barang'))->with('pesan-berhasil','Anda berhasil mengubah data kategori');

        }catch (\Exception $e){
            return redirect(route('master-logistik-list-kategori-barang'))->with('pesan-gagal','Anda gagal mengubah data kategori');
        }
    }

    public function DeleteKategoriBarang($id){
        $kategori = Kategori::find($id);



        try{
            $kategori->delete();
            return redirect(route('master-logistik-list-kategori-barang'))->with('pesan-berhasil','Anda berhasil menghapus data kategori');

        }catch (\Exception $e){
            return redirect(route('master-logistik-list-kategori-barang'))->with('pesan-gagal','Anda gagal menghapus data kategori');
        }
    }
}
