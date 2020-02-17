<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'current_queue',
        'max_queue',
        'status',
    ];
}
