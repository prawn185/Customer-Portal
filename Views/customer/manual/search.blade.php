@extends('customer.layouts.legacy-customer')

@section('main')

    <div class="bootstrap-styles">

        <div class="clearfix"></div>
        <div class="col-md-7">
            {{ Form::open(['route' => ['customer.manual.search']]) }}

            {{ Form::text('search', NULL, ['placeholder' => 'Search']) }}
            {{ Form::submit('Search', ['class' => 'col-md-3 form-control btn btn-success']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop