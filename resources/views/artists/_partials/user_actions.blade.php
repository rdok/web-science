<div class="col-md-6">
    <fieldset {{ count($artists) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'artists_store', 'files' => true, 'class' => 'form-inline']) !!}
        {!! Form::file('artists', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
        'false', 'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required']) !!}

        <div class="tooltip-wrapper"
             data-title="{{ count($artists) === 0 ? 'Import from file' : 'Delete artists data first'}}">
            {!! Form::button('<i class="fa fa-cloud-upload"></i>', ['type' => 'submit', 'class' => 'btn btn-app' ])
            !!}
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class="col-md-6">
    <fieldset {{ count($artists) !== 0 ?: 'disabled' }}>
        {!! Form::open(['method' => 'delete', 'route' => 'artists_drop']) !!}
        <div class="form-group">
            <div class="tooltip-wrapper"
                 data-title="{{ count($artists) !== 0 ? 'Delete All Artists' : 'No artists on database to delete'}}">
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>
