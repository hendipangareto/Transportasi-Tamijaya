<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class AlatKerjaBengkel extends Model
{
    protected $table = 'alat_kerja_bengkels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_alat_kerja_bengkel',
        'nama_alat_kerja_bengkel',
        'satuan_id',
        'kuantitas_alat_kerja_bengkel',


    ];

}

