@extends('customer.layouts.legacy-customer')

@section('main')
    @include('customer.layouts.partials.manual_menu')
    <div class="bootstrap-styles">

        <div class="clearfix"></div>

         <a data-toggle="modal" data-target="#edit-manual">
            <div class="float-xs-right btn btn-success">
                <i class="material-icons">edit</i>
                Edit Manual Entry
            </div>
        </a>

        <h1>{{$manual_entry->title}}</h1>
        <div class="desc">
            {!!$manual_entry->content!!}
        </div>
    </div>

    @include('customer.manual.modals.edit')

@stop