<?php

namespace App\Models\MasterKeuangan;

use Illuminate\Database\Eloquent\Model;

class KategoriPajak extends Model
{
    protected $table = 'kategori_pajaks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_kategori_pajak',
        'nama_kategori_pajak',
        'metode_perhitungan_pajak',
        'tahun_pajak',
        'tarif_pajak',
        'deskripsi_pajak',
    ];
}


