<?php

namespace App\Http\Controllers\Backend\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Partner\ServiceRequest;
use App\Http\Requests\Backend\Partner\StoreServiceRequest;
use App\Models\Partner\Service;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**@var Service $service */
    protected $service;
    
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    
    public function serviceList()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('backend.partner.service', compact('services'));
    }
    
    public function createService(ServiceRequest $request)
    {
        return view('backend.partner.create');
    }
    
    public function storeService(StoreServiceRequest $request)
    {
        $this->service->name = $request->name;
        $this->service->max_queue = $request->max_queue;
        $this->service->save();
        
        return redirect()->route('admin.partner.services')->withFlashSuccess('Successfully created!');
    }
    
    public function editService($id)
    {
        return view('backend.partner.edit', ['service' => $this->service::find($id)]);
    }
    
    public function updateService(StoreServiceRequest $request)
    {
        $data   = $request->except('_token');
        $status = isset($data['status'])? (int)$data['status'] : 0;
        
        $data['status'] = $status;
        $result = $this->service::where('id', $data['id'])->update($data);
        
        return redirect()->route('admin.partner.services')->withFlashSuccess('Successfully updated!');
    }
}
