<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterKeuangan\Akun;

class AkunController extends Controller
{
    public function getListAkun()
    {
        $akun = Akun::all();
        return view('admin.master-keuangan.akun.list', compact('akun'));
    }

    public function TambahAkun(Request $request)
    {
        $akun = new Akun();
        $lastNomor = Akun::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_akun, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noakun = 'AKN-1' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $akun->kode_akun = $noakun;
        $akun->nama_akun = $request->nama_akun;
        $akun->deskripsi_akun = $request->deskripsi_akun;
        try {
            $akun->save();
            return redirect(route('master-keuangan.akun.list-akun'))->with('pesan-berhasil', 'Anda berhasil menambah data akun');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.akun.list-akun'))->with('pesan-gagal', 'Anda gagal menambah data akun');
        }
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
}
