<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Window extends Model
{
    protected $fillable = [
        'staff_id',
        'name',
        'business_id',
        'status',
    ];
}
