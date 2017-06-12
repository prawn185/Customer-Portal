@extends('customer.layouts.login-customer')



@section('main')

    <div class="bootstrap-styles">
        <div class="container">
            <div class="login-screen">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <img src="/assets/customer-logo.jpg" alt="Netmatters Logo"/>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="text-danger">{{ $errors->first('contactemail') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-xs-12">
                                {{ Form::open(['route' => 'customer.login']) }}
                                    <div class="form-group">
                                        <label for="contactemail" class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" required="required" class="form-control" id="contactemail" name="contactemail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-12 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" required="required" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                            <a href="{{ route('customer.reset') }}" class="btn btn-info">Reset Password</a>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@stop