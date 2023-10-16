<?php

namespace App\Models\FinanceAccounting\MenuKeuangan\User;

use Illuminate\Database\Eloquent\Model;

class PengajuanDanaUser extends Model
{
    protected $table = 'pengajuan_dana_users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_item',
        'harga_item',
        'kuantitas_item',
        'cara_bayar_item',
        'toko_id',
        'satuan_id',
        'kategori_id',
        'catatan_pembelian_item',
        'batas_waktu_pembayaran_item',
    ];
}

