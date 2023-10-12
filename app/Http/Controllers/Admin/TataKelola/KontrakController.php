<?php

namespace App\Http\Controllers\Admin\TataKelola;

use App\Http\Controllers\Controller;
use App\Models\TataKelola\Kontrak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KontrakController extends Controller
{
    public function TambahKontrak(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([

                'lampiran_dokumen' => 'file|mimes:jpeg,png,pdf|max:2048',

            ]);
            Carbon::setLocale('id');
            $Kontrak = new Kontrak();
            $lastNomor = Kontrak::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->no_registrasi_surat, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $noKontrak = 'KNT-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $Kontrak->no_registrasi_surat = $noKontrak;
            $Kontrak->tanggal_input = $request->tanggal_input;
            $Kontrak->no_surat = $request->no_surat;
            $Kontrak->pengirim_surat = $request->pengirim_surat;
            $Kontrak->penerima_surat = $request->penerima_surat;
            $Kontrak->tanggal_surat = $request->tanggal_surat;
            $Kontrak->keterangan_surat = $request->keterangan_surat;
            $Kontrak->lampiran_dokumen_final = $request->lampiran_dokumen_kontrak;
            if ($request->hasFile('lampiran_dokumen_final')) {
                $file = $request->file('lampiran_dokumen_final');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('kontrak-final', $fileName);
                $Kontrak->lampiran_dokumen_final = $fileName;
            }


//            dd($Kontrak);
            $Kontrak->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data kontrak', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data kontrak', 'error']);
        }

//        return back('data-kelola.surat-menyurat.list-dokumen-final');
        return back();
    }
}
