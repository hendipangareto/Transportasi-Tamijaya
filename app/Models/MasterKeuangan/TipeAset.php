<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class TipeAset extends Model
{
    protected $table = 'tipe_asets';
    protected $primaryKey = 'id';
    protected $fillable = [

        'kode_tipe_aset',
        'nama_tipe_aset',
        'deskripsi_tipe_aset',

    ];
}

