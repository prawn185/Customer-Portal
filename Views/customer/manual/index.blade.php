@extends('customer.layouts.legacy-customer')

@section('main')
    <div class="bootstrap-styles">
        <div class="clearfix"></div>

        <div class="page-header">
            <div class="row">

                <div class="col-md-4">
                    <div class="page-title">
                        <h1>Manual Categories</h1>
                    </div>
                </div>

                <div class="col-md-8 text-right">
                    <div class="page-actions">
                        <a class="btn btn-warning" data-toggle="modal" data-target="#create-manual-category">
                            Create Manual Category
                        </a>

                        @if (count($categories) > 0)
                            <a class="btn btn-success" data-toggle="modal" data-target="#create-manual">
                                Create Manual Entry
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>


        <div class="page-content">

            @if (count($categories) != 0)
                <div class="row">

                    @foreach($categories as $key => $category)

                        <div class="col-md-6 col-lg-4">

                            <div class="item">
                                <div class="item-title">
                                    <a href="{{ route('customer.manual.category', $category->id ) }}">
                                        <h2>{{ $i++ }} - {{ $category->title}}</h2>
                                    </a>
                                </div>

                                <div class="item-content">
                                    <i>{!! str_limit($category->content) !!}</i>
                                </div>
                            </div>

                        </div>

                    @endforeach
                </div>

            @else
                <div class="row">
                    <div class="col-md-12">
                        <h3>No Manual Categories, add one?</h3>

                        <a class="btn btn-block btn-info" data-toggle="modal" data-target="#create-manual-category">
                            Create Manual Category
                        </a>
                    </div>
                </div>
            @endif
        </div>


        {{-- Utilities area --}}
        @include('customer.manual.modals.create')
        @include('customer.manual.modals.create-category')
    </div>
@stop