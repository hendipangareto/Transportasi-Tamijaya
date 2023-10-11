<?php

namespace App\Models\FinanceAccounting\MenuKeuangan\Administrasi;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'voucher';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_voucher',
        'nilai_voucher',
        'tanggal_buat_voucher',
        'pic_pembuat',
        'Jumlah_voucher_dibuat',
        'tanggal_keluar_voucher',
        'pic_pengeluar_voucher',
        'jumlah_voucher_keluar'
    ];
}
