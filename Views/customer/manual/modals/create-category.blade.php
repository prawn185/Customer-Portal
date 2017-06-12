<div class="modal fade" id="create-manual-category" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Manual Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                {{ Form::open(['action' => 'Manual\ManualController@createCategory']) }}
                {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
                {{ Form::text('title', NULL , ['class' => 'form-group  form-control', 'placeholder'=>'Title'])  }}

                {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                {{ Form::textarea('description', NULL , ['class' => 'form-group  form-control', 'placeholder'=>'Description', 'id' => 'summernote-m-create-category'])  }}

            </div>
            <div class="modal-footer">
                {{ Form::submit('Create Manual', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@section('footer_javascript')
    @parent
    <script type="text/javascript">

        $(document).ready(function(){
            $('#summernote-m-create-category').summernote({
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