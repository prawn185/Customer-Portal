<div class="modal fade" id="send-pdf" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send a PDF of your task list</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('action' => 'Tasks\TaskController@sendpdf')) }}
                {{ Form::label('email', 'Email Address', ['class' => 'control-label']) }}
                {{ Form::text('email', NULL, ['class' => 'form-control', 'placeholder' => 'support@netmatters.com']) }}

            </div>
            <div class="modal-footer">

                {{ Form::submit('Send PDF', array('class' => 'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>