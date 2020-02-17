<?php

namespace App\Http\Controllers\Frontend\Business;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Auth\BusinessRepository;

class BusinessController extends Controller
{
    
    public function __construct(BusinessRepository $businessRepo)
    {
        $this->businessRepo = $businessRepo;
    }
    
    public function redirectPath()
    {
        return route(home_route());
    }
    
    public function showRegistration()
    {
        return view('frontend.business.register');
    }
    
    public function submitRegistration(Request $request)
    {
        $user = $this->businessRepo->create($request->except('_token'));
        
        auth()->login($user);
        
        event(new UserRegistered($user));

        return redirect($this->redirectPath());
    }
}
