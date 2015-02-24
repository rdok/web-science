<div class="col-md-6">
    <fieldset {{ count($tags) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'tags_store', 'files' => true, 'class' => 'form-inline']) !!}
        <div class="form-group">
            {!! Form::file('tags', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
            'false',
            'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required', 'disabled' =>
            'disabled'])
            !!}

            <div class="tooltip-wrapper"
                 (count($tags) !== 0)
                 data-title="{{ (count($tags) === 0) ? 'Insert tags data from file': 'You need to delete tags data first.' }}">
                {!! Form::button('<i class="fa fa-cloud-upload"></i>', ['type' => 'submit', 'class' => 'btn btn-app', ])
                !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class="col-md-6">
    <div class="form-group">
        <div class="tooltip-wrapper"
             data-title="You need to login first">
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app', 'data-toggle'
            => 'tooltip', 'data-placement' => 'bottom', 'disabled' => (count($tags) === 0) ? 'disabled' : ''])
            !!}
        </div>
    </div>
</div>
