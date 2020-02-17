<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::orderBy('id', 'desc')->paginate(10);
        return view('backend.business.staff.index', compact('staffs'));
    }
}
