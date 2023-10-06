<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'masters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'nama_kegiatan',
        'waktu',
        'ket',
        'status',

    ];
}


