@extends('emails.scaffold')

@section('main')


Hello {{ Auth::user()->contactfirst }}, here is you task list. Should you need further information about your list please email us at
<a href="mailto:support@netmatters.com">support@netmatters.com</a>

<h1>Stats</h1>
<ul>
    <li>Tasks open: {{count($tasks_all)}}</li>
    <li>Tasks open: {{count($tasks_open)}}</li>
    <li>Tasks Completed: {{count($tasks_completed)}}</li>
    <li>Tasks completed this month: {{count($tasks_recently_completed)}} </li>
</ul>


@endsection