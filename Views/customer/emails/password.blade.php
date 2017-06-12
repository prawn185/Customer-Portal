@extends('emails.scaffold')

@section('main')


Click here to reset your password: <a href="{{ $link = url('customers/reset-password', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>


@endsection