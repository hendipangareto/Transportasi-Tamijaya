<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = ['inbox_name', 'inbox_email', 'inbox_phone', 'inbox_message', 'address', 'inbox_subject', 'inbox_reply', 'status'];
}