<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Models\FinanceAccounting\MenuKeuangan\Finance\Pimpinan;
use App\Models\MasterData\Satuan;
use App\Models\MasterDataLogistik\Kategori;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use App\Models\MasterDataLogistik\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PengajuanPembelianController
{
    public function getPengajuanPembelian()
    {

        $satuan = Satuan::get();
        $toko   = Toko::get();
        $kategori   = Kategori::get();
        $data =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();

//        dd($data);
        return view('admin.master-logistik.pengajuan-pembelian.index', compact('data','satuan','toko','kategori'));

    }

    public function TambahPengajuanPembelian(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = new PengajuanPembelian();
            $lastNomor = PengajuanPembelian::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_pengajuan, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noPengajuanPembelian = 'PP-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $data->kode_pengajuan = $noPengajuanPembelian;
            $data->item = $request->item;
            $data->harga = $request->harga;
            $data->kuantitas = $request->kuantitas;
            $data->cara_bayar = $request->cara_bayar;
            $data->toko_id = $request->toko_id;
            $data->kategori_id = $request->kategori_id;
            $data->satuan_id = $request->satuan_id;
            $data->catatan_pembelian = $request->catatan_pembelian;
            $data->batas_waktu_pembayaran = $request->batas_waktu_pembayaran;
                $data->tanggal_pengajuan = $request->tanggal_pengajuan;



//            dd($data);
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data pengajuan pembelian', 'error']);
        }

        return redirect()->route('master-logistik-list-pengajuan-pembelian');
    }

    public function AjukanPengajuanPembelian(Request $request)
    {
        DB::beginTransaction();

        try {
            foreach ($request->pengajuan_pembelian_id as $pengajuan_id) {
                $dataPengajuanPembelian = new Pimpinan();
                $dataPengajuanPembelian->pengajuan_pembelian_id = $pengajuan_id;

//                 dd($dataPengajuanPembelian);
                $dataPengajuanPembelian->save();
            }

            DB::commit();
            Session::flash('message', ['Berhasil mengajukan pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengajukan pengajuan pembelian', 'error']);
        }

        return redirect()->route('master-logistik-list-pengajuan-pembelian');
    }


    public function setujuiPengajuanPembelian($id)
    {

        PengajuanPembelian::where('id',$id)->update(['status'=>1]);

        return redirect()->route('master-logistik-list-pengajuan-pembelian');

    }



    public function UpdatePengajuanPembelian(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = PengajuanPembelian::findOrFail($id);

            $data->item = $request->item;
            $data->harga = $request->harga;
            $data->kuantitas = $request->kuantitas;
            $data->cara_bayar = $request->cara_bayar;
            $data->toko_id = $request->toko_id;
            $data->kategori_id = $request->kategori_id;
            $data->satuan_id = $request->satuan_id;
            $data->catatan_pembelian = $request->catatan_pembelian;
            $data->batas_waktu_pembayaran = $request->batas_waktu_pembayaran;
            $data->tanggal_pengajuan = $request->tanggal_pengajuan;



//            dd($data);
            $data->update();

            DB::commit();
            Session::flash('message', ['Berhasil mengubah data pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengubah data pengajuan pembelian', 'error']);
        }

        return redirect()->route('master-logistik-list-pengajuan-pembelian');
    }


    public function DeletePengajuanPembelian(Request $request)
    {
        $PengajuanPembelianId = $request->input('employee_id');
        $data = PengajuanPembelian::find($PengajuanPembelianId);
        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data pengajuan pembelian',
            'status' => 200,
        ]);
    }

}
