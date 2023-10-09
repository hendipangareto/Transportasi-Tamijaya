<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\Kategori;
use Illuminate\Http\Request;
use App\Models\MasterKeuangan\Akun;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    public function getListAkun()
    {
        $akun = Akun::all();
        return view('admin.master-keuangan.akun.list', compact('akun'));
    }

    public function TambahAkun(Request $request)
    {

        DB::beginTransaction();
        try {
            $kategori = new Akun();

            // Mengambil kode kategori terbaru
            $akun = new Akun();
            $lastNomor = Akun::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_akun, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noakun = 'AKN-1' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $akun->kode_akun = $noakun;
            $akun->nama_akun = $request->nama_akun;
            $akun->deskripsi_akun = $request->deskripsi_akun;
            $akun->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data kategori barang', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data kategori barang', 'error']);
        }

        return redirect()->route('master-keuangan.akun.list-akun');



    }

    public function UpdateAkun(Request $request, $id)
    {
        $akun = Akun::findOrFail($id);
        $akun->nama_akun = $request->nama_akun;
        $akun->deskripsi_akun = $request->deskripsi_akun;
        try {
            $akun->save();
            return redirect(route('master-keuangan.akun.list-akun'))->with('pesan-berhasil', 'Anda berhasil menambah data akun');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.akun.list-akun'))->with('pesan-gagal', 'Anda gagal menambah data akun');
        }
    }

    public function DeleteAkun($id)
    {
        $akun = Akun::findOrFail($id);

        try {
            $akun->delete();
            return redirect(route('master-keuangan.akun.list-akun'))->with('pesan-berhasil', 'Anda berhasil menghapus data akun');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.akun.list-akun'))->with('pesan-gagal', 'Anda gagal menghapus data akun');
        }
    }
}
