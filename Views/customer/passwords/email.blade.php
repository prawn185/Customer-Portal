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
                                {{ Form::open(['route' => 'customer.reset']) }}
                                <div class="form-group row">
                                    <label for="contactemail" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="contactemail" name="contactemail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Send Reset Email</button>
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