<div class="col-md-6">
    <fieldset {{ count($tags) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'tags_store', 'files' => true, 'class' => 'form-inline']) !!}
        {!! Form::file('tags', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
        'false', 'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required']) !!}

        <div class="tooltip-wrapper"
             data-title="{{ count($tags) === 0 ? 'Import from file' : 'Delete tags data first'}}">
            {!! Form::button('<i class="fa fa-cloud-upload"></i>', ['type' => 'submit', 'class' => 'btn btn-app' ])
            !!}
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class="col-md-6">
    <fieldset {{ count($tags) !== 0 ?: 'disabled' }}>
        {!! Form::open(['method' => 'delete', 'route' => 'tags_destroy']) !!}
        <div class="form-group">
            <div class="tooltip-wrapper"
                 data-title="{{ count($tags) !== 0 ? 'Delete All tags' : 'No tags on database to delete'}}">
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>
