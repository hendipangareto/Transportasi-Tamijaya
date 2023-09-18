<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_bagian',
        'nama_bagian',
        'deskripsi_bagian',

    ];
}
