@extends('customer.layouts.login-customer')



@section('main')

    <div class="bootstrap-styles">
        <div class="container-fluid">


            <div class="login-screen">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <img src="/assets/customer-logo.jpg" alt="Netmatters Logo"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Reset Password</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                {{ Form::open(['route' => 'customer.reset-password']) }}
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row {{ $errors->has('contactemail') ? ' has-error' : '' }}">
                                    <label for="contactemail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="contactemail" name="contactemail" value="{{ $email or old('contactemail') }}">

                                        @if ($errors->has('contactemail'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contactemail') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-refresh"></i> Reset Password
                                        </button>
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