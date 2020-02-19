<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\Business;
use App\Models\QueueUser;
use Auth;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $queueUser = QueueUser::where('user_id', Auth()->user()->id)
            ->where('status', 2)
            ->with('queue')
            ->first();
        $businesses = Business::with('queues')->get();
        return view('frontend.user.dashboard', compact('businesses', 'queueUser'));
    }
}
