<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WindowController extends Controller
{
    public function list()
    {
        return view('backend.business.window');
    }
    
    public function create()
    {
        return view('backend.business.window.create');
    }
    
    public function store(Request $request)
    {
        dd($request->all());
    }
}
