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
    
    public function queue()
    {
        return $this->belongsTo('App\Models\Queue', 'queue_id', 'id')->where('status', 2);
    }
}
