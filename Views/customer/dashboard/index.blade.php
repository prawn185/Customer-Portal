@extends('customer.layouts.legacy-customer')

@section('main')

    <div class="bootstrap-styles">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-12 mb-2">

                    <h2>Hello {{ Auth::user()->name }}, how is your {{ period_of_day() }}?</h2>
                </div>
            </div>

            <div class="row">
                    @if (Auth::user()->can('read_remaining_time'))
                        {{--<div class="col-md-4 widgets"> @include('customer.dashboard.widgets.remaining-time')</div>--}}
                    @endif
                    @if (Auth::user()->can('current_open_tasks'))
                        <div class="col-md-6 widgets"> @include('customer.dashboard.widgets.open-tasks')</div>
                    @endif
                    @if (Auth::user()->can('reinstate_recent_tasks'))
                        <div class="col-md-6 widgets"> @include('customer.dashboard.widgets.reinstate-recent-task') </div>
                    @endif
            </div>
            <div class="row">
                    @if (Auth::user()->can('it_recommendations'))
                        <div class="col-md-6 widgets"> @include('customer.dashboard.widgets.recommendations')</div>
                    @endif
                    @if (Auth::user()->can('renewal'))
                        <div class="col-md-6 widgets"> @include('customer.dashboard.widgets.renewal')</div>
                    @endif
            </div>

        </div>
    </div>
@stop