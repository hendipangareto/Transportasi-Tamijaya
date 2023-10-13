<?php

namespace App\Http\Controllers\Admin\FinanceAccounting\MenuKeuangan\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\PengajuanPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RequestPengajuanDanaController extends Controller
{
    public function index()
    {
        $data =  PengajuanPembelian::select("pengajuan_pembelian.*", 'tokos.nama_toko as toko', 'satuans.nama_satuan as satuan', 'kategori.nama_kategori as kategori')
            ->join('tokos', 'tokos.id', '=', 'pengajuan_pembelian.toko_id')
            ->join('satuans', 'satuans.id', '=', 'pengajuan_pembelian.satuan_id')
            ->join('kategori', 'kategori.id', '=', 'pengajuan_pembelian.kategori_id')
            ->get();
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.index', compact('data'));
    }

    public function approvalPengajuan()
    {
        return view('admin.finance-accounting.menu-keuangan.pimpinan.request-pengajuan-dana.approval-pengajuan');
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
