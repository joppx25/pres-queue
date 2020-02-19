<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\Business;

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
        $businesses = Business::with('queues')->get();
        return view('frontend.user.dashboard', compact('businesses'));
    }
}
