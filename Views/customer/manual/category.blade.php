@extends('customer.layouts.legacy-customer')

@section('main')
    @include('customer.layouts.partials.manual_menu')
    <div class="bootstrap-styles">

        <div class="clearfix"></div>

        <h1>{{$category->title}}</h1>
        <hr/>

        @foreach($manuals as $manual)

            <h2><a href="{{ route('customer.manual.view', $manual->id) }}">{{$manual->title}}</a></h2>
            
        @endforeach
    </div>
@stop