<?php

namespace App\Models\TataKelola;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = 'kontraks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal_input',
        'no_registrasi_surat',
        'no_surat',
        'tanggal_surat',
        'pengirim_surat',
        'penerima_surat',
        'keterangan_surat',
        'lampiran_dokumen_final',
    ];

}
