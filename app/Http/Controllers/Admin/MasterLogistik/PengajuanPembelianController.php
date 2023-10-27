<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Models\FinanceAccounting\MenuKeuangan\Finance\Pimpinan;
use App\Models\MasterData\Bank;
use App\Models\MasterData\Satuan;
use App\Models\MasterDataLogistik\Kategori;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use App\Models\MasterDataLogistik\QsActual;
use App\Models\MasterDataLogistik\TambahItem;
use App\Models\MasterDataLogistik\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PengajuanPembelianController
{
    public function getPengajuanPembelian()
    {
        $satuan = Satuan::get();
        $toko = Toko::get();
        $kategori = Kategori::get();
        $bank = Bank::get();

        $qsActual = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 1)
            ->get();


        $terpilih = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 2)
            ->get();

        $pimpinan = QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 5)
            ->get();

        return view('admin.master-logistik.pengajuan-pembelian.data-pembelian', compact('bank', 'qsActual', 'terpilih', 'pimpinan', 'satuan', 'toko', 'kategori'));
    }

    public function LaporanDanaTerkirim(Request $request)
    {
        DB::beginTransaction();
        try {
            if (count($request->id_qs) > 0) {
                foreach ($request->id_qs as $key => $val) {
                    $qsActual = QsActual::find($val);
                    $qsActual->status = 7;
                    $qsActual->save();
                }
            }
            DB::commit();
            Session::flash('message', ['Berhasil mengajukan mengirimkan dana, akan masuk dalam rekap pengiriman dana!', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengajukan dana', 'error']);
        }
        return redirect()->route('finance-accounting-menu-keuangan-kasir-pengiriman-dana-index');
    }

    public function terpilih(Request $request)
    {
        DB::beginTransaction();
        try {
            if (count($request->id_qs) > 0) {
                foreach ($request->id_qs as $key => $val) {
                    $qsActual = QsActual::find($val);
                    $qsActual->status = 2;
                    $qsActual->save();
                }
            }
            DB::commit();
            Session::flash('message', ['Berhasil mengajukan dana, akan ditinjau Admininstrasi !', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal mengajukan dana', 'error']);
        }
        return redirect()->route('master-logistik-list-pengajuan-pembelian');
    }


    public function terpilihDelete(Request $request)
    {
        $id_qs = $request->id_qs;
        $qsActual = QsActual::find($id_qs);
        $qsActual->status = 3;
        $qsActual->save();

        Session::flash('message', ['Berhasil menolak pengajuan data, akan dikembalikan pada rekap pengajuan pembelian', 'success']);
        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
    }


    public function prosesTerpilih(Request $request)
    {

        $id_qs = $request->id_qs;
        $qsActual = QsActual::find($id_qs);
        $qsActual->status = 4;
        $qsActual->save();

        Session::flash('message', ['Berhasil menambahkan data, akan diperiksa pimpinan!', 'success']);
        return redirect()->route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-index');
    }

    public function setujuTerpilih(Request $request)
    {
        $id_qs = $request->id_qs;
        $qsActual = QsActual::find($id_qs);
        $qsActual->status = 2;
        $qsActual->save();

        Session::flash('message', ['Berhasil menyetujui pengajuan data', 'success']);
        return redirect()->route('finance-accounting-menu-keuangan-pimpinan-request-pengajuan-dana-index');
    }

    public function CairkanDana(Request $request)
    {
        $id_qs = $request->id_qs;
        $qsActual = QsActual::find($id_qs);
        $qsActual->status = 3;
        $qsActual->save();

        Session::flash('message', ['Berhasil konfirmasi ke user', 'success']);
        return redirect()->route('finance-accounting-menu-keuangan-administrasi-pengajuan-dana-index');
    }

    public function TambahPengajuanPembelian(Request $request)
    {
        DB::beginTransaction();
        try {
            $qsActual = new QsActual();
            $lastNomor = QsActual::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_pengajuan, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $nodata = 'PP-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            $qsActual->kode_pengajuan = $nodata;
            $qsActual->item = $request->item;
            $qsActual->harga = $request->harga;
            $qsActual->kuantitas = $request->kuantitas;
            $qsActual->cara_bayar = $request->cara_bayar;
            $qsActual->toko_id = $request->toko_id;
            $qsActual->satuan_id = $request->satuan_id;
            $qsActual->kategori_id = $request->kategori_id;
            $qsActual->catatan_pembelian = $request->catatan_pembelian;
            $qsActual->tanggal_pengajuan = $request->tanggal_pengajuan;
            $qsActual->batas_waktu_pembayaran = $request->batas_waktu_pembayaran;

//            dd($qsActual);
            $qsActual->save();


            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data pengajuan pembelian', 'error']);
        }

        return redirect()->route('master-logistik-list-pengajuan-pembelian');
    }


    public function TambahItemPembelian(Request $request)
    {
        DB::beginTransaction();
        try {
            $qsActual = new TambahItem();
            $qsActual->qs_actual_id = $request->qs_actual_id;
            $qsActual->item = $request->item;
            $qsActual->harga = $request->harga;
            $qsActual->kuantitas = $request->kuantitas;
            $qsActual->cara_bayar = $request->cara_bayar;
            $qsActual->toko_id = $request->toko_id;
            $qsActual->satuan_id = $request->satuan_id;
            $qsActual->kategori_id = $request->kategori_id;
            $qsActual->catatan_pembelian = $request->catatan_pembelian;
            $qsActual->catatan_pembelian = $request->catatan_pembelian;
            $qsActual->catatan_pembelian = $request->catatan_pembelian;

//            dd($qsActual);
            $qsActual->save();


            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data pengajuan pembeliann', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data pengajuan pembelian', 'error']);
        }
        return redirect()->route('master-logistik-list-pengajuan-pembelian');
    }

    public function detailPengajuanPembelian(Request $request, $id)
    {
        $satuan = Satuan::get();
        $toko = Toko::get();
        $kategori = Kategori::get();
        $QsActual = QsActual::get();
        $data = TambahItem::select("tambah_item.*", 'qs_actuals.kode_pengajuan as kode')
            ->join('qs_actuals', 'qs_actuals.id', '=', 'tambah_item.qs_actual_id')
            ->where('tambah_item.id', $id)
            ->get();

        return view('admin.master-logistik.pengajuan-pembelian.detail', compact('data', 'satuan', 'toko', 'kategori', 'QsActual'));
    }


//    public function AjukanPengajuanPembelian(Request $request)
//    {
//        DB::beginTransaction();
//
//        try {
//            foreach ($request->pengajuan_pembelian_id as $pengajuan_id) {
//                $dataPengajuanPembelian = new Pimpinan();
//                $dataPengajuanPembelian->pengajuan_pembelian_id = $pengajuan_id;
//
////                 dd($dataPengajuanPembelian);
//                $dataPengajuanPembelian->save();
//            }
//
//            DB::commit();
//            Session::flash('message', ['Berhasil mengajukan pengajuan pembelian', 'success']);
//        } catch (\Exception $e) {
//            DB::rollback();
//            Session::flash('message', ['Gagal mengajukan pengajuan pembelian', 'error']);
//        }
//
//        return redirect()->route('master-logistik-list-pengajuan-pembelian');
//    }

//    public function setujuiPengajuanPembelian($id)
//    {
//
//        PengajuanPembelian::where('id',$id)->update(['status'=>2]);
//
//        return redirect()->route('admin.master-logistik.pengajuan-pembelian.rekap-pengajuan.index');
//
//    }


    public function UpdatePengajuanPembelian(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $qsActual = QsActual::findOrFail($id);

            // Periksa bahwa setiap variabel di sini sesuai dengan nama yang diharapkan dari formulir HTML
            $qsActual->item = $request->item;
            $qsActual->harga = $request->harga;
            $qsActual->kuantitas = $request->kuantitas;
            $qsActual->cara_bayar = $request->cara_bayar;
            $qsActual->toko_id = $request->toko_id;
            $qsActual->kategori_id = $request->kategori_id;
            $qsActual->satuan_id = $request->satuan_id;
            $qsActual->catatan_pembelian = $request->catatan_pembelian;
            $qsActual->batas_waktu_pembayaran = $request->batas_waktu_pembayaran;
            $qsActual->tanggal_pengajuan = $request->tanggal_pengajuan;

            $qsActual->bank_id = $request->bank_id;
            $qsActual->status_pengiriman = $request->status_pengiriman; // Periksa apakah ini telah diisi dengan benar dari formulir HTML
            $qsActual->bukti_pengiriman = $request->bukti_pengiriman;

            // Pastikan bahwa jenis data yang dikirimkan ke Model sesuai dengan tipe data kolom yang diharapkan

            if ($request->hasFile('bukti_pengiriman')) {
                $file = $request->file('bukti_pengiriman');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('bukti_pengiriman', $fileName);
                $qsActual->bukti_pengiriman = $fileName;
            }

            // Pastikan bahwa update() digunakan setelah semua kolom diisi dengan nilai yang diinginkan
            $qsActual->save();

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
        $PengajuanPembelianId = $request->input('id_qs');
        $qsActual = QsActual::find($PengajuanPembelianId);
        $qsActual->delete();

        return response()->json([
            'data' => $qsActual,
            'message' => 'Berhasil menghapus data pengajuan pembelian',
            'status' => 200,
        ]);
    }

}
