<div class="modal fade" id="edit-task-{{$task->histid}}" role="dialog">
    <div class="modal-dialog" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit task: {{ $task->histid }} </h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['customer.tasks.edit', $task->histid]]) }}
                {{ Form::label('histtitle', 'Title', ['class' => 'control-label']) }}
                {{ Form::text('histtitle', $task->histtitle, ['class' => 'form-control']) }}


                {{ Form::label('histdescription', 'Description', ['class' => 'control-label']) }}
                {{ Form::textarea('histdescription', $task->histdescription, ['class' => 'form-control summernote', 'id' => 'summernote-' . $task->histid ])  }}


                {{ Form::label('priority', 'Priority', ['class' => 'control-label']) }}
                {{ Form::select('priority', ['Normal','Top'] , $task->prioritytype , ['class' => 'form-control col-md-2']) }}
            </div>

            <div class="modal-footer">
                {{ Form::hidden('edit', 'Edit') }}
                {{ Form::hidden('id', $task->histid) }}
                {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@section('footer_javascript')
    @parent
    <script type="text/javascript">

        $(document).ready(function(){
            $('#summernote-{{ $task->histid }}').summernote({
                height  : 300,
                popover : {
                    image : [],
                    link  : [],
                    air   : []
                }
            });
        });
    </script>
@endsection