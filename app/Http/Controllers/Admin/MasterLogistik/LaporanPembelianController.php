<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Models\MasterData\Bank;
use App\Models\MasterData\Satuan;
use App\Models\MasterDataLogistik\LaporanPembelian;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LaporanPembelianController
{
    public function getLaporanPembelian()
    {
//        $detail = LaporanPembelian::select("laporan_pembelian.*", 'banks.bank_name as bank', 'satuans.nama_satuan as satuan', 'laporan_pembelian.*')
//            ->join('banks', 'banks.id', '=', 'laporan_pembelian.bank_id')
//            ->join('satuans', 'satuans.id', '=', 'laporan_pembelian.satuan_id')
//            ->join('pengajuan_pembelian', 'laporan_pembelian.id', '=', 'laporan_pembelian.pengajuan_pembelian_id')
//            ->get();
        $detail =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();
//        dd($detail);
        return view('admin.master-logistik.laporan-pembelian.index', compact('detail'));
    }

    public function DetailLaporanPembelian(Request $request, $id)
    {

        $data = PengajuanPembelian::findOrFail($id);
        $bank = Bank::get();
        $satuan = Satuan::get();

        $laporan = LaporanPembelian::select("laporan_pembelian.*", 'banks.bank_name as bank', 'satuans.nama_satuan as satuan', 'laporan_pembelian.*')
            ->join('banks', 'banks.id', '=', 'laporan_pembelian.bank_id')
            ->join('satuans', 'satuans.id', '=', 'laporan_pembelian.satuan_id')
            ->join('pengajuan_pembelian', 'laporan_pembelian.id', '=', 'laporan_pembelian.pengajuan_pembelian_id')
            ->get();

        $detail =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();
//        dd($data);

        return view('admin.master-logistik.laporan-pembelian.detail-pembelian', compact('detail','data','bank','satuan','laporan'));
    }

    public function SimpanLaporanPembelian(Request $request)
    {
        DB::beginTransaction();
        try {
            $laporan = new LaporanPembelian();
            $lastNomor = LaporanPembelian::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_laporan_pembelian, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noLaporanPembelian= 'LPP-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $laporan->kode_laporan_pembelian = $noLaporanPembelian;

            $laporan->kuantitas = $request->kuantitas;
            $laporan->satuan_id = $request->satuan_id;
            $laporan->harga_satuan = $request->harga_satuan;
            $laporan->cara_bayar = $request->cara_bayar;
            $laporan->tipe_bayar = $request->tipe_bayar;
            $laporan->bank_id = $request->bank_id;

            $laporan->no_rekening = $request->no_rekening;
            $laporan->catatan_laporan_pembelian = $request->catatan_laporan_pembelian;
            $laporan->batas_pembayaran = $request->batas_pembayaran;


//            dd($laporan);

            $laporan->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data laporan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data laporan pembelian', 'error']);
        }

        return redirect()->route('master-logistik-laporan-pengajuan-pembelian');
    }
}
