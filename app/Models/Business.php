<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'details',
        'contact',
        'address',
    ];
}
