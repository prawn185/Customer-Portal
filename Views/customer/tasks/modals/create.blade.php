<div class="modal fade" id="create-task" role="dialog">
    <div class="modal-dialog" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a new task</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['action' => 'Tasks\TaskController@create']) }}
                {{ Form::label('histtitle', 'Title', ['class' => 'control-label']) }}
                {{ Form::text('histtitle', null, ['class' => 'form-control']) }}


                {{ Form::label('histdescription', 'Description', ['class' => 'control-label']) }}
                {{ Form::textarea('histdescription', null, ['class' => 'form-control summernote', 'id' => 'summernote-create-task'])  }}


                {{ Form::label('priority', 'Priority', ['class' => 'control-label']) }}
                {{ Form::select('priority', ['Normal','Top'] , null , ['class' => 'form-control col-md-2']) }}

                {{ Form::label('time_allocated', 'Time Allocated (m)', ['class' => 'control-label']) }}
                {{ Form::number('time_allocated', 30 , ['class' => 'form-control col-md-2']) }}

                {{ Form::label('packid', 'Package', ['class' => 'control-label']) }}
                {{ Form::select('packid', $package_array , ['class' => 'form-control col-md-2']) }}

            </div>
            <div class="modal-footer">
                {{ Form::submit('Create Task', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@section('footer_javascript')
    @parent
    <script type="text/javascript">
    $(document).ready(function()
    {
        $('#summernote-create-task').summernote({
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