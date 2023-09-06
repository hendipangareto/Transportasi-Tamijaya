<?php

namespace App\Models\FinanceAccounting;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = ['journal_number', 'journal_date', 'journal_description', 'journal_debit', 'journal_kredit', 'journal_balance', 'status'];
}
