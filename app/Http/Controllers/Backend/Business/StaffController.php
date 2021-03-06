<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Auth\User;
use App\Repositories\Backend\Auth\UserRepository;
use App\Models\Window;
use App\Models\Queue;
use App\Models\QueueUser;
use Hash;

class StaffController extends Controller
{
    
    protected $userRepo;
    
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    
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
        $data = $request->except('_token');
        
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        
        $data['imageName'] = $imageName;
        $this->userRepo->create($data);
        
        return redirect()->route('admin.business.staff');
    }
    
    public function edit($id)
    {
        $staff = Staff::where('id', $id)->with('user')->first();
        return view('backend.business.staff.edit', compact('staff'));
    }
    
    public function update(Request $request)
    {
        $data = $request->all();
        $imageName = '';
        
        if ($request->hasFile('image')) {
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }
        
        $result = Staff::where('id', $data['id'])->update([
            'name'    => $data['first_name'] . ' ' . $data['last_name'],
            'details' => $data['details'],
            'image'   => $imageName,
        ]);
        
        if ($result) {
            $user = User::where('id', $data['user_id'])->update([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'password'   => Hash::make($data['password']),
            ]);
        }
        
        return redirect()->route('admin.business.staff');
    }
    
    public function queueList()
    {
        $staff      = Staff::where('user_id', auth()->user()->id)->first();
        $window     = Window::where('staff_id', $staff->id)->first();
        $queue      = Queue::where('window_id', $window->id)->where('status', 2)->first();

        return view('backend.business.staff.queue', compact('queue'));
    }
}
