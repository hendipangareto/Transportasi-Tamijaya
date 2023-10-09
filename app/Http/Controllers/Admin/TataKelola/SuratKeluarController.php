<?php

namespace App\Http\Controllers\Admin\TataKelola;

use App\Http\Controllers\Controller;
use App\Models\TataKelola\SuratKeluar;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratKeluarController extends Controller
{
//    public function ListSuratKeluar()
//    {
//        $SuratKeluar = SuratKeluar::all();
//        return view('admin.tata-kelola.surat-menyurat.dokumen-final.list', compact('SuratKeluar'));
//    }


    public function TambahSuratKeluar(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([

                'lampiran_dokumen' => 'file|mimes:jpeg,png,pdf|max:2048',

            ]);
            Carbon::setLocale('id');
            $SuratKeluar = new SuratKeluar();
            $lastNomor = SuratKeluar::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->no_registrasi_surat, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noSuratKeluar = 'SKL-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $SuratKeluar->no_registrasi_surat = $noSuratKeluar;
            $SuratKeluar->tanggal_input = $request->tanggal_input;
            $SuratKeluar->no_surat = $request->no_surat;
            $SuratKeluar->pengirim_surat = $request->pengirim_surat;
            $SuratKeluar->penerima_surat = $request->penerima_surat;
            $SuratKeluar->tanggal_surat = $request->tanggal_surat;
            $SuratKeluar->keterangan_surat = $request->keterangan_surat;
            $SuratKeluar->lampiran_dokumen_final = $request->lampiran_dokumen_final;
            if ($request->hasFile('lampiran_dokumen_final')) {
                $file = $request->file('lampiran_dokumen_final');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('dokumen-final', $fileName);
                $SuratKeluar->lampiran_dokumen_final = $fileName;
            }


//            dd($dokumen);
            $SuratKeluar->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data surat keluar', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data surat keluar', 'error']);
        }

//        return back('data-kelola.surat-menyurat.list-dokumen-final');
        return back();
    }


    public function HapusSuratKeluar(Request $request)
    {
        $SuratKeluarId = $request->input('surat_keluar_id');
        $SuratKeluar = SuratKeluar::find($SuratKeluarId);
        $SuratKeluar->delete();

        return response()->json([
            'data' => $SuratKeluar,
            'message' => 'Berhasil menghapus data surat masuk',
            'status' => 200,
        ]);
    }
}
