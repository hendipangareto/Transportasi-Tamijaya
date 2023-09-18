<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterDataLogistik\Bagian;
class BagianController extends Controller
{
    public function getListBagian(){
        $bagian = Bagian::all();
        return view('admin.master-logistik.bagian.list-bagian', compact('bagian'));
    }

    public function TambahBagian(Request $request)
    {
        $bagian = new Bagian();
        $lastNomor = Bagian::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_bagian, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $nobagian = 'BGN-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $bagian->kode_bagian = $nobagian;
        $bagian->nama_bagian = $request->nama_bagian;
        $bagian->deskripsi_bagian = $request->deskripsi_bagian;


        try {
            $bagian->save();
            return redirect(route('admin.master-logistik.bagian.list-bagian'))->with('pesan-berhasil','Anda berhasil menambah data bagian');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.bagian.list-bagian'))->with('pesan-gagal','Anda gagal menambah data bagian');
        }
    }

    public function EditBagian(Request $request, $id)
    {
        $bagian = Bagian::find($id);
        return view('admin.master-logistik.bagian.tambah-bagian', compact('bagian'));
    }

    public function UpdateBagian(Request $request, $id)
    {
        $bagian = Bagian::find($id);
        $bagian->nama_bagian = $request->nama_bagian;
        $bagian->deskripsi_bagian = $request->deskripsi_bagian;


        try {
            $bagian->save();
            // Tampilkan pesan SweetAlert2 berhasil
            return redirect(route('admin.master-logistik.bagian.tambah-bagian'))->with('pesan-berhasil','Anda berhasil mengubah data bagian');
        } catch (\Exception $e) {
            // Tampilkan pesan SweetAlert2 gagal
            return redirect(route('admin.master-logistik.bagian.tambah-bagian'))->with('pesan-gagal','Anda gagal mengubah data bagian');
        }
    }

    public function DeleteBagian($id)
    {
        $bagian = Bagian::find($id);

        try {
            $bagian->delete();
            return redirect(route('admin.master-logistik.bagian.tambah-bagian'))->with('pesan-berhasil','Anda berhasil menghapus data bagian');
        } catch (\Exception $e) {
            return redirect(route('admin.master-logistik.bagian.tambah-bagian'))->with('pesan-gagal','Anda gagal menghapus data bagian');
        }
    }
}
