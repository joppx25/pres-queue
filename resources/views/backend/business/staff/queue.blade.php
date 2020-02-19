@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Queue Management
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Queue #</th>
                            <th>Status</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (!is_null($queue))
                            <tr>
                                <td>{{ $queue->queue_number }}</td>
                                <td>
                                    @if ($queue->status === 2)
                                        <span class="badge badge-success" style="cursor:pointer">Reserved</span>
                                    @else
                                        <span class="badge badge-danger" style="cursor:pointer">@lang('labels.general.inactive')</span>
                                    @endif 
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary resolve-queue" data-business-id="{{ $queue->business_id }}" data-queue-number="{{ $queue->queue_number }}" data-window-id="{{ $queue->window_id }}" data-queue-id="{{ $queue->id }}">Done</a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@include('backend.business.staff.js.resolve')
@endsection
