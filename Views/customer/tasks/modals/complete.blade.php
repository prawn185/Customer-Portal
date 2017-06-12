<div class="modal fade" id="complete-{{$task->histid}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Complete task: {{ $task->histid }} </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to complete this task?</p>
                <i>"{{$task->histid}}: {{$task->histtitle}}"</i>
            </div>
            <div class="modal-footer">
                <a href="{{ route('customer.tasks.complete', $task->histid) }}" class="btn btn-success">Complete</a>
            </div>
        </div>
    </div>
</div>