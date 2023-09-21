<?php

namespace App\Http\Controllers\Admin\MasterKeuangan;

use App\Http\Controllers\Controller;
use App\Models\MasterKeuangan\KategoriPajak;
use App\Models\MasterKeuangan\MetodePenyusutan;
use Illuminate\Http\Request;
class KategoriPajakController extends Controller
{
    public function getKategoriPajak(Request $request)
    {
        $MetodePenyusutan = MetodePenyusutan::get();

        $id_metode_penyusutan = "";
        if (isset($request->id_metode_penyusutan)) {
            $id_metode_penyusutan = $request->id_metode_penyusutan;
        }

        $params = [
            'id_metode_penyusutan' => $id_metode_penyusutan,
        ];

        $KategoriPajak= KategoriPajak::select("kategori_pajaks.*", 'metode_penyusutans.nama_metode_penyusutan as metode_penyusutan')
            ->join('metode_penyusutans', 'metode_penyusutans.id', '=', 'kategori_pajaks.id_metode_penyusutan')
            ->orderBy('metode_penyusutans.id')
            ->when(!empty($id_metode_penyusutan), function ($query) use ($id_metode_penyusutan) {
                $query->where('kategori_pajaks.id_metode_penyusutan', $id_metode_penyusutan);
            })
            ->get();
//        dd($KategoriPajak);

        return view('admin.master-keuangan.kategori-pajak.list-kategori-pajak', compact('KategoriPajak', 'MetodePenyusutan'));
    }

    public function TambahKategoriPajak(Request $request)
    {
        $kategoripajak = new KategoriPajak();
        $lastNomor = KategoriPajak::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_kategori_pajak, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noKategoriPajak = 'KPJ-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);


        $kategoripajak->kode_kategori_pajak = $noKategoriPajak;
        $kategoripajak->nama_kategori_pajak = $request->nama_kategori_pajak;
        $kategoripajak->id_metode_penyusutan = $request->id_metode_penyusutan;
        $kategoripajak->tahun_pajak = $request->tahun_pajak;
        $kategoripajak->tarif_pajak = $request->tarif_pajak;
        $kategoripajak->deskripsi_pajak = $request->deskripsi_pajak;

//        dd($kategoripajak);
        try {
            $kategoripajak->save();
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-berhasil', 'Anda berhasil menambah data kategori pajak');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-kategori-pajak'))->with('pesan-gagal', 'Anda gagal menambah data kategori pajak');
        }
    }


}
