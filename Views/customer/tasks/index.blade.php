@extends('customer.layouts.legacy-customer')

@section('menu')


@stop

@section('main')

    @include('customer.tasks.modals.create')
    @include('customer.tasks.modals.send-pdf')

    <div class="bootstrap-styles">

        <div class="clearfix"></div>

        <h1>Task List</h1>

        <div class="row">
            <div class="task-list col-md-12">
                <div class="row">
                    <div class="task-bar col-md-12">
                        {{ Form::open(['method' => 'GET']) }}
                        {{ Form::select('task-filter', ['3' => '3','10' => '10','25' => '25','100' => '100'] , request('task-filter', 3),
                        ['class' => 'col-md-2 float-xs-left form-3 form-control', 'onchange' => 'this.form.submit()']
                        ) }}

                        {{ Form::close() }}
                        <span data-toggle="modal" data-target="#create-task">
                            <a class="float-right" data-toggle="tooltip" data-placement="top" title="Create Task">
                                <div class="float-right btn btn-success">
                                    <i class="material-icons">note_add</i>
                                </div>
                            </a>
                        </span>
                        <span data-toggle="modal" data-target="#send-pdf">
                            <a class="float-right" data-toggle="tooltip" data-placement="top" title="Send Task list">
                                <div class="float-right btn btn-success">
                                    <i class="material-icons">email</i>
                                </div>
                            </a>
                        </span>
                    </div>
                </div>
                @foreach($tasks as $task)

                    <div class="row">
                        <div class="col-md-12 no-padding">
                            <div class="task">
                                <div class="header">
                                    <a href="{{ route('customer.tasks.view', $task->histid ) }}" title="View task:{{ $task->histid }}">
                                        <h2>Task ID:{{$task->histid}} > {{ str_limit($task->histtitle, 70)}}: {{$task->histstatus}}</h2>
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="task-detail-items">
                                                <div class="col-md-12"><b>Created Date:</b></div> <div class="col-md-12">{{ Carbon\Carbon::createFromTimeStamp($task->histcreateddate, 'Europe/London')->toFormattedDateString() }}</div>
                                                <div class="col-md-12"><b>Created By:</b></div> <div class="col-md-12">{{ $task->creator ? $task->creator->name : 'N/A'  }}</div>
                                                <div class="col-md-12"><b>Assigned To:</b></div> <div class="col-md-12">{{ $task->assigned ? $task->assigned->name : 'Unassigned'  }} </div>
                                                {{--<div class="col-md-12"><b>Priority:</b> {{ $task->priority }}</div>--}}
                                                <div class="col-md-12"><b>Percentage Complete:</b> {{ $task->percentageCompleted()  }}%</div>
                                                <div class="col-md-12"><b>Status:</b> {{ $task->friendlyUrgency()  }}</div>
                                                <div class="col-md-12"><b>Total Time:</b> {{ $task->timeTaken()  }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 task-list-description">{!! $task->description !!}</div>

                                        <div class="col-md-2">
                                            @include('customer.tasks.partials.buttons')
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row note-row">
                                                <div class="note" id="notes-{{$task->histid}}" style="display: none">
                                                    @foreach($task->notes as $notes)

                                                        <div class="col-xs-2">

                                                            {{ $notes->person }}
                                                            <br/>
                                                            {{  Carbon::createFromTimeStamp($notes->date, 'Europe/London')->toFormattedDateString() }}
                                                        </div>
                                                        <div class="col-xs-10 note-desc">
                                                            {{ $notes->description }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class=" note-row">
                                                <div class="note" id="attach-{{$task->histid}}" style="display: none">

                                                    @foreach($task->attachments as $attachment)

                                                        <div class="col-md-12">
                                                            <a target="_blank" href="/file/task-attachment/{{$task->histid}}/{{ $attachment->filename }}"> {{ $attachment->filename }}</a>

                                                        </div>
                                                    @endforeach
                                                    <div class="col-md-2">
                                                        {{ Form::open(['route' => ['customer.tasks.attach', $task->histid], 'enctype' => 'multipart/form-data']) }}
                                                        {{ Form::hidden('id', $task->histid) }}
                                                        {{ Form::file('add-attachment',  ['class' => 'control-label']) }}
                                                        {{ Form::submit('Submit', ['class' => 'form-control']) }}
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
