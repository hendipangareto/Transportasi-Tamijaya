<?php

namespace App\Models\FinanceAccounting\MenuKeuangan\Finance;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bank_id',
        'pengajuan_no',
        'tanggal_pengajuan',
        'nominal_pengajuan',
        'pic_pembayaran',
        'description_pembayaran'
    ];
}
