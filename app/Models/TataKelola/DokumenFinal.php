<?php

namespace App\Models\TataKelola;

use Illuminate\Database\Eloquent\Model;

class DokumenFinal extends Model
{
    protected $table = 'dokumen_final';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_surat',
        'no_registrasi_surat',
        'no_surat',
        'tanggal_surat',
        'pengirim_surat',
        'penerima_surat',
        'keterangan_surat',
        'lampiran_dokumen_final',
    ];

}

