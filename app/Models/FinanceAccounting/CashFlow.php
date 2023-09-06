<?php

namespace App\Models\FinanceAccounting;

use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    protected $fillable = ['id_account', 'description', 'type_cf', 'date_cf','amount', 'status'];
}
