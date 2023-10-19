<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\User;

use App\Http\Controllers\Controller;
use App\Models\FinanceAccounting\MenuKeuangan\User\PengajuanDanaUser;
use App\Models\MasterData\Satuan;
use App\Models\MasterDataLogistik\Kategori;

use App\Models\MasterDataLogistik\QsActual;
use App\Models\MasterDataLogistik\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\DeclareDeclare;

class PengajuanDanaUserController extends Controller
{
    public function index()
    {
        $satuan = Satuan::get();
        $toko   = Toko::get();
        $kategori   = Kategori::get();
//        $data =  PengajuanDanaUser::select("pengajuan_dana_users.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
//            ->join('tokos', 'tokos.id', '=', 'pengajuan_dana_users.toko_id')
//            ->join('satuans', 'satuans.id', '=', 'pengajuan_dana_users.satuan_id')
//            ->join('kategori', 'kategori.id', '=', 'pengajuan_dana_users.kategori_id')
//            ->get();
                $detail =  QsActual::select("qs_actuals.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'qs_actuals.toko_id')
            ->join('satuans', 'satuans.id', '=', 'qs_actuals.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'qs_actuals.kategori_id')
            ->where('qs_actuals.status', '=', 3)
            ->get();
//        dd($data);
        return view('admin.finance-accounting.menu-keuangan.user.pengajuan-dana-user.index', compact('satuan','toko', 'kategori', 'detail'));

    }


    public function rekap()
    {
        return view('admin.finance-accounting.menu-keuangan.user.pengajuan-dana-user.rekap');
    }

    public function detailRekap()
    {
        return view('admin.finance-accounting.menu-keuangan.user.pengajuan-dana-user.detail-rekap');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = new PengajuanDanaUser();

            $data->nama_item = $request->nama_item;
            $data->harga_item = $request->harga_item;
            $data->kuantitas_item = $request->kuantitas_item;
            $data->cara_bayar_item = $request->cara_bayar_item;
            $data->toko_id = $request->toko_id;
            $data->satuan_id = $request->satuan_id;
            $data->kategori_id = $request->kategori_id;
            $data->catatan_pembelian_item = $request->catatan_pembelian_item;
            $data->batas_waktu_pembayaran_item = $request->batas_waktu_pembayaran_item;

//            dd($data);
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data pengajuan pembelian', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index');
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = PengajuanDanaUser::findOrFail($id);

            $data->nama_item = $request->nama_item;
            $data->harga_item = $request->harga_item;
            $data->kuantitas_item = $request->kuantitas_item;
            $data->cara_bayar_item = $request->cara_bayar_item;
            $data->toko_id = $request->toko_id;
            $data->satuan_id = $request->satuan_id;
            $data->kategori_id = $request->kategori_id;
            $data->catatan_pembelian_item = $request->catatan_pembelian_item;
            $data->batas_waktu_pembayaran_item = $request->batas_waktu_pembayaran_item;

//            dd($data);
            $data->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data pengajuan pembelian', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data pengajuan pembelian', 'error']);
        }

        return redirect()->route('finance-accounting-menu-keuangan-user-pengajuan-dana-user-index');
    }

    public function delete(Request $request)
    {
        $PengajuanDanaId = $request->input('pengajuan_dana_user_id');
        $data = PengajuanDanaUser::find($PengajuanDanaId);

        $data->delete();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil menghapus data pengajuan dana user',
            'status' => 200,
        ]);
    }
}
