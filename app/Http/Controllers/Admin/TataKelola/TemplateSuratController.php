<?php

namespace App\Http\Controllers\Admin\TataKelola;

use App\Http\Controllers\Controller;
use App\Models\TataKelola\DokumenFinal;
use App\Models\TataKelola\SuratMenyurat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class TemplateSuratController extends Controller
{
    public function getSurat()
    {
        $surat = SuratMenyurat::get();
        return view('admin.tata-kelola.surat-menyurat.template.list-template', compact('surat'));
    }


    public function TambahSurat(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'lampiran_dokumen' => 'file|mimes:jpeg,png,pdf|max:2048',
            ]);

            Carbon::setLocale('id');
            $surat = new SuratMenyurat();
            $lastNomor = SuratMenyurat::orderBy('id', 'desc')->first();
            $lastNumber = $lastNomor ? intval(substr($lastNomor->kode_surat, -2)) : 0;
            $newNumber = $lastNumber + 1;
            $nodokumen = 'SRT-001' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $surat->kode_surat = $nodokumen;
            $surat->nama_surat = $request->nama_surat;
            $surat->deskripsi = $request->deskripsi;
                $surat->lampiran_dokumen = $request->lampiran_dokumen;

                if ($request->hasFile('lampiran_dokumen')) {
                    $file = $request->file('lampiran_dokumen');
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('template-surat', $fileName);
                    $surat->lampiran_dokumen = $fileName;
            }

//            dd($surat);
            $surat->save();

            DB::commit();
            Session::flash('message', ['Berhasil menyimpan data surat menyurat', 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', ['Gagal menyimpan data surat menyurat', 'error']);
        }

        return redirect()->route('data-kelola.surat-menyurat.list-template-surat');

    }

    public function downloadPdf($filename)
    {

        $filePath = storage_path('app/template-surat/' . $filename);

        if (file_exists($filePath)) {

            return response()->download($filePath, $filename);
        } else {

            abort(404);
        }
    }
}
