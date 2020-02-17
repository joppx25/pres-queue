<?php

namespace App\Http\Controllers\Backend\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Window;


class WindowController extends Controller
{
    public function list()
    {
        $windows = Window::orderBy('id', 'desc')->get();

        return view('backend.business.window', compact('windows'));
    }
    
    public function create()
    {
        return view('backend.business.window.create');
    }
    
    public function store(Request $request)
    {
        $window         = new Window;
        $window->name   = $request->window_name;
        $window->status = $request->status;
        
        $window->save();
        
        return redirect()
            ->route('admin.business.window')
            ->withFlashSuccess('Successfully created!');
    }
    
    public function edit($id)
    {
        return view('backend.business.window.edit', ['window' => Window::find($id)]);
    }
    
    public function update(Request $request)
    {
        $data   = $request->except('_token');
        $status = isset($data['status'])? (int)$data['status'] : 0;
        
        $data['status'] = $status;
        $result = Window::where('id', $data['id'])->update($data);
        
        return redirect()->route('admin.business.window')->withFlashSuccess('Successfully updated!');
    }
}
