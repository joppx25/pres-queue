<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QueueUser;
use App\Models\Queue;

class QueueController extends Controller
{
    public function reserve(Request $request)
    {
        $data      = $request->all();
        $queueUser = new QueueUser;
        $queueUser->queue_id = $data['queue_id'];
        $queueUser->user_id  = $data['user_id'];
        $queueUser->status   = $data['status'];

        $queueUser->save();

        return response()->json(Queue::where('id', $data['queue_id'])->update(['status' => $data['status']]));
    }
    
    public function resolve(Request $request)
    {
        $data = $request->all();
        Queue::where('id', $request->queue_id)->update(['status' => 0]);
        
        $queue               = new Queue;
        $queue->business_id  = $request->business_id;
        $queue->window_id    = $request->window_id;
        $queue->queue_number = $request->queue_number + 1;
        $queue->status       = 1;
        
        $queue->save();
        
        return response()->json(QueueUser::where('queue_id', $request->queue_id)->update(['status' => 0]));
    }
}
