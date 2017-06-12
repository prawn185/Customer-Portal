@extends('customer.layouts.legacy-customer')

@section('menu')

@stop

@section('main')

    <div class="bootstrap-styles">
        <div class="container-fluid">
            <h1>{{$task->histid}} > {{$task->histtitle}}</h1>
            <div class="row">

                <div class="col-md-5 task-details">
                    <div class="col-md-12"><h2><b>Task Details:</b></h2></div>
                    <div class="col-md-12">Created Date: {{ Carbon\Carbon::createFromTimeStamp($task->histcreateddate, 'Europe/London')->toFormattedDateString()}}</div>
                    <div class="col-md-12">Created By: {{ $task->creator ? $task->creator->name : '' }}</div>
                    <div class="col-md-12">Assigned To: {{ $task->assigned ? $task->assigned->name : '' }}</div>
                    <div class="col-md-12">Percentage Complete: {{ $task->percentageCompleted()  }}</div>
                    <div class="col-md-12">Status: {{ $task->friendlyUrgency()  }}</div>
                    <div class="col-md-12">Total Time: {{ $task->timeTaken()  }}</div>
                    {{--<div class="col-md-12">Time Allocated:{{ $task->checkAllocatedTime()  }}</div>--}}
                </div>

                <div class="col-md-5 task-description">
                    <div class="col-md-12"><h2>Package:</h2></div>
                    <div class="col-md-12">Domain: {{ $task->domain ? $task->domain->domainname : "Not Set" }}</div>

                </div>
                @include('customer.tasks.modals.complete')

                @include('customer.tasks.modals.edit')

                @include('customer.tasks.modals.add-note')

                <div class="col-md-2 task-description">
                    <div class="col-md-12">
                        @if($task->histstatus != "Completed")
                            <div class="btn">
                                <a data-toggle="modal" data-target="#add-note-{{$task->histid}}">
                                    Add Note
                                </a>
                            </div>
                            <div class="btn">
                                <a class="alert-popup"
                                   data-title="Complete Task"
                                   data-text="This will complete the current task"
                                   data-url="{{ route('customer.tasks.complete', $task->histid) }}"
                                   data-toggle="tooltip">
                                    Complete
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 task-description">
                    <div class="col-md-12"><h2>Description:</h2></div>
                    <div class="col-md-12">{!!  $task->description  !!}</div>
                </div>

            </div>

            @if(count($task->notes) != 0)
            <h2>Notes:</h2>

                <div class="row task-description">

                    @foreach($task->notes as $note)
                        <div class="note col-md-12">

                            <div class="col-xs-3">
                                {{ !empty($note->person) ? $note->person : "Unknown" }}
                                <br/>
                                on {{  Carbon\Carbon::createFromTimeStamp($note->date, 'Europe/London')->toFormattedDateString() }}
                            </div>

                            <div class="col-xs-9 note-desc">
                                {!! $note->description !!}
                            </div>
                            <br/>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($task->attachments) != 0)

                <h2>Attachments:</h2>

            <div class="row task-description">

                @foreach($task->attachments as $attachment)

                    <div class="col-md-12">
                        <a href="/file/task-attachments/{{ $attachment->filename }}"> {{ $attachment->filename }}</a>

                    </div>
                @endforeach
            </div>
                @endif
        </div>
    </div>
@stop