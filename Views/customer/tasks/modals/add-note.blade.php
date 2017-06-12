<div class="modal fade" id="add-note-{{$task->histid}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Note to task: {{$task->histid}} </h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array('action' => 'Tasks\TaskController@addNote')) }}
                {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                {{ Form::textarea('description', NULL, ['class' => 'form-control'])  }}

            </div>
            <div class="modal-footer">
                {{ Form::hidden('note', 'Add') }}
                {{ Form::hidden('id', $task->histid) }}
                {{ Form::submit('Add Note', array('class' => 'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
