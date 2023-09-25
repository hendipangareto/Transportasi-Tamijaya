<?php

namespace App\Http\Controllers\Admin\MasterKeuangan\Aset;

use App\Http\Controllers\Controller;
use App\Models\MasterData\Satuan;
use App\Models\MasterKeuangan\DataAset;
use App\Models\MasterKeuangan\KategoriAset;
use App\Models\MasterKeuangan\KategoriPajak;
use App\Models\MasterKeuangan\MetodePenyusutan;
use Illuminate\Http\Request;
use App\Models\MasterKeuangan\TipeAset;

class DataAsetController extends Controller
{
    public function getListAset()
    {

    $DataAset = DataAset::select("data_asets.*", 'kategori_asets.nama_kategori_aset as kategori_aset', 'kategori_pajaks.nama_kategori_pajak as kategori_pajak', 'metode_penyusutans.nama_metode_penyusutan as metode_penyusutan', 'satuans.nama_satuan as satuan')
            ->join('kategori_asets', 'kategori_asets.id', '=', 'data_asets.id_kategori_aset')
            ->join('kategori_pajaks', 'kategori_pajaks.id', '=', 'data_asets.id_kategori_pajak')
            ->join('metode_penyusutans', 'metode_penyusutans.id', '=', 'data_asets.id_metode_penyusutan')
            ->join('satuans', 'satuans.id', '=', 'data_asets.id_metode_penyusutan')
            ->orderBy('kategori_asets.id')
            ->orderBy('kategori_pajaks.id')
            ->orderBy('metode_penyusutans.id')
            ->get();
//    dd($DataAset);
        return view('admin.master-keuangan.aset.data-aset.list-data-aset', compact('DataAset'));
    }

    public function getTambahDataAset()
    {
        $KategoriPajak = KategoriPajak::all();
        $KategoriAset = KategoriAset::all();
        $MetodePenyusutan = MetodePenyusutan::all();
        $satuan = Satuan::all();
        return view('admin.master-keuangan.aset.data-aset.tambah', compact('satuan','KategoriAset','KategoriPajak','MetodePenyusutan'));
    }


    //Tipe Asset
    public function getTipeAset()
    {


        return view('admin.master-keuangan.aset.tipe-aset');
    }

    public function SimpanDataAset(Request $request)
    {
        $DataAset = new DataAset();
        $lastNomor = DataAset::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_aset, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noDataAset = 'DA-01' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        if ($request->hasFile('lampiran_aset')) {
            $lampiranPath = $request->file('lampiran_aset')->store('lampiran', 'public');
        }

        $DataAset->kode_aset            = $noDataAset;
        $DataAset->nama_aset            = $request->nama_aset;
        $DataAset->id_kategori_aset     = $request->id_kategori_aset;
        $DataAset->merk_aset            = $request->merk_aset;
        $DataAset->spesifikasi_aset     = $request->spesifikasi_aset;
        $DataAset->catatan_aset         = $request->catatan_aset;
        $DataAset->tanggal_beli_aset    = $request->tanggal_beli_aset;
        $DataAset->tanggal_pakai_aset   = $request->tanggal_pakai_aset;
        $DataAset->lokasi_awal_aset     = $request->lokasi_awal_aset;
        $DataAset->pajak_aset           = $request->pajak_aset;
        $DataAset->id_kategori_pajak    = $request->id_kategori_pajak;
        $DataAset->id_metode_penyusutan = $request->id_metode_penyusutan;
        $DataAset->akun_aset            = $request->akun_aset;
        $DataAset->akun_akumulasi_penyusutan_aset = $request->akun_akumulasi_penyusutan_aset;
        $DataAset->lampiran_aset        = $lampiranPath;
        $DataAset->kuantitas            = $request->kuantitas;
        $DataAset->id_satuan            = $request->id_satuan;
        $DataAset->umur_aset            = $request->umur_aset;
        $DataAset->rasio                = $request->rasio;
        $DataAset->nilai_sisa           = $request->nilai_sisa;

//        dd($DataAset);

        try {
            $DataAset->save();

            return redirect(route('master-keuangan.aset.list-data-aset'))->with('pesan-berhasil', 'Anda berhasil menambah data aset');
        } catch (\Exception $e) {
            return redirect(route('master-keuangan.aset.list-data-aset'))->with('pesan-gagal', 'Anda gagal menambah data aset');
        }
    }




}
