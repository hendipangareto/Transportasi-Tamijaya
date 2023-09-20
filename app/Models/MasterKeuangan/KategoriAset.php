<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class KategoriAset extends Model
{
    protected $table = 'kategori_asets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_kategori_aset',
        'id_tipe_aset',
        'nama_kategori_aset',
        'deskripsi_kategori_aset',
    ];
}


