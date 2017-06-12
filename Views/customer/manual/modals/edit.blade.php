<div class="modal fade" id="edit-manual" role="dialog">
    <div class="modal-dialog" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit manual: {{ $manual_entry->name }} </h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['customer.manual.edit', $manual_entry->id]]) }}
                {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
                {{ Form::text('title', $manual_entry->title, ['class' => 'form-control']) }}

                {{ Form::textarea('manual_content', $manual_entry->content, ['class' => 'form-control summernote', 'id' => 'summernote-manual-edit'])  }}

            </div>

            <div class="modal-footer">
                {{ Form::submit('Edit', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@section('footer_javascript')
    @parent
    <script type="text/javascript">

        $(document).ready(function(){
            var $summernote_div = $('#summernote-manual-edit');
            $summernote_div.summernote({
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