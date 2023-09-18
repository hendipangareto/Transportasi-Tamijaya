<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    protected $table = 'komponens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_komponen',
        'nama_komponen',
        'sub_bagian_id',
        'deskripsi',

    ];

}
