<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'user_from', 'message', 'is_read'];
}
