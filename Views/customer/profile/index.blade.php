@extends('customer.layouts.legacy-customer')

@section('menu')

@stop

@section('main')





<div class="bootstrap-styles">

    <div class="clearfix"></div>

    <h1>Hello {{ Auth::user()->name }}</h1>
    <p>Since joining on {{ Auth::user()->created_at }} we have opened 18 tasks for you 14 of which are completed, 1 in progress and 3 deferred.</p>
</div>




@stop