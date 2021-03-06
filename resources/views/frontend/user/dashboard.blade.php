@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.dashboard')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
                                <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                            <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                        </a>

                                        @can('view backend')
                                            &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                            </a>
                                        @endcan
                                    </p>
                                </div>
                            </div>
                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            @php
                                $qModel  = !is_null($queueUser)? $queueUser->queue : 0;
                                $queueNo = 0;

                                if ($qModel) {
                                    $queueNo = $qModel->queue_number;
                                }
                            @endphp
                            @foreach ($businesses as $business)
                                @php
                                    $flag = $qModel && $business->id === $qModel->business_id;
                                @endphp
                                <div class="row">
                                    <div class="col">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                {{ $business->name }}
                                                @if ($queueNo && $flag)
                                                    <span class="badge badge-primary">Priority No. {{ $queueNo }}</span>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{ $business->details }}</p>
                                                <p class="card-text">
                                                    <small>
                                                        <i class="fas fa-address-card"></i> {{ $business->address }}<br/>
                                                        <i class="fas fa-phone"></i> {{ $business->contact }}
                                                    </small>
                                                </p>
                                            </div>
                                            @if (!$business->queues->isEmpty() && !$queueNo) 
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)" class="btn btn-primary reserve-queue" data-queue-id="{{ $business->queues->first()->id }}" data-business-id="{{ $business->id }}">Reserve</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
    @include('frontend.user.js.reserve')
@endsection
