


<div class="fluid-container">
    <div class="row">
        <div class="col-md-3">
            @if(isset($manual_entry->parent))
                <a href="/customers/manual/view/category/{{$manual_entry->parent}}">
                    <i class="material-icons">undo</i>
                </a>
            @else
                <a href="/customers/manual">
                    <i class="material-icons">undo</i>
                </a>
            @endif
        </div>
    </div>
</div>