<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use App\Models\MasterDataLogistik\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SupplierBarangController extends Controller
{

    public function getSupplierBarang()
    {
        $supplier = Supplier::all();
        return view('admin.master-logistik.supplier-barang.index', compact('supplier'));
    }

    public function postSimpanBarang(Request $request)
    {
        DB::beginTransaction();
        try {
            $supplier = new Supplier();
            $supplier->code_supplier = $request->kodeSupplier;
            $supplier->nama_supplier = $request->namaSupplier;
            $supplier->alamat_supplier = $request->alamatSupplier;
            $supplier->kontak_supplier = $request->kontakSupplier;

            // Save the supplier instance to the database
            $supplier->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data suplier', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data suplier', 'error']);

            // Flash an error message and redirect
            return redirect(route('master-logistik-list-supplier-barang'))->with('error', 'An error occurred while adding the supplier');
        }
    }


}
