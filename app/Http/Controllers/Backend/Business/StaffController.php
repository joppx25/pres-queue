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
    
    public function create()
    {
        return view('backend.business.staff.create');
    }
    
    public function store(Request $request)
    {   
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image', $imageName);
    }
}
