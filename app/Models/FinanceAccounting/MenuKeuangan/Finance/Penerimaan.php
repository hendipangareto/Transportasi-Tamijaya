<?php

namespace App\Models\FinanceAccounting\MenuKeuangan\Finance;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bank_id',
        'tanggal_penerimaan',
        'nominal',
        'pic_name',
        'description'
    ];
}
