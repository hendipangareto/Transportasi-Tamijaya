<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\KategoriAset;
use App\Models\MasterKeuangan\TipeAset;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    public function getKategoriAset()
    {
        $TipeAset = TipeAset::get();

        $id_tipe_aset = "";
        if (isset($request->tipe_aset_id)) {
            $id_tipe_aset = $request->tipe_aset_id;
        }

        // Define $params here
        $params = [
            'id_tipe_aset' => $id_tipe_aset,
        ];




        $KategoriAset = KategoriAset::select("kategori_asets.*", 'tipe_asets.nama_tipe_aset as tipe_aset')
            ->join('tipe_asets', 'tipe_asets.id', '=', 'kategori_asets.id_tipe_aset')
            ->orderBy('tipe_asets.id')
            ->when(!empty($id_tipe_aset), function ($query) use ($id_tipe_aset) {
                $query->where('kategori_asets.id_tipe_aset', $id_tipe_aset);
            })
            ->get();

        return view('admin.master-keuangan.aset.kategori-aset.list-kategori-aset', compact('KategoriAset', 'TipeAset'));
    }

    public function TambahKategoriAset(Request $request)
    {
        $KategoriAset = new KategoriAset();
        $lastNomor = KategoriAset::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_kategori_aset, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noKategoriAset= 'TPAS-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $KategoriAset->kode_kategori_aset = $noKategoriAset;
        $KategoriAset->nama_kategori_aset = $request->nama_kategori_aset;
        $KategoriAset->id_tipe_aset = $request->id_tipe_aset;
        $KategoriAset->deskripsi_kategori_aset = $request->deskripsi_kategori_aset;

//           dd($KategoriAset);
        try {
            $KategoriAset->save();

            return redirect(route('master-keuangan.aset.list-kategori-aset'))->with('pesan-berhasil', 'Anda berhasil menambah data kategori aset');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-kategori-aset'))->with('pesan-gagal', 'Anda gagal menambah data kategori aset');
        }
    }

    public function UpdateKategoriAset(Request $request,$id)
    {
        $KategoriAset = KategoriAset::findOrFail($id);

        $KategoriAset->nama_kategori_aset = $request->nama_kategori_aset;
        $KategoriAset->id_tipe_aset = $request->id_tipe_aset;
        $KategoriAset->deskripsi_kategori_aset = $request->deskripsi_kategori_aset;

//           dd($KategoriAset);
        try {
            $KategoriAset->update();

            return redirect(route('master-keuangan.aset.list-kategori-aset'))->with('pesan-berhasil', 'Anda berhasil mengubah data kategori aset');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-kategori-aset'))->with('pesan-gagal', 'Anda gagal mengubah data kategori aset');
        }
    }
}
