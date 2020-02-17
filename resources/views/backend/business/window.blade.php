@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.business.window'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.business.window') }} <small class="text-muted">{{ __('labels.backend.access.business.activeWindows') }}</small>
                </h4>
            </div>
            
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.business.window.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                </div><!--btn-toolbar-->                
            </div><!--col-->
        </div>
        
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($windows as $window)
                                <tr>
                                    <td>{{ $window->name }}</td>
                                    <td>
                                        @if ($window->status)
                                            <span class="badge badge-success" style="cursor:pointer">@lang('labels.general.active')</span>
                                        @else
                                            <span class="badge badge-danger" style="cursor:pointer">@lang('labels.general.inactive')</span>
                                        @endif 
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="@lang('labels.backend.access.users.user_actions')">
                                            <a href="{{ route('admin.business.window.edit', ['id' => $window->id]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
