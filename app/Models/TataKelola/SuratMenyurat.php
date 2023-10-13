<?php

namespace App\Models\TataKelola;

use Illuminate\Database\Eloquent\Model;

class SuratMenyurat extends Model
{
    protected $table = 'surat_menyurats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_surat',
        'nama_surat',
        'deskripsi',
        'lampiran_dokumen',
    ];
}
