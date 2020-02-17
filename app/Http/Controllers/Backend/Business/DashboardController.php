<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $business = Business::where('user_id', Auth::user()->id)->first();

        return view('backend.business.dashboard', compact('business'));
    }
}
