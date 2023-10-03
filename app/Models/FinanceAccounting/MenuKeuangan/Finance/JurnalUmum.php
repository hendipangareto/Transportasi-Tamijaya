<?php

namespace App\Models\FinanceAccounting\MenuKeuangan\Finance;

use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    protected $table = 'jurnal_umum';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal',
        'tipe_transaksi',
        'group_account_id',
        'jenis_debit_credit',
        'nilai_debit_credit',
        'description',
        'document'
    ];
}
