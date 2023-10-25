<?php

namespace App\Http\Controllers\Admin\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SatuanController extends Controller
{
    public function getListSatuan()
    {
        $satuan = Satuan::all();
        // dd($satuan);
        return view('admin.human-resource.satuan.list-satuan', compact('satuan'));
    }

    public function SimpanSatuan(Request $request)
    {

        DB::beginTransaction();
        try {

            $satuan = new Satuan();
            $lastNomor = Satuan::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_satuan, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $nosatuan = 'STN-01' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $satuan->kode_satuan = $nosatuan;
            $satuan->nama_satuan = $request->nama_satuan;
            $satuan->deskripsi_satuan = $request->deskripsi_satuan;

            $satuan->save();

            DB::commit();
            Session::flash('message', ['Berhasil menambah data satuan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menambah data satuan', 'error']);
        }

        return redirect()->route('human-resource.status.list-satuan');
    }

    public function UpdateSatuan(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $satuan = Satuan::findOrFail($id);
            $satuan->nama_satuan = $request->nama_satuan;
            $satuan->deskripsi_satuan = $request->deskripsi_satuan;
            $satuan->save();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data satuan', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data satuan', 'error']);
        }

        return redirect()->route('human-resource.status.list-satuan');
    }

    public function DeleteSatuan($id)
    {
        $satuan = Satuan::findOrFail($id);

        try {
            $satuan->delete();

            return redirect(route('human-resource.status.list-satuan'))->with('pesan-berhasil', 'Anda berhasil menghapus data satuan');
        } catch (\Exception $e) {

            return redirect(route('human-resource.status.list-satuan'))->with('pesan-gagal', 'Anda gagal menghapus data satuan');
        }
    }

    public function delete(Request $request)
    {
        $satuanId = $request->input('id');
        $data = Satuan::find($satuanId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data satuan',
            'status' => 200,
        ]);
    }

}
