<div class="col-md-6">
    <fieldset {{ count($lastFmUsers) === 0 ?: 'disabled' }}>
        {!! Form::open(['route' => 'last_fm_users_store', 'files' => true, 'class' => 'form-inline']) !!}
        {!! Form::file('lastFmUserArtist', ['class' => 'filestyle btn btn-app', 'data-badge' => 'false', 'data-input' =>
        'false', 'type' => 'file', 'data-iconName' => 'fa fa-file-text-o', 'required' => 'required']) !!}

        <div class="tooltip-wrapper"
             data-title="{{ count($lastFmUsers) === 0 ? 'Import from file' : 'Delete lastFmUsers artists listened first'}}">
            {!! Form::button('<i class="fa fa-cloud-upload"></i>user_artists.dat', ['type' => 'submit', 'class' => 'btn
            btn-app' ])
            !!}
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class="col-md-6">
    <fieldset {{ count($lastFmUsers) !== 0 ?: 'disabled' }}>
        {!! Form::open(['method' => 'delete', 'route' => 'last_fm_users_destroy']) !!}
        <div class="form-group">
            <div class="tooltip-wrapper"
                 data-title="{{ count($lastFmUsers) !== 0 ? 'Delete All lastFmUsers artists listened' : 'No lastFmUsers
                 artists listened on database to delete'}}">
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-app']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>
