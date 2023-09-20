<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\KategoriAset;
use App\Models\MasterKeuangan\TipeAset;

class KategoriAsetController extends Controller
{
    public function getKategoriAset()
    {
        $TipAset = TipeAset::get();

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

        return view('admin.master-keuangan.aset.kategori-aset.list-kategori-aset', compact('KategoriAset', 'TipAset'));
    }
}
