<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class TambahItem extends Model
{
    protected $table = 'tambah_item';
    protected $primaryKey = 'id';
    protected $fillable = [

        'qs_actual_id',
        'item',
        'harga',
        'kuantitas',
        'cara_bayar',
        'toko_id',
        'kategori_id',
        'satuan_id',
        'catatan_pembelian',
    ];
}


