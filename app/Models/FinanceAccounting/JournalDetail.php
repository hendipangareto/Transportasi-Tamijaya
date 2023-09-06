<?php

namespace App\Models\FinanceAccounting;

use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    protected $fillable = ['id_journal', 'id_account', 'type_journal', 'journal_amount', 'journal_notes'];
}
