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
            Session::flash('message', ['Berhasil menyimpan data akun', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data akun', 'error']);
        }

        return redirect()->route('master-keuangan.akun.list-akun');


    }

    public function UpdateAkun(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $akun = Akun::findOrFail($id);
            $akun->nama_akun = $request->nama_akun;
            $akun->deskripsi_akun = $request->deskripsi_akun;

            $akun->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data akun', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data akun', 'error']);
        }

        return redirect()->route('master-keuangan.akun.list-akun');

    }



    public function DeleteAkun(Request $request)
    {




        try {

            $akunId = $request->input('akun_id');
            $akun = Akun::find($akunId);
            $akun->delete();

            return response()->json([
                'data' => $akun,
                'message' => 'Berhasil menghapus data  akun',
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus data  akun',
                'status' => 500,
            ]);
        }

    }
}
