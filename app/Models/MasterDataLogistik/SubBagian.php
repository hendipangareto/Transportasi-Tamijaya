<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class SubBagian extends Model
{
    protected $table = 'sub_bagians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_sub_bagian',
        'nama_sub_bagian',
        'bagian_id',
        'deskripsi_sub_bagian',

    ];

}
