@extends('backend.layouts.app')

@section('title', __('labels.backend.access.business.window') . ' | ' . __('labels.backend.access.business.create'))

@section('content')
    {{ html()->form('POST', route('admin.business.window.update'))->class('form-horizontal')->open() }}
        <input type="hidden" name="id" value="{{ $window->id }}">
        <input type="hidden" name="business_id" value="{{ $businessId }}">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.business.window')
                            <small class="text-muted">Update window</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Window Name')->class('col-md-2 form-control-label')->for('window_name') }}
                            
                            <div class="col-md-10">
                                {{ html()->text('name', $window->name ?? '')
                                    ->class('form-control')
                                    ->placeholder('Window Name')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            <label for="assign" class="col-md-2 form-control-label">Assigned To</label>
                            <div class="col-md-10">
                                <select name="staff_id" id="assign" class="form-control" required>
                                    <option value="">Select Staff</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ $staff->id === $window->staff_id? 'selected': ''}}>{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                        {{ html()->label('Window Status')->class('col-md-2 form-control-label')->for('last_name') }}

                            <div class="col-md-10">
                                <div class="checkbox d-flex align-items-center">
                                    {{ html()->label(
                                            html()->checkbox('status', $window->status)
                                                  ->class('switch-input')
                                                  ->id('status')
                                            . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                        ->class('switch switch-label switch-pill switch-primary mr-2')
                                        ->for('status') }}
                                    {{ html()->label('Status')->for('Status') }}
                                </div>
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.business.window'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
    @include('backend.auth.js.handleToggleBusiness')
@endsection
