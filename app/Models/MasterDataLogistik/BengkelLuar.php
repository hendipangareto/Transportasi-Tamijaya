<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class BengkelLuar extends Model
{
    protected $table = 'bengkel_luars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_bengkel_luar',
        'nama_bengkel_luar',
        'hp_bengkel_luar',
        'tlp_bengkel_luar',
        'pic_bengkel_luar',
        'alamat_bengkel_luar',
        'id_city',
        'id_province',
        'deskripsi_bengkel_luar'


    ];


}
