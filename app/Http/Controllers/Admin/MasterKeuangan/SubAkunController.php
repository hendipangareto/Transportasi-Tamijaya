<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\Akun;
use App\Models\MasterKeuangan\SubAkun;
use Illuminate\Http\Request;

class SubAkunController extends Controller
{
    public function getListSubAkun()
    {
        $akun = Akun::all();
        $SubAkun = SubAkun::select("sub_akuns.*", 'akuns.nama_akun as akun')
            ->join('akuns', 'akuns.id', '=', 'sub_akuns.id_akun')
            ->orderBy('akuns.id')
            ->get();

        return view('admin.master-keuangan.sub-akun.list', compact('akun', 'SubAkun'));
    }

    public function TambahSubAkun(Request $request)
    {
        $SubAkun = new SubAkun();
        $lastNomor = SubAkun::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_sub_akun, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noSubAkun = 'SBAKN-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $SubAkun->kode_sub_akun = $noSubAkun;
        $SubAkun->nama_sub_akun = $request->nama_sub_akun;
        $SubAkun->id_akun = $request->id_akun;
        $SubAkun->deskripsi_sub_akun = $request->deskripsi_sub_akun;

        //   dd($SubAkun);
        try {
            $SubAkun->save();
            // Tampilkan pesan SweetAlert2 berhasil
            return redirect(route('master-keuangan.sub-akun.list-sub-akun'))->with('pesan-berhasil','Anda berhasil menambah data sub akun');
        } catch (\Exception $e) {
            // Tampilkan pesan SweetAlert2 gagal
            return redirect(route('master-keuangan.sub-akun.list-sub-akun'))->with('pesan-gagal','Anda gagal menambah data sub akun');
        }
    }
}
