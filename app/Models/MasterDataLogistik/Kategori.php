<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'deskripsi_kategori',

    ];
}
