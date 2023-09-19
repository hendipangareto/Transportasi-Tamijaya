<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class SubAkun extends Model
{
    protected $table = 'sub_akuns';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_sub_akun',
        'id_akun',
        'nama_sub_akun',
        'deskripsi_sub_akun',

    ];
}

