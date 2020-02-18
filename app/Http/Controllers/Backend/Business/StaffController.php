<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Auth\User;

class StaffController extends Controller
{
    private function getBusinessId()
    {
        return (auth()->user() instanceof User)? auth()->user()->business()->first()->id : auth()->user()->business_id;
    }
    
    public function index()
    {
        $staffs = Staff::where('business_id', $this->getBusinessId())->orderBy('id', 'desc')->paginate(10);
        return view('backend.business.staff.index', compact('staffs'));
    }
    
    public function create()
    {
        $businessId = $this->getBusinessId();
        return view('backend.business.staff.create', compact('businessId'));
    }
    
    public function store(Request $request)
    {   
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        
        $staff              = new Staff;
        $staff->business_id = $request->business_id;
        $staff->name        = $request->name;
        $staff->details     = $request->details;
        $staff->image       = $imageName;
        
        $staff->save();
        
        return redirect()->route('admin.business.staff');
    }
}
