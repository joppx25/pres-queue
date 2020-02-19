@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.business.staff.store'))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}
        <input type="hidden" name="business_id" value="{{ $businessId }}">
        <input type="hidden" name="roles[]" value="staff">
        <input type="hidden" name="active" value="1">
        <input type="hidden" name="confirmed" value="1">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Staff management
                            <small class="text-muted">Create staff</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">Email</label>

                            <div class="col-md-10">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Staff email" maxlength="255" required autofocus>
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password">Password</label>

                            <div class="col-md-10">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Staff password" maxlength="255" required autofocus>
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">First Name</label>

                            <div class="col-md-10">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Staff First Name" maxlength="255" required autofocus>
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="last_name">Last Name</label>

                            <div class="col-md-10">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Staff Last Name" maxlength="255" required autofocus>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        <label for="details" class="col-md-2">Details</label>

                            <div class="col-md-10">
                                <textarea name="details" id="details" class="form-control" cols="30" rows="10" placeholder="Staff details"></textarea>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label for="image" class="col-md-2">Image</label>

                            <div class="col-md-10">
                                <input type="file" name="image" id="image">
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.business.staff'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection
