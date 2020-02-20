<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Window;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable = [
        'user_id',
        'business_id',
        'name',
        'details',
        'image',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'user_id', 'id');
    }
}
