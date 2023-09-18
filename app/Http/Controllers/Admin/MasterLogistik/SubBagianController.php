<?php

namespace App\Http\Controllers\Admin\MasterLogistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterDataLogistik\Bagian;
use App\Models\MasterDataLogistik\SubBagian;
use Barryvdh\DomPDF\Facade as PDF;


class SubBagianController extends Controller
{
    public function getSubBagian(Request $request)
    {
        $SubBagian = SubBagian::select("sub_bagians.*", 'bagians.nama_bagian as bagian')
            ->join('bagians', 'bagians.id', '=', 'sub_bagians.bagian_id')
            ->orderBy('bagians.id')
            ->get();
        $bagian = Bagian::all();

        $bagian_id = "";
        if (isset($request->bagian_id)) {
            $bagian_id = $request->bagian_id;
        }

        // Define $params here
        $params = [
            'bagian_id' => $bagian_id,
        ];

        $SubBagian = SubBagian::select("sub_bagians.*", 'bagians.nama_bagian as bagian')
            ->join('bagians', 'bagians.id', '=', 'sub_bagians.bagian_id')
            ->orderBy('bagians.id')
            ->when(!empty($bagian_id), function ($query) use ($bagian_id) {
                $query->where('sub_bagians.bagian_id', $bagian_id);
            })
            ->get();

        // Pass $params to the view
        return view('admin.master-logistik.sub-bagian.list-bagian', compact('bagian', 'SubBagian', 'params'));
    }

    public function TambahSubBagian(Request $request)
    {
        $subbagian = new SubBagian();
        $lastNomor = SubBagian::orderBy('id', 'desc')->first();
        $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_sub_bagian, -2)) : 0;
        $newNumber = $lastNumber + 1;
        $noSubbagian = 'SBGN-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        $subbagian->kode_sub_bagian = $noSubbagian;
        $subbagian->nama_sub_bagian = $request->nama_sub_bagian;
        $subbagian->bagian_id = $request->bagian_id;
        $subbagian->deskripsi_sub_bagian = $request->deskripsi_sub_bagian;

//           dd($subbagian);
        try {
            $subbagian->save();

            return redirect(route('admin.master-logistik.bagian.sub-bagian'))->with('pesan-berhasil','Anda berhasil menambah data sub bagian');
        } catch (\Exception $e) {

            return redirect(route('admin.master-logistik.bagian.sub-bagian'))->with('pesan-gagal','Anda gagal menambah data sub bagian');
        }
    }

    public function DeleteSubBagian($id)
    {
        $subbagian = SubBagian::find($id);


//        dd($subbagian);
        try {
            $subbagian->delete();
            // Tampilkan pesan SweetAlert2 berhasil
            return redirect(route('admin.master-logistik.bagian.sub-bagian'))->with('pesan-berhasil','Anda berhasil mengubah data sub-bagian');
        } catch (\Exception $e) {
            // Tampilkan pesan SweetAlert2 gagal
            return redirect(route('admin.master-logistik.bagian.sub-bagian'))->with('pesan-gagal','Anda gagal mengubah data sub-bagian');
        }
    }
}
