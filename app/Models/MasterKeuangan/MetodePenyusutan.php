<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class MetodePenyusutan extends Model
{
    protected $table = 'metode_penyusutans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_metode_penyusutan',
        'nama_metode_penyusutan',
        'keterangan_metode_penyusutan',
    ];
}


