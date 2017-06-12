<div class="modal fade" id="create-manual" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Manual</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array('action' => 'Manual\ManualController@create')) }}
                {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
                {{ Form::text('title', NULL , ['class' => 'form-group  form-control', 'placeholder'=>'Title'])  }}

                {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                {{ Form::textarea('description', NULL , ['class' => 'form-group  form-control', 'placeholder'=> 'Description', 'id' => 'summernote-m-create'])  }}

                {{ Form::label('parent', 'Parent Category', ['class' => 'control-label']) }}
                {{ Form::select('parent', $selected_categories , ['class' => 'form-group form-control',])  }}

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
            $('#summernote-m-create').summernote({
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