<div class="col-md-6">
    <fieldset {{ count($lastFmUsers) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'lastFmUsers_store', 'files' => true, 'class' => 'form-inline']) !!}
        <div class="form-group">
            {!! Form::file('lastFmUsers', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
            'false',
            'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required', 'disabled' =>
            'disabled'])
            !!}

            <div class="tooltip-wrapper"
                 (count($lastFmUsers) !== 0)
                 data-title="{{ (count($lastFmUsers) === 0) ? 'Insert lastFmUsers data from file': 'You need to delete lastFmUsers data first.' }}">
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
            => 'tooltip', 'data-placement' => 'bottom', 'disabled' => (count($lastFmUsers) === 0) ? 'disabled' : ''])
            !!}
        </div>
    </div>
</div>
