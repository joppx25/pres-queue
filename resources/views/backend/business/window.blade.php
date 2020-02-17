@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.business.window'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

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
    </div>
</div>
@endsection
