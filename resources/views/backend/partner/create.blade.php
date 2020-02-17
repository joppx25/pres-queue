@extends('backend.layouts.app')

@section('title', __('labels.backend.access.services.management') . ' | ' . __('labels.backend.access.services.create'))

@section('content')
    <form class="form-horizontal" action="{{ route('admin.partner.service.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.services.management')
                            <small class="text-muted">@lang('labels.backend.access.services.create')</small>
                        </h4>
                    </div>
                </div>
                
                <hr>
                
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 form-control-label">{{ __('validation.attributes.backend.access.services.name') }}</label>

                            <div class="col-md-10">
                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.services.name') }}" maxlength="255" required autofocus>
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            <label for="max_queue" class="col-md-2 form-control-label">{{ __('validation.attributes.backend.access.services.max_queue') }}</label>
    
                            <div class="col-md-10">
                                <input type="number" name="max_queue" id="max_queue" class="form-control" placeholder="{{ __('validation.attributes.backend.access.services.max_queue') }}" maxlength="200" required>
                            </div><!--col-->
                        </div><!--form-group-->
                            
                    </div>
                </div>
            </div>
            
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div>
    </form>
@endsection
