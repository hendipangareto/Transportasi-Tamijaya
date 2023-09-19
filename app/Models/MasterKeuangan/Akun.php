<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akuns';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_akun',
        'nama_akun',
        'deskripsi_akun',

    ];
}
