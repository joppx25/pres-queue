<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueueUser extends Model
{
    protected $fillable = [
        'queue_id',
        'user_id',
        'status',
    ];
}
