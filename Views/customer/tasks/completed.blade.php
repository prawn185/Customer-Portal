@extends('customer.layouts.legacy-customer')

@section('menu')



@stop

@section('main')

<div class="bootstrap-styles">
    <div class="container-fluid">

        <h1>Completed Tasks</h1>

        <table class="table table-striped table-hover data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task Name</th>
                    <th>Completed Date</th>
                    <th>Time Allocated</th>
                    <th>Time Taken</th>
                    <th>Assigned To</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->histid }}</td>
                        <td><a href="{{ route('customer.tasks.view', $task->histid ) }}" title="View task:{{ $task->histid }}">{{ $task->histtitle }} </a></td>
                        <td>{{ Carbon::createFromTimeStamp($task->histcompletedate, 'Europe/London')->toFormattedDateString() }} </td>
                        <td>{{ $task->friendlyTimeAllocated() }} </td>
                        <td>{{ $task->friendlyTimeRemaining() }} </td>
                        <td>{{ $task->assigned ? $task->assigned->name : '' }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop