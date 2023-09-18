<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'tokos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_toko',
        'nama_toko',
        'hp_toko',
        'tlp_toko',
        'pic_toko',
        'alamat_toko',
        'id_city',
        'id_province',
        'deskripsi_toko'


    ];


}
