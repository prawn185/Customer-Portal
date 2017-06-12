<div class="buttons">
    <div class="row">
        <div class="button">
            <a data-title="View Notes" data-toggle="tooltip" onclick="togDisp('notes-{{$task->histid}}');">
                <span class="notes">{{count($task->notes)}}
                </span>
            </a>
        </div>
        <div class="button">
            <a data-toggle="modal" data-target="#add-note-{{$task->histid}}">
                <span class="add-note notes">+</span>
            </a>
        </div>
        <div class="button">
            <a data-title="Attach Document" data-toggle="tooltip" onclick="togDisp('attach-{{$task->histid}}');">
                <span class="attachments">{{count($task->attachments)}}</span>
            </a>
        </div>
        </div>
    <div class="row">
        <div class="button">
            <a data-title="View Task" data-toggle="tooltip" href="{{ route('customer.tasks.view', $task->histid ) }}"><img src="/assets/view.png" alt="View"></a>
        </div>

        <div class="button">
            <a class="alert-popup"
                data-title="Complete Task"
                data-text="This will complete the current task"
                data-url="{{ route('customer.tasks.complete', $task->histid) }}"
                data-toggle="tooltip">
                <img src="/assets/complete.png" alt="View">
            </a>
        </div>

        <div class="button">
            <a data-toggle="modal" data-target="#edit-task-{{$task->histid}}"><img src="/assets/edit-task.png" alt="View"></a>
        </div>
    </div>
</div>

@include('customer.tasks.modals.complete')

@include('customer.tasks.modals.edit')

@include('customer.tasks.modals.add-note')


