@extends('customer.layouts.legacy-customer')

@section('main')

    <div class="bootstrap-styles">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-5">
                <h1>Searching for: <i>"{{ $search_string }}"</i></h1>
            </div>
            <div class="col-md-7">
                {{ Form::open(['route' => ['customer.manual.search']]) }}

                {{ Form::text('search', NULL, ['placeholder' => 'Search']) }}
                {{ Form::submit('Search', ['class' => 'col-md-3 form-control btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
        @foreach($manuals as $manual)
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('customer.manual.category', $manual->id ) }}"><h2>{{ $manual->title}}</h2></a>
                    <i>{!! str_limit($manual->content, 160) !!}</i>
                </div>
            </div>
        @endforeach

    </div>

@stop