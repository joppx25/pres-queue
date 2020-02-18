<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Window;
use App\Models\Auth\User;
use App\Models\Staff;
use App\Models\Queue;
use Auth;

class WindowController extends Controller
{
    
    private function getBusinessId()
    {
        return (auth()->user() instanceof User)? auth()->user()->business()->first()->id : auth()->user()->business_id;
    }
    
    private function getLastNumberServeInQueue()
    {
        $lastNumberServe = Queue::where('business_id', $this->getBusinessId())
            ->orderBy('queue_number', 'desc')
            ->first();
            
        return is_null($lastNumberServe)? 0 : $lastNumberServe->queue_number;
    }
    
    public function list()
    {
        $businessId = $businessId = $this->getBusinessId();
        $windows    = Window::where('business_id', $businessId)->orderBy('id', 'desc')->get();

        return view('backend.business.window', compact('windows'));
    }
    
    public function create()
    {
        $businessId = $this->getBusinessId();
        $staffs     = Staff::where('business_id', $businessId)->get();
        return view('backend.business.window.create', compact('businessId', 'staffs'));
    }
    
    public function store(Request $request)
    {
        $window              = new Window;
        $window->business_id = $request->business_id;
        $window->staff_id    = $request->staff_id;
        $window->name        = $request->window_name;
        $window->status      = $request->status;
        
        $window->save();
        
        $lastNumberServe = $this->getLastNumberServeInQueue();
        
        $queue = new Queue;
        $queue->business_id  = $this->getBusinessId();
        $queue->window_id    = $window->id;
        $queue->queue_number = $lastNumberServe + 1;
        $queue->status       = 1;
        
        $queue->save();
        
        return redirect()
            ->route('admin.business.window')
            ->withFlashSuccess('Successfully created!');
    }
    
    public function edit($id)
    {
        $businessId = $businessId = $this->getBusinessId();
        $staffs     = Staff::where('business_id', $businessId)->get();
        $window     = Window::find($id);
        return view('backend.business.window.edit', compact('window', 'staffs', 'businessId'));
    }
    
    public function update(Request $request)
    {
        $data       = $request->except('_token');
        $status     = isset($data['status'])? (int)$data['status'] : 0;
        
        $data['status'] = $status;
        $result = Window::where('id', $data['id'])->update($data);
        
        return redirect()->route('admin.business.window')->withFlashSuccess('Successfully updated!');
    }
}
