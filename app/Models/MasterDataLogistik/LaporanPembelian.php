<?php

namespace App\Models\MasterDataLogistik;

use Illuminate\Database\Eloquent\Model;

class LaporanPembelian extends Model
{
    protected $table = 'laporan_pembelian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_laporan_pembelian',
        'kuantitas',
        'satuan_id',

        'harga_satuan',
        'cara_bayar',
        'tipe_bayar',
        'bank_id',
        'no_rekening',
        'catatan_laporan_pembelian',
        'batas_pembayaran',
        'pengajuan_pembelian_id',

    ];
}

