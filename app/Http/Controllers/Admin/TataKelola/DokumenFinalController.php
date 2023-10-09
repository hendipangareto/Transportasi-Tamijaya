<?php

namespace App\Http\Controllers\Admin\TataKelola;

use App\Http\Controllers\Controller;
use App\Models\TataKelola\DokumenFinal;

use App\Models\TataKelola\Kontrak;
use App\Models\TataKelola\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class DokumenFinalController extends Controller
{
    public function getDokumen()
    {
        $dokumen = DokumenFinal::get();
        $SuratKeluar = SuratKeluar::all();
        $kontrak    = Kontrak::get();
        return view('admin.tata-kelola.surat-menyurat.dokumen-final.list', compact('dokumen','SuratKeluar', 'kontrak'));
    }

    public function TambahDokumen(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([

                'lampiran_dokumen' => 'file|mimes:jpeg,png,pdf|max:2048',

            ]);
            Carbon::setLocale('id');
            $dokumen = new DokumenFinal();
            $lastNomor = DokumenFinal::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->no_registrasi_surat, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $nodokumen = 'RGS-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $dokumen->no_registrasi_surat = $nodokumen;
            $dokumen->tanggal_input = $request->tanggal_input;
            $dokumen->no_surat = $request->no_surat;
            $dokumen->pengirim_surat = $request->pengirim_surat;
            $dokumen->penerima_surat = $request->penerima_surat;
            $dokumen->tanggal_surat = $request->tanggal_surat;
            $dokumen->keterangan_surat = $request->keterangan_surat;
            $dokumen->lampiran_dokumen_final = $request->lampiran_dokumen_final;
            if ($request->hasFile('lampiran_dokumen_final')) {
                $file = $request->file('lampiran_dokumen_final');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('dokumen-final', $fileName);
                $dokumen->lampiran_dokumen_final = $fileName;
            }


//            dd($dokumen);
            $dokumen->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data surat menyurat', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data surat menyurat', 'error']);
        }

        return redirect()->route('data-kelola.surat-menyurat.list-dokumen-final');
    }


    public function HapusDokumen(Request $request)
    {
        $dokumenId = $request->input('dokumen_final_id');
        $dokumen = DokumenFinal::find($dokumenId);
        $dokumen->delete();

        return response()->json([
            'data' => $dokumen,
            'message' => 'Berhasil menghapus data surat masuk',
            'status' => 200,
        ]);
    }

    public function downloadPdf($filename)
    {
        $filePath = storage_path('app/surat/' . $filename);

        if (file_exists($filePath)) {

            return response()->download($filePath, $filename);
        } else {

            abort(404);
        }
    }
}
